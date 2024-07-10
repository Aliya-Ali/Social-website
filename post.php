<div id="post">
    <div>
        <?php
            $image = "social images/images/female.jpg";
            if ($ROW_USER['gender'] == "Male")
            {
                $image = "social images/images/male.jpg";
            }
        ?>
        <img  style="width: 75px;margin-right: 4px;" src="<?php echo $image?>" alt="">
    </div>
    <div>
    <div style="font-weight: bold;color: rgb(59, 89, 152 ) ">
    <?php echo $ROW_USER['first_name'] . " ". $ROW_USER['last_name'];?>
    </div>
        <?php echo $ROW['post']; ?>
        <br><br>
        <a href="">Like</a>. <a href="">Comment</a>
        <span style="color: #999;">
            <?php echo $ROW['date']?>
        </span>

    </div>

</div>
