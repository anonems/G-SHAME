

                       <div class="rightSidebar">

<div class="title">
    <h2>Messagerie</h2>
</div>

<div class="searchingBar">
    <form method="post">
    <span class="material-symbols-outlined"> search </span>
    <input type="text"  name="recherche" placeholder="Chercher un ami">
    </form>
</div>




        <?php
            require('../cobdd.php');
            if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['recherche']))) {
                echo '<h4>resultat de votre recherche</h4>';
                $recherche = filter_input(INPUT_POST,'recherche');
                $maRequetes = $pdo->prepare("SELECT * FROM user where id_user = :recherche or fname = :recherche or lname = :recherche");
                $maRequetes->execute(['recherche'=> $recherche]);
                $postess = $maRequetes->fetchAll(PDO::FETCH_ASSOC);
            foreach($postess as $postes): 
                if (($postes['profil_type']!='prive') AND ($postes['id_user']!=$username)){?>
                    <div class="friends">
                <div class="friend">
                    <div class="postProfile">
                    <img src="../data/<?= $postes["id_user"] ?>/profilimg.png" alt="" />
                    </div>
                    <form action="#messagerie" method="post" >
                        <button type="submit" style="background-color:transparent; border:none"  >
                    <div class="username">
                            <h3> <?= $postes["fname"] ?> <?= $postes["lname"] ?>
                            <span class="pseudo">@<?= $postes["id_user"] ?></span>
                            </h3>
                        </div>
                        </button>
                        <input type="hidden" name="dest" value="<?=$postes['id_user']?>">
                    </form>

                </div>
                                        <br>
            
            <?php }; endforeach; 
        }else{

                $username = $_SESSION["username"];
                $maRequete = $pdo->prepare("SELECT * FROM user");
                $maRequete->execute();
                $postes = $maRequete->fetchAll(PDO::FETCH_ASSOC);

            foreach($postes as $poste): 
                if (($poste['profil_type']!='prive') AND ($poste['id_user']!=$username)){?>
                    <div class="friends">
                <div class="friend">
                    <div class="postProfile">
                    <img src="../data/<?= $poste["id_user"] ?>/profilimg.png" alt="" />
                    </div>
                    <form action="#messagerie" method="post" >
                        <button type="submit" style="background-color:transparent; border:none"  >
                    <div class="username">
                            <h3> <?= $poste["fname"] ?> <?= $poste["lname"] ?>
                            <span class="pseudo">@<?= $poste["id_user"] ?></span>
                            </h3>
                        </div>
                        </button>
                        <input type="hidden" name="dest" value="<?=$poste['id_user']?>">
                    </form>
               


                </div>
            
            <?php }; endforeach; 
            }               
            
            if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['postmsg']))) {
                $idg = filter_input(INPUT_POST,'dest');
                $msg_content = filter_input(INPUT_POST,'content');
            $maRequete8 = $pdo->prepare("INSERT INTO chatbox (content,id_user,id_dest) VALUES(:text_content,:id_user,:id_dest)");
            $maRequete8->execute(array(
            'text_content' => $msg_content,
            'id_user' => $username,
            'id_dest' => $idg,
            
            ));
        }
            
            

            ?>


<div id="messagerie" >
    <div class="messsagerieHeader">
        <a href="#">Fermer</a>
    </div>
                    <?php  
                            $idg = filter_input(INPUT_POST,'dest');
                            $username = $_SESSION["username"];
                            $maRequete = $pdo->prepare("SELECT * FROM chatbox WHERE (id_user = :username AND id_dest=:id_dest) OR (id_dest = :username AND id_user=:id_dest)");
                            $maRequete->execute(array('username' => $username,
                            'id_dest'=>$idg));
                            $msgg = $maRequete->fetchAll(PDO::FETCH_ASSOC);     
                            foreach($msgg as $msg): ?>
                            <br><br>
                            <?php if($msg['id_user']==$username){  
                                        ?><span>@<?=$msg['id_user']?> : </span><span><?=$msg['content']?></span><?php
                                    }else{?>               
                                        <span  style="color:green">@<?=$msg['id_user']?> : </span><span style="color:green"><?=$msg['content']?></span>
                            <?php }
                            endforeach; 

        
                            ?>

                <div class="msg" style="position: absolute; bottom: 0; left: 0; right: 0;margin:0;padding:0">
                    <form method="post">
                                    <input placeholder="Ecrire un message" name="content" class="userMsg" type="text"/>
                                    <input type="hidden" name="dest" value="<?=$idg?>">
                                    <input class="submitMsg" name="postmsg" type="submit" value="Envoyer"/>
                    </form>
                </div>
                                
                
            
</div>