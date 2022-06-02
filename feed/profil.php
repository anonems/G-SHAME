<?php session_start();
if( $_SESSION["connecte"] === true){
    $username = $_SESSION["username"];
     ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profil</title>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../css/styleFeed.css" />

    </head>

    <body>
        <?php require('menuleft.php'); ?>
        <div class="feed">
            <div class="title">
                <h2>Profil</h2>
            </div>
                <?php
                    require('profil_user.php');
                ?>
        </div>
        <?php require('menuright.php'); ?>
    </body>    

</html>
        
<!-- <form action="../authentification/logout.php"><button type="submit">SE DECONNECTER</button></form> -->

<?php }else{    header('Location: ../index.php');    } ?>
