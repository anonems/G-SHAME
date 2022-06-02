<?php
session_start();
if( $_SESSION["connecte"] === false){
    $id_user = $_SESSION["username"]
     ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php
require('../cobdd.php');

if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['hello']))) {
    //$id_user = filter_input(INPUT_GET, "ref");
    $username = filter_input(INPUT_POST, "username");
    $descript = filter_input(INPUT_POST, "descript");

    $username = str_replace(' ', '_', $username);
    $maRequete2 = $pdo->prepare("SELECT id_user FROM user WHERE id_user = :id_user");
    $maRequete2->execute(['id_user' => $username]);
    $verifuse = $maRequete2->fetch(); 

    if (!$verifuse){
    $maRequete = $pdo->prepare("UPDATE user SET id_user=:username, descript=:descript WHERE id_user = :id_user");
    $maRequete->execute(array(
        'id_user' => $id_user,
        'username' => $username,
        'descript' => $descript        
    ));
    $_SESSION["username"] = $username;
    mkdir('../data/'.$username.'');
    mkdir('../data/'.$username.'/img');
    header('Location: creatmdp.php');    
    }elseif($verifuse){
        echo "<h2 style='color:red'>Ce nom d'utilisateur existe déjà,<br> veuillez en choisir un autre.</h2>";
    }
}else{
?>
<body>
    <main class="main">
        <div class="main-header">
            <div class="main-header-left">
            <div class="logo" ><img style="width:150px;" src="../data/g-shame/logo.png" alt=""></div>  
            </div>
        </div>
        <div class="content">
            <div class="main-container">
                <div class="main-container-header">
                    <h2>SIGN UP 3/6</h2>
                    <h3>complete your profil</h3>
                    
                </div>
                <form class="main-container-form" method="post">
                    <div>
                        <label for="text">username</label>                     
                        <input type="text" class="firstName" placeholder="Enter a username" name="username" required>  
                        <label for="text">description</label>                     
                        <input type="text" class="firstName" placeholder="Enter your description" name="descript" >                       
                    </div>
                    
                    <button class="btn2" type="submit" name="hello">Next</button>
                    
                </form>
            </div>
        </div>
    </main>
    <aside class="aside2"></aside>
</body>


</html>
<?php }}else{        header('Location: ../feed/feed.php');
    } ?>
