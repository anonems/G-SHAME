<?php
                $id_post=filter_input(INPUT_GET,'id');
if(isset($id_post)){
                
                require('../cobdd.php');
                $username = $_SESSION["username"];
                $maRequete = $pdo->prepare("SELECT * FROM post WHERE id = :id_post");
                $maRequete->execute(['id_post'=>$id_post]);
                $postes = $maRequete->fetch(PDO::FETCH_ASSOC);
                //echo $postes['text_content'];
                ?>
<body>
        

            
            <div class="post">
                <div class="postProfile">
                <img src="../data/<?= $postes["id_user"] ?>/profilimg.png" alt="" />
                </div>

                <div class="postBody">
                    <div class="postHeader">
                        <div class="postUsername">
                            <br>
                            <h3>
                                <span class="username">
                                <a href="profil.php?user=<?=$postes['id_user']?>"><span class="pseudo">@<?= $postes["id_user"] ?></span></a>
                                </span>
                            </h3>
                        </div>
                        <div class="postDescription">
                        <p><?= $postes["text_content"] ?></p>
                        </div>
                    </div>
                    <?php if ($postes["type_media"]=='img_link'){?>
                    <img src="<?= $postes["media_link"] ?>" alt="" > 
                    <?php }elseif($postes["type_media"]=='plink'){?>
                        <a href="<?= $postes["media_link"] ?>">visiter le lien</a>
                        <?php }elseif($postes["type_media"]=='img_u'){?>     
                        <img src="<?= $postes["img_name"] ?>" alt="" > 
                        <?php } ?>
                    <div class="postFooter">
                    <form method="post"><button type="submit" name="fav" style="background-color:transparent; border:none" class="material-symbols-outlined"> favorite <span><?= $postes["fav"] ?></span></button>  </form>                 
                        <span class="material-symbols-outlined"> chat_bubble <span><?=$postes['comment']?></span></span>
                        <!-- <span class="material-symbols-outlined"> share <span></span></span> -->
                    </div>
                    <br>
                    <span style="color:grey; font-size:100%"> Date de publication : <?=$postes['pub_date']?></span>
                </div>
            </div>
    </body>

    <?php 
    if(isset($_POST['fav'])){
        $maRequete3 = $pdo->prepare("UPDATE post SET fav = fav + 1 WHERE id=:id_poste");
        $maRequete3->execute([
        'id_poste' => $postes['id']]
    );
}
}else{    header('Location: feed.php');    } ?>
