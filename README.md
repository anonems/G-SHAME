# G-SHAME
Réseau social fait par des étudiants pour les étudiants.
# G-SHAME
Réseaux social d'étudiants.

Pour suivre l'avancée de ce projet je vous invite à visiter le future réseau social via le lien suivant : https://g-shame.go.yj.fr/<br>

Explication du projet :<br>
Dans le cadre de notre formation Back-end au sein d'HETIC, supervisé par M. BERTHIER Renaud, il nous est demandé, par groupe de 6 à 8 étudiants de réaliser un réseau social 'entre étudiant' en utilisant exclusivement du PHP et SQL pour le back et le HTML CSS et js pour le front.

Notre rendu : Le réseau social G-SHAME :<br>
<img src="https://g-shame.go.yj.fr/data/g-shame/logo.png">
(NB:G-SHAME = prmière lettre des prénoms des membres du groupe)

Caractéristique de G-SHAME :<br>

Inscription :<br>
L'inscription à été pensée en six étapes :<br>
    -information personnel (nom, prenom, mail, date de naissance, numéro de tel, adresse postal)
    -verification du mail renseigné via l'envoi d'un code de sécurité sur ce dernier
    -création d'un nom d'utilisateur et le descriptif du compte
    -création du mot de passe, celui-ci doit etre composé de 8 caractère dont minimum une majuscule, il ensuite enrengistrer sous format hacher
    -upload de l'image de profil 
    -upload de la bannière de profil
(si vous tester en local vous n'avez pas besoin d'indiquer de vrais mail, il vous suffit de cliquer sur le lien show et copier le code sécurité)
    <img src="https://g-shame.go.yj.fr/data/autre/login.png">


connexion :<br>
La connextion se fait de manière fluide via le nom d'utilisateur ou l'email principal et biensure le mot de passe
Le mot de passe peut etre modifier en cas d'oubli via un lien visible sur la page de connexion, la recupération du mot de passe se produit sous 3 étapes :
        -demande de l'adresse email concerné par le compte dont le mot de passe a été oublié
        -envoi d'un code de verification sur le mail
        -création d'un nouveau mot de passe
<img src="https://g-shame.go.yj.fr/data/autre/signin-min.png">

File d'actualité / Accueil :<br>
<img src="https://g-shame.go.yj.fr/data/autre/factu.png">
Page principale, divisé en quatre parties :<br>
    -Le menu de gauche, ce dernier permet de naviger parmis les différentes fonctionnalitées parmis : <br>
            La page d'accueil
            La page de groupe
            La page de 'pages publiques'
            La page de profile
            La deconnexion 
    <br>
    -La zone de création de poste <br>
            elle permet de publier tout genre de poste qui doivent obligatoirement contenir du texte, et dans lequel on peut y rajouter une image uploadé ou un lien contenant une image, ou meme un lien tout court. 
            Attention : il est indispensable de préciser si le poste contient un média et la cas échéant précisé de quel genre via une liste déroulante disponnible.
    <br>
    -Le file d'actualité qui recense tous les postes publiés par les étudiants diposant d'un compte PUBLIC sur le réseau G-SHAME, 
            L'utilisateur peut interagire avec un poste grace au like et au commentaire, et il peut aussi supprimer le post si et seulement si le post lui appartient.
            Les likes et commentaire possedes tous deux un compteur qui permet au posteur de connaitre les retours de son post.
            si le logo commentaire est actionner le post concerné est isolé affichant la date de publication et les commentaire de celui-ci sont afficher ainsi qu'une zone d'ajout de commentaire afin d'interagir avec le post, il est aussi possible liker les commentaire.
    <br>
    <img src="https://g-shame.go.yj.fr/data/autre/msg.png">
    -La barre de messagerie instantané, elle affiche les noms et preudo de tous les étudiants possédant un compte public et permet à l'utilisateur de discuter avec un des utilisateur disponible sur la liste simplement en cliquant sur sont nom.
