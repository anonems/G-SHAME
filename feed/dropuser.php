
<?php
session_start();
if( $_SESSION["connecte"] === true){
        if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['droppage']))) {
            require('../cobdd.php');

            $idc = filter_input(INPUT_POST,'idd');
            rmdir('../data/'.$idc);

            $maRequete6 = $pdo->prepare("DELETE FROM user WHERE id_user=:id_user");
            $maRequete6->execute([
            'id_user' => $idc]
        );
            $maRequete7 = $pdo->prepare("DELETE FROM post WHERE id_user=:id_user");
            $maRequete7->execute([
            'id_user' => $idc]
        );
            header('Location: ../index.php');
        }
}
?>