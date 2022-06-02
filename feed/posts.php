<?php
                require('../cobdd.php');
                $username = $_SESSION["username"];
                $maRequete = $pdo->prepare("SELECT * FROM post ORDER BY pub_date DESC");
                $maRequete->execute();
                $postes = $maRequete->fetchAll(PDO::FETCH_ASSOC);
               
            if ($postes){
            foreach($postes as $poste): 
                $maRequete1 = $pdo->prepare("SELECT * FROM user WHERE id_user=:userp ");
                $maRequete1->execute(['userp'=>$poste['id_user']]);
                $postes1 = $maRequete1->fetch();
                if($postes1['profil_type']!='prive'){
            ?>
            <div class="post">
                <div class="postProfile">
                    <img src="../data/<?= $poste["id_user"] ?>/profilimg.png" alt="" />
                </div>
                
                <div class="postBody">
                    <div class="postHeader">
                        <div class="postUsername">
                            <h3> 
                            <a href="profil.php?user=<?=$poste['id_user']?>"><span class="pseudo">@<?= $poste["id_user"] ?></span></a>
                            <?php if($poste['id_page']>0){
                                 $maRequete1 = $pdo->prepare("SELECT * FROM pages WHERE id=:username" );
                                 $maRequete1->execute(['username'=>$poste['id_page']]);
                                 $userinfo = $maRequete1->fetch();
                                 ?>
                                a publié sur la page <a href="profil_page.php?title=<?=$userinfo['title']?>"><?=$userinfo['title']?></a>
                                <?php } ?>
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
                        <?php if($poste['id_user']===$username){ ?><form method="post"><input type="hidden" name="idd" value="<?= $poste["id"] ?>"> <button style="background-color:transparent; border:none"  name='deld' type="submit" class="material-symbols-outlined"> delete </button> <?php } ?>
                        <!-- <form method="post"><button type="submit" name="share" style="background-color:transparent; border:none" class="material-symbols-outlined"> share <span><?= $poste["share"] ?></span></button>       </form>  -->
                                         
                    </div>
                </div>
            </div>
            <?php }; 
            endforeach; 
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
            }else{echo 'aucun post';}?>