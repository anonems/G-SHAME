<?php 
session_start();
if( $_SESSION["connecte"] === true){
require('../cobdd.php');
$username = $_SESSION["username"];
$page_id= filter_input(INPUT_GET,'title');
$maRequete1 = $pdo->prepare("SELECT * FROM pages WHERE title=:username" );
$maRequete1->execute(['username'=>$page_id]);
$userinfo = $maRequete1->fetch();
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
                <h2>Pages</h2>
            </div>
<div style=" background-image: url('../data/pages/<?= $page_id ?>/banniere.jpg')" class = "banniere">

</div>

<div class="profil">
<img src="../data/pages/<?= $page_id ?>/profilimg.png" alt="" />
</div>
<?php  if($username == $userinfo['admin1'] or $username == $userinfo['admin2'] or  $username == $userinfo['admin3'] ){?>
<a href="modif_info_page.php?title=<?=$page_id?>">
    <div class="modifierProfil">
    <br>
    <h3>Modifier Page</h3>
</div></a>
<?php }?>

<div class="profilName">

    <h2><?=$userinfo['title']?></h2>
    <span class="categorie"><?=$userinfo['categ']?></span><br>
</div>


<div class="description">
<span>À propos :</span> <br>
<?=$userinfo['descript']?></div>

<div class="dateCreation">
<span class="material-symbols-outlined">calendar_month
</span> <span class="categorie"><?=$userinfo['creat_date']?></span>
</div>
<hr />

<?php  if($username == $userinfo['admin1'] or $username == $userinfo['admin2'] or  $username == $userinfo['admin3'] ){

require('creatpost.php') ;
}
 require('../cobdd.php');
 $idpage=$userinfo['id'];


                $maRequete = $pdo->prepare("SELECT * FROM post WHERE id_page=:username ORDER BY pub_date DESC" );
                $maRequete->execute(['username'=>$idpage]);
                $postes = $maRequete->fetchAll(PDO::FETCH_ASSOC);
            if ($postes){
            foreach($postes as $poste): ?>
            <div class="post">
                <div class="postProfile">
                    <img src="../data/pages/<?= $userinfo['title'] ?>/profilimg.png" alt="" />
                </div>
                
                <div class="postBody">
                    <div class="postHeader">
                        <div class="postUsername">
                            <h3> 
                            <a href="profil.php?user=<?=$poste['id_page']?>"><span class="pseudo">@<?=$userinfo['title']?></span></a>

                            </h3>
                        </div>
                        <div class="postDescription">
                            <p><?= $poste["text_content"] ?></p>
                        </div>
                    </div>

                    <?php if ($poste["type_media"]=='img_link'){?>
                    <img src="<?= $poste["media_link"] ?>" alt="" > 
                    <?php }elseif($poste["type_media"]=='plink'){?>
                        <a href="<?= $poste["media_link"] ?>">visiter le lien</a>
                        <?php }elseif($poste["type_media"]=='img_u'){?>     
                        <img src="<?= $poste["img_name"] ?>" alt="" > 
                        <?php } ?>
                    <div class="postFooter">
                        <form method="post"><input type="hidden" name="idc" value="<?= $poste["id"] ?>"> <button type="submit" name="favd" style="background-color:transparent; border:none" class="material-symbols-outlined"> favorite <span><?= $poste["fav"] ?></span></button>        </form>                 
                        <form action="focus.php?id=<?=$poste['id']?>" method="post"><button type="submit" name="comment" style="background-color:transparent; border:none" class="material-symbols-outlined"> chat_bubble <span><?= $poste["comment"] ?></span></button>  </form>   
                        <?php if($_SESSION["username"] == $userinfo['admin1'] or $_SESSION["username"] == $userinfo['admin2'] or  $_SESSION["username"]== $userinfo['admin3']){ ?><form method="post"><input type="hidden" name="idd" value="<?= $poste["id"] ?>"> <button style="background-color:transparent; border:none"  name='deld' type="submit" class="material-symbols-outlined"> delete </button> <?php } ?>
                        <!-- <form method="post"><button type="submit" name="share" style="background-color:transparent; border:none" class="material-symbols-outlined"> share <span><?= $poste["share"] ?></span></button>       </form>  -->
                                         
                    </div>
                </div>
            </div>
            <?php endforeach; 
            if(isset($_POST['favd'])){
                $idc = filter_input(INPUT_POST,'idc');
                $maRequete3 = $pdo->prepare("UPDATE post SET fav = fav + 1 WHERE id=:id_post");
                $maRequete3->execute([
                'id_post' => $idc]
            );
            }
            elseif(isset($_POST['deld'])){
                $idc = filter_input(INPUT_POST,'idd');
                $maRequete6 = $pdo->prepare("DELETE FROM post WHERE id=:id_post");
                $maRequete6->execute([
                'id_post' => $idc]
            );
            
            }
            }else{echo 'aucun post';}}?>
</div>

<?php require('menuright.php'); ?>

</body>    

</html>

