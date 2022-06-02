<?php 
if( $_SESSION["connecte"] === true){
    $id_user = $_SESSION["username"];
    $page_id = 0;
    if(isset($_GET['title'])){
    $usepage =  filter_input(INPUT_GET,'title');
    $maRequete1 = $pdo->prepare("SELECT * FROM pages WHERE title=:username" );
    $maRequete1->execute(['username'=>$usepage]);
    $userinfo = $maRequete1->fetch();
    $target_dir = "../data/pages/".$usepage."/img/";
    $idpage = $userinfo['id'];
    }
    ini_set('file_uploads','On');


    require('../cobdd.php');
    if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['creat_post']))) {
        $newimgname = "";
        if (isset($_FILES["profilimg"]["name"])) {
            $target_dir = "../data/".$id_user."/img/";
            $target_file = $target_dir . basename($_FILES["profilimg"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $newimgname =$target_file;
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
            // if (file_exists($newimgname)) {
            //     unlink( $newimgname ) ;
            //     echo "Sorry, file already exists.";
            //     $uploadOk = 0;
            // }
            // Check file size
            if ($_FILES["profilimg"]["size"] > 500000) {
                //echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
               // echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["profilimg"]["tmp_name"], $newimgname)) {
                    //header('Location: hello3.php');    
                //echo "The file ". htmlspecialchars( basename( $_FILES["profilimg"]["name"])). " has been uploaded.";
                } else {
                //echo "Sorry, there was an error uploading your file.";
                }
            }
}
        $img_name = $newimgname;

        $text_content = filter_input(INPUT_POST, 'content_text');
        $media_link = filter_input(INPUT_POST, 'media_link');
        $type_media = filter_input(INPUT_POST, 'typemedia');
        $maRequete = $pdo->prepare("INSERT INTO post (text_content,id_user,media_link,type_media,img_name,id_page) VALUES(:text_content,:id_user,:media_link,:type_media,:img_name,:id_page)");
        $maRequete->execute(array(
        'text_content' => $text_content,
        'id_user' => $id_user,
        'id_page' => $userinfo['id'],
        'media_link' => $media_link,
        'type_media' => $type_media,
        'img_name' => $img_name
        ));
}
?>
<div class="header">

<form method="post" enctype="multipart/form-data">
                    <div class="insideHeader">
                        <img src="../data/<?= $id_user ?>/profilimg.png" alt="" />
                        <input type="text" placeholder="@<?= $id_user ?>, Écrivez quelque chose ici" name="content_text" required>
                    </div>
                    <div class="insideFooter">
                        <label for="media">Ajouter un média : </label>
                        <input type="url" name="media_link" placeholder="collez votre lien.">

                        <select name="typemedia" required>
                        <option value="">Type du media</option>
                        <option value="vide">sans média</option>
                        <option value="img_link">image url</option>
                        <option value="img_u">image chargé</option>
                        <option value="plink">lien</option>
                        </select>

                        ou
                        <input type="file"  name="profilimg" id="profilimg">

                        <button type="submit" name="creat_post" class="headerBtn">Publier</button>
                    </div>
                </form>
            </div>
            <?php }?>
            