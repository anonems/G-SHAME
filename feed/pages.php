<?php
session_start();
if( $_SESSION["connecte"] === true){?>

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
            </div><?php
    $username = $_SESSION["username"];
    require('../cobdd.php');
    $username = $_SESSION["username"];
    $maRequete = $pdo->prepare("SELECT * FROM pages WHERE admin1 = :username OR admin2 = :username OR admin3 = :username");
    $maRequete->execute(['username' => $username]);
    $projets = $maRequete->fetchAll(PDO::FETCH_ASSOC);
    if ($projets){echo "<h3>Vos pages</h3>";?>
    <center>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>date de creation</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($projets as $projet): ?>
                    <tr>
                        <td><?= $projet["id"] ?></td>
                        <td>
                            <a href="profil_page.php?title=<?=$projet["title"]?>">
                                <?= $projet["title"] ?>
                            </a>
                        </td>
                        <td><?=$projet["creat_date"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
    <?php }else{echo 'vous n\'avez aucune page';}?>
    <br><br><a href="creatpages.php">Nouvelle page</a>
</div>

            <?php require('menuright.php'); ?>

    </body>    
    
    </html>
    <?php } ?>
    