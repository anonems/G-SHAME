

            <?php 
if( $_SESSION["connecte"] === true){
    $id_user = $_SESSION["username"];
    ini_set('file_uploads','On');


    require('../cobdd.php');
    if(($_SERVER["REQUEST_METHOD"] == "POST") && (isset($_POST['creat_comment']))) {
        $id_post=filter_input(INPUT_GET,'id');
        $comment_content = filter_input(INPUT_POST, 'comment_content');
        $maRequete = $pdo->prepare("INSERT INTO comment (id_user,comment_content,id_post) VALUES(:id_user,:comment_content,:id_post)");
        $maRequete->execute(array(
        'id_user' => $id_user,
        'comment_content' => $comment_content,
        'id_post' => $id_post
        ));
        
        $maRequete3 = $pdo->prepare("UPDATE post SET comment = comment + 1 WHERE id=:id_poste");
        $maRequete3->execute([
        'id_poste' => $id_post]
    );


}
?>
<div class="header">
                <form method="post">
                    <div class="insideHeader">
                    <img src="../data/<?= $id_user?>/profilimg.png" alt="" />
                        <input type="text" name="comment_content" placeholder="Laissez un commentaire" required>
                    </div>
                    <div class="insideFooter">
                        <button type="submit" name="creat_comment" class="headerBtn">Publier</button>
                    </div>
                </form>
            </div>
            <?php }?>