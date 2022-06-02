<?php
session_start();
$_SESSION["connecte"] = false ;

if( $_SESSION["connecte"] === false){
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
    <link rel="stylesheet" href="../css/style.css">
<?php
require('../cobdd.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, "email");
    $maRequete = $pdo->prepare(" SELECT email,id_user FROM user log WHERE email = :email ");
    $maRequete->execute(array(
        'email' => $email 
    ));
    $maRequete->setFetchMode(PDO::FETCH_ASSOC);
    $log = $maRequete->fetch();
    if($log['email']==$email){
        $_SESSION['username']=$log['id_user'];
        header('Location: changemdp2.php');
    }
    if($log['username'] != $username){
        echo "<h2 style='color:red'>identifiant indisponible, veuillez crée un compte <a href='../authentification/signup.php'>ici</a></h2> ";
    }else{
        echo "<h2 style='color:red'>mot de passe incorrect, reinitialisez-le <a href='../authentification/changmdp.php'>ici</a></h2> ";
    }
}else{
?>

<body>
    <aside class="aside3"></aside>
    <main class="main">
        <div class="main-header">
            <div class="main-header-left">
            <div class="logo" ><img style="width:150px;" src="../data/g-shame/logo.png" alt=""></div>  
            </div>
        </div>
        <div class="content">
            <div class="main-container">
                <div class="main-container-header">
                    <h2>Forgot password 1/3</h2>
                    <h4>No worries, we'll send you reset instructions.</h4>
                </div>
                <form class="main-container-form" method="post">
                    <div>
                        <input type="email" name="email" placeholder="Enter your email">
                    </div>
                    <button class="btn2" type="submit">Reset</button>
                    <div class="other">
                        <a href="../index.php"> <span class="purple">Back to log in</span></a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

<?php } }?>




</head>

</html>