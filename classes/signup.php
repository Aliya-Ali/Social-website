<?php
class Signup
{
    private $error = "";

    public function evaluate($data)
    {
          foreach($data as $key => $value)
        {
            # code ...
            if(empty($value))
            {
                $this->error .= $key . " is empty!<br>"; 
            }
            if($key == "email")
            {
                if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
                {
                    $this->error .= $this->error . "Invalid email format!<br>";
                }
            }
            if($key == "first_name")
            {
                if (is_numeric($value) )
                {
                    $this->error .= $this->error . "first name cant be a numeric!<br>";
                }
                if (strstr($value, " "))
                {
                    $this->error .= $this->error . "first name cant have spaces!<br>";
                }
            }
            if($key == "last_name")
            {
                if (is_numeric($value))
                {
                    $this->error .= $this->error . "last name cant be a numeric!<br>";
                }
                if (strstr($value, " "))
                {
                    $this->error .= $this->error . "last name cant have spaces!<br>";
                }
            }
        }
        if ($this->error == "")
        {
            $this->create_user($data);
        }else
        {
            return $this->error;
        }
    }
    public function create_user($data)
    {
        $first_name = ucfirst($data['first_name']);
        $last_name = ucfirst($data['last_name']);
        $gender = $data['gender'];
        $email = $data['email'];
        $password = $data['password'];
 
        //create these
        $userid = $this->create_userid();
        $url_address = strtolower($first_name) . "." . strtolower($last_name);


        $query = "insert into user (userid, first_name, last_name, gender, email, password, url_address)
        values
        ('$userid', '$first_name', '$last_name', '$gender', '$email', '$password','$url_address')";
        
        echo $query;

        $db = new DataBase();
        $db->save($query);
    }

    
    private function create_userid()
    {
        $length = rand(4,19);
        $number = "";
        for ($i=0; $i < $length ; $i++) { 
            # code...
            $new_rand = rand(0,9);
            $number = $number . $new_rand;
        }

        return $number;
    }
}