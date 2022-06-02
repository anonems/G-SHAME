            <?php

                require('../cobdd.php');
                $username = $_SESSION["username"];
                $maRequete = $pdo->prepare("SELECT * FROM comment WHERE id_post=:id_post ORDER BY pub_date DESC");
                $maRequete->execute(['id_post'=>$id_post]);
                $postes = $maRequete->fetchAll(PDO::FETCH_ASSOC);
            if ($postes){
            foreach($postes as $poste): 
           ?>
            <div class="post">
                
                <div class="postProfile">
                <img src="../data/<?= $poste["id_user"] ?>/profilimg.png" alt="" />
                </div>

                <div class="postCommentaire">
                    <div class="postHeader">
                        <div class="postUsername">
                            <h3>
                            <a href="profil.php?user=<?=$poste['id_user']?>"><span class="pseudo">@<?= $poste["id_user"] ?></span></a>
                            </h3>
                        </div>
                        <div class="postDescription">
                        <p><?= $poste["comment_content"] ?></p>
                        </div>
                    </div>
                    
                    <div class="postFooter">
                    <form method="post"> <input type="hidden" name="idp" value="<?= $poste["id"] ?>"> <button type="submit" name="favC" style="background-color:transparent; border:none" class="material-symbols-outlined"> favorite <span><?= $poste["fav"] ?></span></button>        </form>                 
                    <?php if($poste['id_user']===$username){ ?><form method="post"><input type="hidden" name="idp" value="<?= $poste["id"] ?>"> <button style="background-color:transparent; border:none"  name='delp' type="submit" class="material-symbols-outlined"> delete </button></form>  <?php } ?>

                    </div>
                    <span style="color:grey; "> Date de publication : <?=$poste['pub_date']?></span>

                </div>
            </div>
            <?php

             endforeach; 
             if(isset($_POST['favC'])){
                $idp = filter_input(INPUT_POST,'idp');
                $maRequete4 = $pdo->prepare("UPDATE comment SET fav = fav + 1 WHERE id=:id_comment");
                $maRequete4->execute([
                'id_comment' => $idp]
            );
            }
            elseif(isset($_POST['delp'])){
                $idd = filter_input(INPUT_POST,'idp');
                $maRequete5 = $pdo->prepare("DELETE FROM comment WHERE id=:id_comment");
                $maRequete5->execute(['id_comment' => $idd]
            );
            $id_post=filter_input(INPUT_GET,'id');
            $maRequete7 = $pdo->prepare("UPDATE post SET comment = comment - 1 WHERE id=:id_post");
            $maRequete7->execute([
                'id_post' => $id_post]
        );
            }
            }else{echo 'aucun commentaire';}?>