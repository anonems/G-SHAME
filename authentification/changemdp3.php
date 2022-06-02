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

if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['creatmdp']))) {
    //$id_user = filter_input(INPUT_GET, "ref");
    $pwd1 = filter_input(INPUT_POST, "pwd1");
    $pwd = filter_input(INPUT_POST, "pwd");
    $pwd_hash =  password_hash($pwd, PASSWORD_DEFAULT);

    if($pwd1===$pwd){
        $maRequete = $pdo->prepare("UPDATE user SET pwd=:pwd WHERE id_user = :id_user");
        $maRequete->execute(array(
        'id_user' => $id_user,
        'pwd' => $pwd_hash
    ));
    header('Location: ../index.php');    
    }else{
        echo "<h2 style='color:red'>Les deux mot de passes ne sont pas identiques!</h2>";
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
                    <h2>Forgot password 3/3</h2>
                    <h3>creat a password</h3>
                </div>
                <form class="main-container-form" method="post">
                    <div>
                    <label for="gender">show</label>   
                    <input type="checkbox" name="gender" onclick="show()">

                        <label for="text">Enter new password</label>                     
                        <input type="password" class="firstName" placeholder="Enter your password" name="pwd1" id="pwd" required>   
                        <label for="text">Validate your password</label>                      
                        <input type="password" class="firstName" placeholder="Confirm your password" name="pwd" id="pwd" required>                                            
                    </div>
                   
                    <button class="btn2" type="submit" name="creatmdp">Submit</button>

                </form>
            </div>
        </div>
    </main>
    <aside class="aside2"></aside>
</body>
<script src="../javascript/script.js"></script>
</html>
<?php }}else{        header('Location: ../feed/feed.php');
;    } ?>
