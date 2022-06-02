<?php
session_start();
if( $_SESSION["connecte"] === true){
        if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['droppage']))) {
            $ida = filter_input(INPUT_POST,'ida');

                rmdir('../data/pages/'.$ida);
require('../cobdd.php');
                $idc = filter_input(INPUT_POST,'idd');

                    $maRequete6 = $pdo->prepare("DELETE FROM pages WHERE id=:id_page");
                    $maRequete6->execute([
                    'id_page' => $idc]
                );
                $maRequete7 = $pdo->prepare("DELETE FROM post WHERE id_page=:id_page");
                    $maRequete7->execute([
                    'id_page' => $idc]
                );
                header('Location: feed.php');
        }
}
?>