<?php 
session_start();
if( $_SESSION["connecte"] === true){
    $username = $_SESSION["username"];

     require("../cobdd.php");

if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['modifpage']))) {
    $username = $_SESSION["username"];

        $fname=filter_input(INPUT_POST,'fname');
        $lname=filter_input(INPUT_POST,'lname');
        $birth_date=filter_input(INPUT_POST,'birth_date');
        $recup_mail=filter_input(INPUT_POST,'recup_mail');
        $phone=filter_input(INPUT_POST,'phone');
        $profil_type=filter_input(INPUT_POST,'profil_type');
        $descript=filter_input(INPUT_POST,'descript');
        $maRequete = $pdo->prepare("UPDATE user SET fname=:fname,lname=:lname,birth_date=:birth_date,descript=:descript,recup_mail=:recup_mail,phone=:phone,profil_type=:profil_type WHERE id_user = :username ");
        $maRequete->execute(array(
        'fname' => $fname,
        'lname' => $lname,
        'birth_date' => $birth_date,
        'recup_mail' => $recup_mail,
        'phone' => $phone,
        'profil_type' => $profil_type,
        'descript' => $descript,
        'username' => $username
    ));
    header('Location: profil.php?user='.$username.'');

}
if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['hello2']))) {
    $username = $_SESSION["username"];

    ini_set('file_uploads','On');
    $target_dir = "../data/".$username."/";
    $target_file = $target_dir . basename($_FILES["profilimg"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $newimgname = $target_dir."profilimg.".$imageFileType;
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["profilimg"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }
    // Check if file already exists
    if (file_exists($newimgname)) {
        unlink( $newimgname ) ;
        //echo "Sorry, file already exists.";
        //$uploadOk = 0;
    }
    // Check file size
    if ($_FILES["profilimg"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["profilimg"]["tmp_name"], $newimgname)) {
        } else {
        echo "Sorry, there was an error uploading your file.";
        }
    }

}
if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['hello3']))) {
    $username = $_SESSION["username"];

    ini_set('file_uploads','On');
    $target_dir = "../data/".$username."/";
    $target_file = $target_dir . basename($_FILES["profilimg"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $newimgname = $target_dir."banniere.".$imageFileType;
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["profilimg"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }
    // Check if file already exists
    if (file_exists($newimgname)) {
        unlink( $newimgname ) ;
        //echo "Sorry, file already exists.";
        //$uploadOk = 0;
    }
    // Check file size
    if ($_FILES["profilimg"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["profilimg"]["tmp_name"], $newimgname)) {
        } else {
        echo "Sorry, there was an error uploading your file.";
        }
    }

}
$title = filter_input(INPUT_GET,'title');
$username = $_SESSION["username"];
$maRequete1 = $pdo->prepare("SELECT * FROM user WHERE id_user = :username  ");
$maRequete1->execute(array(
    'username' => $username
));
$page_info = $maRequete1->fetch();
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Page</title>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../css/styleFeed.css" />
    </head>

    <body>
    <?php require('menuleft.php'); ?>

        <div class="feed">
            <div class="title">
                <h2>Modifier une page</h2>
            </div>
            <form class="main-container-form" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="text">image de profile</label>                     
                        <input type="file" class="firstName" name="profilimg" id="profilimg">
                    </div>
                    
                    <button class="btn2" name="hello2" type="submit">upload</button>
                    
                </form>
                <form class="main-container-form" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="text">banniere</label>                     
                        <input type="file" class="firstName" name="profilimg" id="profilimg" >
                    </div>
                    
                    <button class="btn2" name="hello3" type="submit">upload</button>
                    
                </form>
            <form method="post" class="main-container-form">
                <h3>Informations sur la page :</h3>
                <a href="../authentification/changemdp.php">modifier le mot de passe</a>
                
                <div class="form">
                    <label for="catégorie">prenom</label>
                    <input type="text" value="<?=$page_info['fname']?>" name="fname" >
                </div>
                <div class="form">
                    <label for="description">nom</label>
                    <input type="text" name="lname" value="<?=$page_info['lname']?>">
                </div>
                <div class="form">
                    <label for="description">Phone</label>
                    <input type="number" name="phone" value="<?=$page_info['phone']?>">
                </div>
                <div class="form">
                    <label for="description">Date de naissance</label>
                    <input type="date" name="birth_date" value="<?=$page_info['birth_date']?>">
                </div>
                <div class="form">
                    <label for="description">email de recuperation</label>
                    <input type="eail" name="recup_mail" value="<?=$page_info['recup_mail']?>" >
                </div>
                <div class="form">
                    <label for="description">description</label>
                    <input type="text" name="descript" value="<?=$page_info['descript']?>">
                </div>
                <div class="form">
                    <label for="description">type de profile</label>
                    <select name="profil_type"  >
                        <option value="<?=$page_info['profil_type']?>">Faire un choix</option>
                        <option value="public">publique</option>
                        <option value="prive">privé</option>
                    </select>
                </div>
                <button type="submit" name="modifpage" class="createBtn">Modifier la page</button>
            </form>
            <form action="dropuser.php" method="post"><input type="hidden" name="idd" value="<?=$page_info['id_user']?>"><button  type="submit" name="droppage" style="color:red">Supprimer la compte</button></form>
            </div>

            <?php require('menuright.php'); ?>

    </body>    
    
    </html>
    <?php } ?>
    
