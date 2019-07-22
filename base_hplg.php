<?php
    session_start();
?>

<html>
<?php

    $hostname = "localhost";
    $username = "root";
    $db_password = "123456";
    $database = "social_media";
    $conn = mysqli_connect($hostname, $username, $db_password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    //$sql = "SELECT * FROM posts";
    $sql2 = "SELECT
            *
            FROM
            users
            INNER JOIN
            posts  
            ON
            users.id = posts.user_id
            ORDER BY time DESC";
    $result2 = mysqli_query($conn, $sql2);            
//    $result = mysqli_query($conn, $sql);        
/*    if (!$result) 
    {
        die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }
*/
    if (!$result2) 
    {
        die("Error: " . $sql . "<br>" . mysqli_error($conn));
    }
?>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" href = "css/base_hplg_style.css"/>
        <title> Social Media Homepage </title>
    </head>
    
    <body>
        <div class= "logo">
            <img src="img/logo.jpeg"  alt="Sample Picture" style="width:65%" class= "center" />
            
        </div>
        <div class= "login">
             <div class= "col">
                <p class="loginb header"><b>My Dashboard</b></p>
             </div>
             <div class= "col">
                <p class="new header"><b>Logout</b></p>
             </div>             
             
        </div>
        
        
        <div class="posts">
        <?php
            if(isset($_SESSION['id']))
            {
            ?>
            <div class="create_post">
                <div class="write"><h3>Write something here </h3></div>
                <div class="status_box">
                 <textarea name="status" class="input_status"></textarea>
                </div> 
                <div>
                    <p class="post_button"><b>Post</b></p>
                </div>
        
            </div>
            <?php
            }
                while ($row2=mysqli_fetch_array($result2))
                {
            ?> 
            <div class="post1">
               
                <div class="body_posts">
                     <h4><?php   echo $row2['name'];     ?></h4>
                    <p class="w1"><?php     echo $row2['status'];                           ?>  </p>
                    <p class="foot"><?php   echo $row2['time'];                ?></p>
        
                </div>
            </div>    
        <?php 
            }
            mysqli_close($conn);	
        
        ?>     
        </div>        
        <div class="footer">
            <div class="connect"><p class= "connectp">Connect with us at</p></div>
            <div class="logos">
                <div class="fb"><img src="img/fb.png" alt="fb img" width="10%"/></div>
                <div class="yt"><img src="img/youtube.png" alt="yt img" width="10%"/></div>
            </div>
            <div class="doubts"><p class="doubtsp">For any doubts / questions, write us at-</p></div>
            <div class="mail"><p class="mailp"> queries@ungineering.com</p></div>
        </div>


    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/post.js"></script>
    </body>
</html>
