<?php
session_start();
if( $_SESSION["connecte"] === false){
    $username = $_SESSION["username"]
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
if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['hello2']))) {
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
            header('Location: hello3.php');    
        //echo "The file ". htmlspecialchars( basename( $_FILES["profilimg"]["name"])). " has been uploaded.";
        } else {
        echo "Sorry, there was an error uploading your file.";
        }
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
                    <h2>SIGN UP 5/6</h2>
                    <h3>complete your profil</h3>
                    <h4>Choose a profil image</h4>
                    
                </div>
                <form class="main-container-form" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="text">Select image</label>                     
                        <input type="file" class="firstName" name="profilimg" id="profilimg" required>
                    </div>
                    
                    <button class="btn2" name="hello2" type="submit">Next</button>
                    
                </form>
                <form class="main-container-form" method="post"><button class="btn1" name="hello22" type="submit">Skip</button></form>
            </div>
        </div>
    </main>
    <aside class="aside2"></aside>
</body>

<?php if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['hello22']))) {
        copy("../data/g-shame/banniere.jpg", "../data/".$_SESSION["username"]."/banniere.jpg");
        copy("../data/g-shame/profilimg.png", "../data/".$_SESSION["username"]."/profilimg.png");

header('Location: hello3.php');
}
?>
</html>
<?php }}else{        header('Location: ../feed/feed.php');
    } ?>
