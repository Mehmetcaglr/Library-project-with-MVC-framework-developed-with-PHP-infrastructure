<?php

if(!function_exists("view"))
{
    function view(string $path, array|object $data = [])
    {
        if(is_array($data))
        {
            extract($data);
        }
        $files = dirname(__DIR__,2)."/resource/view/".$path.".php";

        if(file_exists($files))
        {
            include $files;
        }
    }
}

if(!function_exists("error"))
{
    function error(string $key = null)
    {
        if($key !== null)
        {
          return isset($_SESSION["error"][$key]) ? $_SESSION["error"][$key] : false;
        }
        return isset($_SESSION["error"]) ? $_SESSION["error"] : [];
    }
}

if(!function_exists("control"))
{
    function control($key)
    {
        if(is_array($key) || is_object($key) || is_bool($key))
        {
            echo "<pre>";
           print_r($key);    // json_endcode çalışmıyor o yüzden böyle yaptım
           die;
        }

        if(is_string($key) || is_integer($key))
        {
            echo $key;
            die;
        }

    }
}

if(!function_exists("asset"))
{
   function asset(string $path = null)
   {
      // return "D:\MvcProject\app\\resource\assets\\$path";

       return "resource/assets/".$path;

   }
}


