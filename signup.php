<?php 
    include("classes/connect.php");
    include("classes/signup.php");

    $first_name = "";
    $last_name = "";
    $gender = "";
    $email ="";

    if($_SERVER['REQUEST_METHOD']== 'POST'){

        $singup = new Signup();
        $result = $singup->evaluate($_POST);

        if($result != ""){
            echo "<div style= 'text-align:center; font-size:12px; color: black'>";
            echo "the following errors occured: <br>";
            echo $result;
            echo "</div>";
        }else
        {
            header("Location: login.php");
            die;
        }
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $email =$_POST['email'];
    }     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codebook | Sign up</title>
    <style>
        #bar{
            height: 100px; 
            background-color: grey; 
            color: white; 
            padding: 4px;
        }
        #Signup_button{
            background-color:black;
            width: 70px;
            text-align: center;
            padding: 4px;
            border-radius: 4px;
            float: right;
        }
        #bar2{
            background-color: white; 
            width: 800px; 
            margin: auto;
            margin-top: 50px;
            text-align: center;
            padding: 10px;
            padding-top: 50px; 
            text-align: center;
            font-weight: bold;
        }
        #text{
            height: 40px;
            width: 300px;
            border: solid 1px #ccc;
            border-radius: 4px;
            padding: 4px;
            font-size: 14px;
            background: white;
        }
        #button{
            width: 300px;
            height: 40px;
            border-radius: 4px;
            font-weight: bold;
            border: none;
            background-color: black;
            color: white;
        }
    </style>
</head>
<body style="font-family: tahoma; background-color: lightgrey;">
    <div id="bar" >
        
        <div style="font-size: 40px; margin:4px; color:white;">Codebook</div>
        <span><div id="Signup_button">Signup</div></span>
        
    </div>
    <div id="bar2">
        Sign up to  codebook <br><br>
        <form method="post" action="">
            <input value ="<?php echo $first_name?>" name ="first_name" type="text", id="text" placeholder="First name"><br><br>
            <input value= "<?php echo$last_name?>" name="last_name" type="text", id="text" placeholder="Last name"><br><br>
        
            <span style="font-weight: normal;">Gender</span><br>
            <select name="gender" id="text">
                <option value=""><?php echo $gender?></option>
                <option >Male</option>
                <option >Female</option>
            </select>       

            <br><br>
            <input value="<?php $email?>" name="email" type="text", id="text" placeholder="Email"><br><br>
            <input name= "password" type="password", id="text" placeholder="Password"><br><br>
            <input name="password2" type="password", id="text" placeholder="Retype Password"><br><br>
        
            <input type="submit", id="button" value="Login">
            <br><br><br>
        </form>
        
    </div>


    
</body>
</html>