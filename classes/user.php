<?php
class User
{
    public function get_data($id)
    {
        $query = "select * from user where userid = '$id' limit 1";
        $db = new DataBase();
        $result = $db->read($query);

        if($result)
        {
            $row = $result[0];
            return $row;
        }else
        {
            return false;
        }
    }
}