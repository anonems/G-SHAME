<?php
    session_start();
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
</head>

<?php         

    require('../lib/functions.php');
    $verifcode = rdm_mdp(8);
if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['verifcode']))) {
    $verif = filter_input(INPUT_POST, "verif");
    $code = filter_input(INPUT_POST, "code");
    require('../cobdd.php');
    if($verif===$code){    
    header('Location: changemdp3.php');    
    }else{
        echo "<h2 style='color:red'>Code incorrect!</h2>";

    }
}
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
                    <h2>Forgot password 2/3</h2>
                    <h3>Email validation</h3>
                    <h4>Please enter the validate code!</h4>
                </div>
                <form  class="main-container-form" method="post">
                    <div>
                    <label for="gender">show</label>   
                    <input type="checkbox" name="gender" onclick="show()">
                        <label for="text">Validate code</label>                     
                        <input type="password" class="firstName"  id="pwd" placeholder="Enter your code" name="code" required>      
                        <input type="hidden" name="verif" value="<?=$verifcode?>">                  
                    </div>
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
<?php }else{        header('Location: ../index.php');};
?>