<br>
Page de profil :<br>
<img src="https://g-shame.go.yj.fr/data/autre/profilperso.png">
chaque utilisateur possede une page de profil qui met en evidence sa bannière et photo de profil ainsi que son nom, pseudo, description et date de creation de compte an header,  ainsi qu'un fil d'actualité qui recense uniquement les postes publiés par le propriétaire du profil, le profil d'un utilisateur est accessible en cliquant sur sont pseudo sur un de ses postes.
on accede a son profil personnel et cliquant sur "profil" dans le menu, si et seulement si le profil nous appartient on voit apparaitre une zone de publication de poste similaire à celle decrite précedemment, ainsi qu'un bouton qui permet de modifier sont profil : 
<img src="https://g-shame.go.yj.fr/data/autre/modif.png">
    ce bouton nous ramene a une page qui permet de modifier :
        son nom, prenom, image de profil, bannière, mot de passe, description, email de recup, adresse postal et statut du compte(publique ou privé). Il permet aussi d'acceder un un autre bouton qui permet de supprimer son compte utilisateur et tout les postes qui lui appartiennent en un clique.
<br>

Pages publiques :<br>
<img src="https://g-shame.go.yj.fr/data/autre/pages.png">
le concept de pages publique permet un un utilisateur de faire valoir un etablissement ou une marque en créant une page représentant cette entitée, pour crée une page il suffit de cliquer sur PAGES dans le menu de gauche, une liste de vos pages déja crées apparait et un bouton créer une nouvel page est disponnible, pour crées une page il suffit de renseigné le titre, numéro, categorie, description at optionnelemnt deux autre administrateur si besoin.<br>
on a egalement accès au profil de la pages qui est similaire au profil utilisateur, les trois administrateur on accès a la page de modification et a la zone de publication, mais seul l'administrateur principal(celui qui à crée la page) est en mesure d'ajouter/supprimer les autre administrateurs et de supprimer la page ainsi que tout ses postes. 
<br>
sur le file d'actualité/page d'accueil, les postes sont afficher sous le nom de l'administrateur avec une mention "a publié sur la page toto" (en  cliquant sur toto on accède à la page)
<br>
La fonction de groupe :<br>
CETTE FONCTION N'ETANT PAS ACCESSIBLE A CE JOUR, CAR PAS NON TERMINER.
<br><br>

Prochaines améliorations :<br>
-permettre plus d'interaction avec les postes et les commentaires,<br>
-ajouter la fonction de groupe<br>
-rendre la messagerie plus instantanée, et amelioré le visuel<br>
-permettre d'ajouter des video sur les postes<br>
-afficher un aperçu des liens <br>
-uniformiser le language sur tout le site<br>
-rendre le site responsive<br>

<br><br>
Répartition des taches (chaqu'un c'est chargé de la partie sur laquelle il est plus à l'aise): <br><br>
<a href="https://www.linkedin.com/in/emir-hakiri/">EMIR HAKIRI</a> : Une grande partie du back(Autentification, Inscription, envoi de mail, gestion des sessions, upload des fichiers, gestion des pages et profil, gestion des postes et interaction, gestion de la base de donnée, ...)
<br>
<a href="https://www.linkedin.com/in/gajan-baskaran-/">GAJAN BASKARAN </a> : Une grande partie du front(page de connection, page d'inscription, feed, creation pages, barre de messagerie)
<br>
<a href="https://www.linkedin.com/in/sizan-mohammed-abu-taleb-334a39201/">SIZAN MUHAMMED ABU TALEB</a> : Une grande partie du front(feed, focus ds postes, commentaires, profil, modif du profil, menu de gauche)
<br>
<a href="https://www.linkedin.com/in/diouf-maguette-2735ba204/">MAGUETTE DIOUF</a> : messagerie instantannée.
<br>
<a href="https://www.linkedin.com/in/acc%C3%A8neroy/">ACCENE ROY</a> : partie groupe.
<br>
<a href="https://www.linkedin.com/in/romain-busso-932b58157/"> ROMAIN BUSSO</a>
<br>
<a href="https://www.linkedin.com/in/hgranier/">HUGO GRANIER</a>

<br><br>
Pour finir je m'excuse pour les eventuelles fautes d'orthographe :)
<br>
<a href="https://www.linkedin.com/in/emir-hakiri/">@anonems</a>









 
 




