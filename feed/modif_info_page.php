<?php 
session_start();
if( $_SESSION["connecte"] === true){
    $username = $_SESSION["username"];
    
     require("../cobdd.php");
     $title = filter_input(INPUT_GET,'title');

if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['modifpage']))) {

        $adresse = filter_input(INPUT_POST,'adresse');
        $link = filter_input(INPUT_POST,'link');
        $descript = filter_input(INPUT_POST,'descript');
        $admin2 = filter_input(INPUT_POST,'admin2');
        $admin3 = filter_input(INPUT_POST,'admin3');
        $categ = filter_input(INPUT_POST,'categ');
        $maRequete = $pdo->prepare("UPDATE pages SET phone=:phone,adresse=:adresse,link=:link,descript=:descript,admin2=:admin2,admin3=:admin3,categ=:categ WHERE title = :title ");
        $maRequete->execute(array(
        'title' => $title,
        'phone' => $phone,
        'adresse' => $adresse,
        'link' => $link,
        'descript' => $descript,
        'admin2' => $admin2,
        'admin3' => $admin3,
        'categ' => $categ
    ));
    header('Location: profil_page.php?title='.$title.'');

}
if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['hello2']))) {
    ini_set('file_uploads','On');
    $target_dir = "../data/pages/".$title."/";
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
    ini_set('file_uploads','On');
    $target_dir = "../data/pages/".$title."/";
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

$maRequete1 = $pdo->prepare("SELECT * FROM pages WHERE title = :title  ");
$maRequete1->execute(array(
    'title' => $title
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
                        <input type="file" class="firstName" name="profilimg" id="profilimg" >
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
                
                <div class="form">
                    <label for="catégorie">Catégorie</label>
                    <input type="text" value="<?=$page_info['categ']?>" name="categ">
                    <span class="descr">Choisissez une catégorie qui décrit le type d’entreprise, d’organisation ou de sujet que votre Page représente. </span>
                </div>
                <div class="form">
                    <label for="description">Description</label>
                    <input type="text" name="descript" value="<?=$page_info['descript']?>">
                    <span class="descr">Décrivez ce que fait votre entreprise, le service que vous offrez ou l’objet de la Page.</span>
                </div>
                <div class="form">
                    <label for="description">Phone</label>
                    <input type="number" name="phone" value="<?=$page_info['phone']?>" >
                </div>
                <div class="form">
                    <label for="description">Lien</label>
                    <input type="url" name="link" value="<?=$page_info['link']?>">
                </div>
                <div class="form">
                    <label for="description">Adresse</label>
                    <input type="text" name="adresse" value="<?=$page_info['adresse']?>" >
                </div>
                <?php if($_SESSION["username"]===$page_info['admin1']){?>

                <div class="form">
                    <label for="description">Ajouter un autre admin 2/3</label>
                    <input type="text" name="admin2" value="<?=$page_info['admin2']?>">
                </div>
                <div class="form">
                    <label for="description">Ajouter un autre admin 3/3</label>
                    <input type="text" name="admin3" value="<?=$page_info['admin3']?>">
                </div>
                <?php } ?>

                <button type="submit" name="modifpage" class="createBtn">Modifier la page</button>
            </form>
            <?php if($_SESSION["username"]===$page_info['admin1']){?>
            <form action="droppage.php" method="post"><input type="hidden" name="ida" value="<?=$page_info['title']?>"><input type="hidden" name="idd" value="<?=$page_info['id']?>"><button  type="submit" name="droppage" style="color:red">Supprimer la page</button></form>
            <?php } ?>
            </div>

            <?php require('menuright.php'); ?>

    </body>    
    
    </html>
    <?php } ?>
    
