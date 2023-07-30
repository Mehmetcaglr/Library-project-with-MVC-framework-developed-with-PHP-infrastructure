<?php

namespace App\Http\Request;

use App\Model\Model;
use App\Model\User\User;
use Database\DB;
use PDO;
use PDOException;

trait ValidateRequest
{
    /**
     * @param Request $request
     * @param array $rules
     * @param array $messages
     * @return void
     */
    public function validate(Request $request, array $rules, array $messages = [])
    {
        $requiredMessages = [];
        $isValidMessages = [];
        $unsetValues = [];

        if($request->method() === "POST") // kullanıcı bir şey yolluyorsa.
        {
            foreach ($rules as $key => $rule) // saveden gelen verinin key'nin request ile var olup olmadığını kontrol ediyor
            {
                if(is_array($rule))
                {
                    if(!in_array($key, array_keys($request->all()))){
                        $requiredMessages[$key] = "required";
                        $this->error($request, $requiredMessages);
                    }else{
                        if($request->get($key) === "" && in_array("required", $rule)){
                            $requiredMessages[$key] = "required";
                            $this->error($request,$requiredMessages);

                        }elseif(in_array("string", $rule) && !is_string($request->get($key))){
                            $requiredMessages[$key] = "it must be string";
                            $this->error($request, $requiredMessages);

                        }elseif(in_array("number", $rule) && !is_numeric($request->get($key))){
                            $requiredMessages[$key] = "it must be number";
                            $this->error($request, $requiredMessages);

                        }elseif(in_array("email", $rule) && !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $request->get($key)) ) {
                            $requiredMessages[$key] = "it must be email";  //Email
                            $this->error($request, $requiredMessages);

                        }elseif(substr_count(implode("",$rule), "min")>0){
                            if(strlen($request->get($key)) < (int) explode(":", strstr(implode($rule), "min"))[1])
                            {
                                if($key === "password")
                                {
                                    $requiredMessages[$key] = sprintf("password must %s characters", strstr(implode($rule), "min"));
                                }else{
                                    $requiredMessages[$key] = strstr(implode($rule), "min");
                                }
                                $this->error($request, $requiredMessages);
                            }else{
                                $this->destroySessionMessage($key);
                                continue;
                            }
                        }elseif(substr_count(implode("",$rule), "max")>0){
                            if(strlen($request->get($key)) > (int) explode(":", strstr(implode($rule), "max"))[1])
                            {
                                if($key === "password")
                                {
                                    $requiredMessages[$key] = sprintf("password must %s characters", strstr(implode($rule), "max"));
                                }else{
                                    $requiredMessages[$key] = strstr(implode($rule), "max");
                                }
                                $this->error($request, $requiredMessages);
                            }else{
                                $this->destroySessionMessage($key);
                                continue;
                            }
                        }elseif (in_array($request->get("password"),$rule)) {
                            if ($request->get("password") !== $request->get("confirmed_password") && in_array("password", $rule)){
                                $requiredMessages[$key] = "passwords do not match";
                                $this->error($request, $requiredMessages);
                            }else{
                                continue;
                            }

                        }elseif (substr_count(implode("",$rule), "exits")>0 && $request->get($key) !== " "){
                            if(((DB::table($key, explode(":", strstr(implode($rule), "exits"))[1], $request->get($key)))))
                            {
                                $requiredMessages[$key] = sprintf("email exits %s characters", strstr(implode($rule), "exits"));
                                $this->error($request,$requiredMessages);
                            }else{
                                $this->destroySessionMessage($key);
                            }
                        }else{
                            $this->destroySessionMessage($key);
                        }
                    }
                } else {

                }
            }
        }
    }

    public function checkSession(Request $request, $users)
    {
        //$password = base64_encode($request->get("password"));
        if($request->method() == "POST"){

            if (($request->get("password") == $users->password) && $request->get("email") == $users->email ){
               $_SESSION["name"] = $users->name;
               $_SESSION["email"] = $users->email;
               print_r($_SESSION);
               die;
            }else{
                echo  "BÖYLE BİR KULLANICI BULUNAMADI";
                die;
            }
        }
    }

    public function destroySessionMessage($key)
    {
        unset($_SESSION["error"][$key]);
    }

    public function exits($query)
    {
        $exits = $this->pdo->query($query)->rowCount();
         // $exist = 0

        return $exits == 1 ? 0 : 1; // donus değeri olarak 1 gelecek
    }

    public function error(Request $request, array $requiredMessages = [], array $isValidMessages = [])
    {
        if(!empty($isValidMessages))
        {
            foreach ($isValidMessages as $key => $isValidMessage)
            {
                $_SESSION["error"][$key] = $isValidMessages;
            }
        }

        if(!empty($requiredMessages))
        {
            foreach ($requiredMessages as $key => $requiredMessage)
            {
                $_SESSION["error"][$key] = sprintf("%s is %s", $key, $requiredMessage);
            }
        }
       return $this->redirect();
    }
}


