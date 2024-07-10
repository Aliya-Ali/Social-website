<?php

class Login
{
    private $error = "";
    public function evaluate($data)
    {
        
        $email = addslashes($data['email']);
        $password = addslashes($data['password']);

        $query = "select * from user where email = '$email' limit 1";

        $db = new DataBase();
        $result = $db->read($query);
        if($result)
        {
            $row = $result[0];
            if ($password == $row['password'])
            {
                // create session 
                $_SESSION['codebook_userid'] = $row['userid'];
            }else
            {
                $this->error.= "wrong password<br>";
            }
        }else
        {
            $this->error .= "No such email was found<br>";
        }
        return $this->error;

    }

    public function check_login($id)
    {
        if(is_numeric($id))
        {
            $query = "select * from user where userid = '$id' limit 1";
            $db = new DataBase();
            $result = $db->read($query);
            if($result)
            {
                $user_data = $result[0];
                return $user_data;
            }else
            {
                header("Location: login.php");
                die;
            }
            //retrieve the data
        }else
        {
            header("Location: login.php");
            die;
        }

    }
}