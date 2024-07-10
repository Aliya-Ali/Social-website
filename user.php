<div id="friends">
    <?php
        $image = "social images/images/female.jpg";
            if ($FRIEND_ROW['gender'] == "Male")
            {
                $image = "social images/images/male.jpg";
            }
        ?>

    <img id="friends_img" src="<?php echo $image?>" alt="">
        <br>
        <?php echo $FRIEND_ROW['first_name']. " ".$FRIEND_ROW['last_name'];?> 
 </div>