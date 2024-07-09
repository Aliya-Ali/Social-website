<?php
    session_start();
    
    //print_r($_SESSION);
    include("classes/connect.php");
    include("classes/login.php");
    include("classes/user.php");
    include("classes/post.php");

    //check if user is logged in
    if(isset($_SESSION['codebook_userid']) && is_numeric($_SESSION['codebook_userid']))
    {
        $id = $_SESSION['codebook_userid'];
        $login = new Login();
        $result = $login->check_login($id);
        
        if($result)
        {
            //retrieve the data
            $user = new User();
            $user_data = $user->get_data($id);
            if(!$user_data)
            {
                header("Location: login.php");
                die;
            }
            
        }else
        {
            header("Location: login.php");
            die;
        }
    }else
    {
        header("Location: login.php");
        die;
    }

    //posting starts here 
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $post = new Post();
        $id = $_SESSION['codebook_userid'];
        $result = $post->create_post($id, $_POST);
        if($result == "")
        {
            header("Location: profile.php");
            die;
        }else
        {
            echo "<div style= 'text-align:center; font-size:12px; color: black'>";
            echo "the following errors occured: <br>";
            echo $result;
            echo "</div>";
        }        
    }
    $post = new Post();
    $id = $_SESSION['codebook_userid'];
    $posts = $post->get_posts($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style type="text/css">
        #blue_bar{
            height: 50px;
            background-color: grey;
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
            color: black;  
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
            background-color: black;
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
<body style="font-family: tahoma; background-color:lightgray;">
    <!--top bar-->
    <div id="blue_bar">
        <div style="margin: auto; font-size: 30px; ;">
            Codebook <input type="text" id="search_box" placeholder="Search for connection">
            <div id="menu_button">Timeline</div>
            <div id="menu_button">About</div>
            <div id="menu_button">Friend</div>
            <div id="menu_button">Photos</div>
            <div id="menu_button">Settings</div>

            <img src="social images/profile.jpg" style="width: 50px; float: right;">
            <a href="logout.php">
                <span style="font-size:11px; float:right; margin: 10px;color:white;">Logout</span>
            </a>
            </div>
    </div>
    <div style="width: 800px; margin: auto;   min-height:  400px; position: relative;">
        <div style="background-color:  white; text-align: left; color: black; border:black;">
            <img src="social images/background profile img.jpg" style="width: 100%;">
            <img src="social images/profile.jpg" id="profile_pic">
            <br>
                <div style="font-size: 20px; color:black;margin: 4px;"><?php echo $user_data['first_name']. " ". $user_data['last_name']?> </div>
            <br>
            
        </div>
        <div style="display: flex;">
            <div style=" min-height: 400px; flex: 1">
                <div id="friends_bar">
                    Friends <br>
                    <div id="friends">
                        <img id="friends_img" src="social images/user1.jpg" alt="">
                        <br>
                        First user
                    </div>
                    <div id="friends">
                        <img id="friends_img" src="social images/user2.jpg" alt="">
                        <br>
                        Second user
                    </div>
                    <div id="friends">
                        <img id="friends_img" src="social images/user3.jpg" alt="">
                        <br>
                        Third user
                    </div>
                    <div id="friends">
                        <img id="friends_img" src="social images/user4.jpg" alt="">
                        <br>
                        Fourth user
                    </div>
                </div>
            </div>
            <!--posts area-->
            <div style="min-height: 400px; flex: 2.5; padding: 20px; padding-right: 0px;">
                <div style="border: solid thin #aaa; padding: 10px; background-color: white;">
                    <form method="POST" action="profile.php">
                        <textarea name="post" placeholder="What's in you mind"></textarea>
                        <input id="post_button" type="submit" value="Post">
                        <br><br>
                    </form>
                    
                </div>
                <div id="post_bar">
                    <!--post1-->
                    <?php
                        if($posts)
                        {
                            foreach($posts as $row)
                            {
                                include("post.php");
                            }
                        }
                       
                    ?>

                </div>
            </div>

        </div>


    </div>
</body>
</html>