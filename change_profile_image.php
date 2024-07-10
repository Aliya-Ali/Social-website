<?php
    session_start();
    
    //print_r($_SESSION);
    include("classes/connect.php");
    include("classes/login.php");
    include("classes/user.php");
    include("classes/post.php");
    


    $login = new Login();
    $user_data = $login->check_login($_SESSION['codebook_userid']);
    //posting starts here 
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        echo "<pre>";
        print_r(($_POST));
        print_r($_FILES);
        echo "</pre>";
    }   
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile Image</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style type="text/css">
        #blue_bar{
            height: 50px;
            background-color: rgb(59, 89, 152 );
            color: white;
        }
        #search_box{
            width: 400px;
            height: 20px;
            border-radius: 5px;
            padding: 4px;
            font-size: 14px;
            background-image: url('social images/search.png');
            background-repeat: no-repeat;
            background-position: right;
            position: left;
            color: white;
        }
        #profile_pic{
            width: 150px;
            margin-top: -100px;
            border-radius: 50%;
            border: solid 1px white;
            margin-left:4px;
        }
        #menu_button{
            color: white;
            width: 100px;
            display: inline-block;
            font-size: 14px;

        }
        #friends_img{
            width: 75px;
            float: left;
            margin: 8px;
        }
        #friends_bar{
            background-color: white;
            min-height: 400px;
            margin-top: 20px;
            color: 8px;
            padding: 8px;
        }
        #friends{
            clear: both;
            font-size: 12px;
            font-weight: bold;
            color: rgb(59, 89, 152 );  
        }
        textarea{
            width: 100%;
            border: none;
            font-family: tahoma;
            font-size: 14px;
            height: 50px;
        }
        #post_button{
            float: right;
            background-color: rgb(59, 89, 152 );
            border: none;
            border-radius: 2px;
            padding: 4px;
            font-size: 14px;
            width: 50px;

            color: white; 
        }
        #post_bar{
            margin-top: 20px;
            background-color: white;
            padding: 10px;
        }
        #post{
            padding: 4px;
            font-size: 13px;
            display: flex;
            margin-bottom: 20px;

        }
    </style>
</head>
<body style="font-family: tahoma; background-color:#e9ebee;">
    <!--top bar-->
    <?php include("header.php");?>

    <div style="width: 800px; margin: auto;   min-height:  400px; position: relative;">
        <div style="display: flex;">
        
            <!--posts area-->
            <div style="min-height: 400px; flex: 2.5; padding: 20px; padding-right: 0px;">
                <form method="POST" enctype="multipart/form-data">
                    <div style="border: solid thin #aaa; padding: 10px;background-color:white;">
                        <input type="file" name="file">
                        <input id="post_button" type="submit" value="Post">
                        <br>
                    </div>
                    
                </form>        
            </div>
        </div>
    </div>
</body>
</html>