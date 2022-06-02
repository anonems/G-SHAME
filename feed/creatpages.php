<?php 
session_start();
if( $_SESSION["connecte"] === true){
    $username = $_SESSION["username"];
     require("../cobdd.php");
if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['creatpage']))) {
        $title = filter_input(INPUT_POST,'title');
        $phone = filter_input(INPUT_POST,'phone');
        $adresse = filter_input(INPUT_POST,'adresse');
        $link = filter_input(INPUT_POST,'link');
        $descript = filter_input(INPUT_POST,'descript');
        $admin2 = filter_input(INPUT_POST,'admin2');
        $admin3 = filter_input(INPUT_POST,'admin3');
        $categ = filter_input(INPUT_POST,'categ');
        $maRequete = $pdo->prepare("INSERT INTO pages (title,phone,adresse,admin1,link,descript,admin2,admin3,categ) VALUES (:title,:phone,:adresse,:admin1,:link,:descript,:admin2,:admin3,:categ)");
        $maRequete->execute(array(
        'title' => $title,
        'phone' => $phone,
        'adresse' => $adresse,
        'admin1' => $_SESSION["username"], 
        'link' => $link,
        'descript' => $descript,
        'admin2' => $admin2,
        'admin3' => $admin3,
        'categ' => $categ
    ));
    $username = $_SESSION["username"];
    header('Location: profil_page.php?title='.$title.'');
    mkdir('../data/pages/'.$title.'');
    mkdir('../data/pages/'.$title.'/img');
    copy("../data/g-shame/banniere.jpg", "../data/pages/".$title."/banniere.jpg");
    copy("../data/g-shame/profilimg.png", "../data/pages/".$title."/profilimg.png");


}
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
                <h2>Creer une page</h2>
            </div>

            <form method="post" class="main-container-form">
                <h3>Informations sur la page :</h3>
                <div class="form">
                    <label for="name">Nom de la page</label>                     
                    <input type="text" name="title" class="firstName" placeholder="Nom de la page" required> 
                    <span class="descr">Utilisez le nom de votre entreprise, marque ou organisation, ou un nom qui explique l’objet de la Page.</span>                       
                </div>
                <div class="form">
                    <label for="catégorie">Catégorie</label>
                    <input type="text" placeholder="Catégorie" name="categ" required>
                    <span class="descr">Choisissez une catégorie qui décrit le type d’entreprise, d’organisation ou de sujet que votre Page représente. </span>
                </div>
                <div class="form">
                    <label for="description">Description</label>
                    <input type="text" name="descript" placeholder="Description">
                    <span class="descr">Décrivez ce que fait votre entreprise, le service que vous offrez ou l’objet de la Page.</span>
                </div>
                <div class="form">
                    <label for="description">Phone</label>
                    <input type="number" name="phone" placeholder="Phone" required>
                </div>
                <div class="form">
                    <label for="description">Lien</label>
                    <input type="url" name="link" placeholder="Link">
                </div>
                <div class="form">
                    <label for="description">Adresse</label>
                    <input type="text" name="adresse" placeholder="Adresse" >
                </div>
                <div class="form">
                    <label for="description">Ajouter un autre admin 2/3</label>
                    <input type="text" name="admin2" placeholder="@admin2">
                </div>
                <div class="form">
                    <label for="description">Ajouter un autre admin 3/3</label>
                    <input type="text" name="admin3" placeholder="@admin3">
                </div>
                <button type="submit" name="creatpage" class="createBtn">Creer la page</button>
            </form>
            </div>

            <?php require('menuright.php'); ?>

    </body>    
    
    </html>
    <?php } ?>
    
