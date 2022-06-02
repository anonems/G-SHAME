<?php
session_start();
if( $_SESSION["connecte"] === false){
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = filter_input(INPUT_POST, "code");
    $verif = filter_input(INPUT_POST, "verif");
    $fname = filter_input(INPUT_POST, "fname");
    $lname = filter_input(INPUT_POST, "lname");
    $email = filter_input(INPUT_POST, "email");
    $phone = filter_input(INPUT_POST, "phone");
    $gender = filter_input(INPUT_POST, "gender");
    $bday = filter_input(INPUT_POST, "bday");
    require('../lib/functions.php');
    $verifcode = rdm_mdp(8);

    $pwd = rdm_mdp(16);
    $username = rdm_mdp(12);

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
if(isset($_POST['verifcode'])) {
    require('../cobdd.php');
    if($verif===$code){
        $maRequete = $pdo->prepare("INSERT INTO user (id_user,fname,lname,birth_date,gender,email,phone,pwd) VALUES(:username,:fname,:lname,:bday,:gender,:email,:phone,:pwd)");
        $maRequete->execute(array(
        'username' => $username,
        'fname' => $fname,
        'pwd' => $pwd,
        'lname' => $lname, 
        'email' => $email,
        'phone' => $phone,
        'gender' => $gender,
        'bday' => $bday
    ));
    $_SESSION["connecte"] = false;
    $_SESSION["username"] = $username;
    header('Location: hello.php');    
    }else{
        echo "<h2 style='color:red'>Code incorrect!</h2>";

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
                    <h2>SIGN UP 2/6</h2>
                    <h3>Email validation</h3>
                    <h4>Please enter the validate code!</h4>
                </div>
                <form  class="main-container-form" method="post">
                    <div>
                    <label for="gender">show</label>   
                    <input type="checkbox" name="gender" onclick="show()">
                        <label for="text">Validate code</label>                     
                        <input type="password" class="firstName"  id="pwd" placeholder="Enter your code" name="code" required>                        
                    </div>
                    <input type="hidden" name="verif" value="<?=$verifcode?>">
                    <input type="hidden" name="fname" value="<?=$fname?>">
                    <input type="hidden" name="lname" value="<?=$lname?>">
                    <input type="hidden" name="email" value="<?=$email?>">
                    <input type="hidden" name="phone" value="<?=$phone?>">
                    <input type="hidden" name="gender" value="<?=$gender?>">
                    <input type="hidden" name="bday" value="<?=$bday?>">

                    
                    <button class="btn2" type="submit" name="verifcode">Submit</button>
                    <div class="other2">
                        <span>You dont recive any code?</span>
                        <a  href="#" onclick="alert('<?=$verifcode?>');return false; "><span class="purple">show</span></a>

                    </div>
                </form>
            </div>
        </div>
    </main>
    <aside class="aside2"></aside>
</body>
<script src="../javascript/script.js"></script>

</html>
<?php }}}else{    header('Location: ../feed/feed.php');   } ?>
