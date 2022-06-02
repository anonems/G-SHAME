<?php 
session_start();
$_SESSION["connecte"] = false;
if( $_SESSION["connecte"] === true){
    header('Location: ../feed/feed.php');

}
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
                    <h2>SIGN UP 1/6</h2>
                    <h4>Please enter your details below to create a new account!</h4>
                    </div>
                    <form action="verifmail.php" class="main-container-form" method="post">
                    <label for="gender">Male</label>
                    <input type="checkbox" name="gender" value="male">
                    <label for="gender">Female</label>
                    <input type="checkbox" name="gender" value="female">
                    <label for="gender">Other</label>
                    <input type="checkbox" name="gender" value="other">             
                    <div class="name">
                        <label for="text">First name</label>                     
                        <input type="text" class="firstName" placeholder="Enter your first name" name="fname" required>                        
                        <label for="text">Last name</label>
                        <input type="text" class="lastName" placeholder="Enter your last name" name="lname" required>
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" placeholder="Enter your email" name="email" required>
                    </div>
                    <div>
                        <label for="number">Number</label>
                        <input type="number" placeholder="Enter your phone number" name="phone">
                    </div>
                    <div>
                        <label for="date">Date of birth</label>
                        <input type="date" placeholder="Enter your date of birth" name="bday" required>
                    </div>        
                    <input type="checkbox" required>J'accepte les termes et conditions d'utilisation.
                    <button class="btn2" type="submit">Create account</button>
                    <div class="other2">
                        <span>Already have an account?</span>
                        <a href="../index.php"><span class="purple">Log in</span></a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <aside class="aside2"></aside>
</body>

</html>
