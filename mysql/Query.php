<?php
/**
 * Manager para estructurar querys basicos.
 * User: roberto.gonzalez
 * Date: 01/04/2015
 * Time: 08:40 AM
 */

class Query {

    /**
     * @param $table
     * @param $id
     * @return string
     * Retorna un query a base de un id.
     */
    public function SelectById($table, $id){
        $sql= "";
        if(!(trim($table)=="")){
            if(!(trim($id)=="")){
                $sql = "select * from $table where id = $id";
            }
        }
        return $sql;
    }

    /**
     * @param $table
     * @return string
     * Retorna un query generico
     */
    public function Select($table){
        $sql= "";
        if(!(trim($table)=="")){
                $sql = "select * from $table";
        }
        return $sql;
    }

    /**
     * @param $table
     * @param $array
     * @return string
     * Retorna un query para insertar registros
     */
    public function InsertInto($table,$array){
        $field ="";
        $value="";
        foreach ($array as $clave => $valor) {
            if($field==""){
                $field = $field."".$clave;
            }else{
                $field = $field.",".$clave;
            }
            if($value==""){
                $value = $value." $valor";
            }else{
                $value = $value.", $valor";
            }
        $insert= "insert into $table ($field) values ($value)";
        }
        return $insert;

    }

    /**
     * @param $table
     * @param $array
     * @param $id
     * @return string
     * Retorna un query para actualizar un registro pasandole el id
     */
    public function Update($table,$array, $id){
        $set ="";
        $value="";
        foreach ($array as $clave => $valor) {
            if($set==""){
                $set = $set."$clave=$valor";
            }else{
                $set = $set.", $clave=$valor";
            }

            $insert= "update $table set $set where id=$id";
        }
        return $insert;

    }

    /**
     * @param $table
     * @param $id
     * @return string
     * retorna un query para eliminar un registro
     */
    public function Delete($table,$id){
        $update="";
        if(trim($table)!="" &&trim($id)!=""){
            $update = "delete from $table WHERE id=$id ";
        }
        return $update;
    }
    public function DeleteWhere($table,$condition){
        $update="";
        if(trim($table)!="" ){
            $update = "delete from $table WHERE $condition ";
        }
        return $update;
    }

    public function SelectForSelect($table){
        $sql= "";
        if(!(trim($table)=="")){
            $sql = "select * from $table";
        }
        return $sql;

    }
}

?>