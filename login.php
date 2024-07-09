<?php 
session_start();
    include("classes/connect.php");
    include("classes/login.php");

    
    $email ="";
    $password ="";

    if($_SERVER['REQUEST_METHOD']== 'POST'){

        $login = new Login();
        $result = $login->evaluate($_POST);

        if($result != "")
        {
            echo "<div style= 'text-align:center; font-size:12px; color: black'>";
            echo "the following errors occured: <br>";
            echo $result;
            echo "</div>";
        }else
        {
            header("Location: profile.php");
            die;
        }

        $email =$_POST['email'];
        $password = $_POST['password'];
    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codebook | Login</title>
    <style>
        #bar{
            height: 100px; 
            background-color: rgb(59, 89, 152 ); 
            color: #d9dfeb; 
            padding: 4px;
        }
        #Signup_button{
            background-color: #42b721;
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
        }
        #button{
            width: 300px;
            height: 40px;
            border-radius: 4px;
            font-weight: bold;
            border: none;
            background-color: rgb(59, 89, 152);
            color: white;
        }
    </style>
</head>
<body style="font-family: tahoma; background-color: #e9ebee;">
    <div id="bar" >
        <div style="font-size: 40px;">Codebook</div>
        <div id="Signup_button">Signup</div>
    </div>
    <div id="bar2">
        <form method ="post">
            Log in to  Codebook <br><br>
            <input name="email"  value="<?php echo $email ?>" type="text", id="text" placeholder="Email"><br><br>
            <input name="password" value="<?php echo $password ?>" type="password", id="text" placeholder="Password"><br><br>
            <input type="submit", id="button" value="Login">
            <br><br><br>
        </form>
        
    </div>
</body>
</html>