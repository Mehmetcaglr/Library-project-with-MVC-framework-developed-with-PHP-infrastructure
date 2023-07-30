<?php

namespace App\Model;

use Database\DB;
use http\Env\Request;
use PDO;

class Model extends DB
{
    /**
     *
     */
    function __construct()
    {
        parent::__construct();
        $this->table = isset($this->table) ? $this->table : get_called_class();
    }

    /**
     * @return $this
     */
    public function query()
    {
        if (!empty($this->fillable) && isset($this->fillable)){

            $fields = join(",", $this->fillable);

            $this->sql = "Select $fields from $this->table";

        } else {
            $this->sql = "Select *  from $this->table";
        }
        return $this;
    }


    public function where($option)
    {
         if(is_array($option))
         {
             $this->sql .= " where " . implode("and", $option);
         }

        $this->sql .= " where $option";

        return $this;
    }

    public function first()
    {
       return $this->pdo->query($this->sql)->fetch(PDO::FETCH_OBJ);
    }

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data)
    {
        $fileds = array_keys($data);
        $fileds = implode(",", $fileds); // name,category_id,category_type,price
        $values = array_values($data); //Array ( [0] => 01 [1] => 1 [2] => [3] => 200 )
        //$values = implode(",", $values); //01,1,,     200
        $questionMark = "";
        $questionMarks = array_map(function ($item) use ($questionMark){
            return $questionMark.= "?";
        },$values);

        $questionMarks = implode("," ,$questionMarks);


        $sql = "insert into $this->table ($fileds) VALUES ($questionMarks)";


        $this->pdo->prepare($sql)->execute($values);

        return $this;

    }



    public function get()
    {
        return $this->pdo->query($this->sql)->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param string $model
     * @param $frogeinKey
     * @param array $columns
     * @return $this
     */
    public function with(string $model, $frogeinKey, array $columns = [])
    {
        if(!empty($columns))
        {
            $fields = implode(",", $columns);

            $this->sql ="Select $fields From $this->table";
        }

        $this->sql.=" inner join $model on  $this->table.$frogeinKey = $model.$frogeinKey";

        return $this;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        $primaryKey = isset($this->primaryKey) ? $this->primaryKey : "id";
        $this->sql = "select * from $this->table where  $primaryKey = $id";

        return $this->pdo->query($this->sql)->fetch(PDO::FETCH_OBJ);
    }



    /**
     * @param array $data
     * @param int $id
     * @return void
     */
    public function update(array $data, int $id): void
    {
        $item = [];

        foreach ($data as   $key => $datum){
              $item [] = $key . '=' . "?";
        }

        $newData =  implode(', ',$item);

        $primaryKey = isset($this->primaryKey) ? $this->primaryKey : "id";

        $this->sql = "UPDATE $this->table SET $newData Where $primaryKey = $id ";

        $query =$this->pdo->prepare($this->sql)->execute(array_values($data));
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id): void
    {
        $primaryKey = isset($this->primaryKey) ? $this->primaryKey : "id";

        $this->sql = "DELETE FROM $this->table WHERE $primaryKey = $id";

        $this->pdo->query($this->sql)->execute();
    }
}