<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<?php
session_start();
$_SESSION["connecte"] = false;
if( $_SESSION["connecte"] === true){
    header('Location: feed/feed.php');
}
require('cobdd.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username");
    $pwd = filter_input(INPUT_POST, "pwd");
    $maRequete = $pdo->prepare("SELECT id_user,pwd,email FROM user WHERE id_user = :id_user or email = :id_user ");
    $maRequete->execute([
        ":id_user" => $username
    ]);
    $maRequete->setFetchMode(PDO::FETCH_ASSOC);
    $log = $maRequete->fetch();
    if (($log['id_user'] == $username or $log['email'] == $username) && (password_verify($pwd, $log['pwd']) )){
            $_SESSION["connecte"] = true;
            $_SESSION["username"] = $username;
            http_response_code(302);
            header('Location: feed/feed.php');
            exit();
    }
        elseif(($log['id_user'] == $username or $log['email'] == $username)){
            echo "<h2 style='color:red'>mot de passe incorrect, reinitialisez-le <a href='../authentification/changmdp.php'>ici</a></h2> ";

        }else{
            echo "<h2 style='color:red'>identifiant indisponible, veuillez crée un compte <a href='../authentification/signup.php'>ici</a></h2> ";

        }
    }
else{
?>

<body>
<aside class="aside"></aside>
    <main class="main">
        <div class="main-header">
            <div class="main-header-left">
            <div class="logo" ><img style="width:150px;" src="data/g-shame/logo.png" alt=""></div>  
            </div>
        </div>
        <div class="content">
            <div class="main-container">
                <div class="main-container-header">
                    <h2>LOG IN</h2>
                    <h4>Welcome back! Please enter your details.</h4>
                </div>
                <form class="main-container-form" method="post">
                    <div>
                        <input type="text" placeholder="Enter your username" name="username" required>
                    </div>
                    <label for="gender">show</label>   
                    <input type="checkbox" name="gender" onclick="show()">
                    <div>
                        <input type="password" placeholder="Enter your password" name="pwd" id="pwd" required>
                    </div>
                    <div class="other">
                    <a href="authentification/changemdp.php"><span class="purple">Forgot pwd</span></a> 
                    </div>
                    <button class="btn1" type="submit">Log in</button>
                    <div class="line">
                        <span>Or</span>
                    </div>
                   <span class="other2">Don't have an account?</span>
                </form>
                <form class="main-container-form" action="authentification/signup.php"><button class="btn2" type="submit">Sign up</button></form>

            </div>
        </div>
    </main>
</body>
<script src="../javascript/script.js"></script>

</html>
<?php } ?>
