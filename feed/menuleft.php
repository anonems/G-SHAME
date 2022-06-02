<div class="sidebar">
            <div class="logo" ><img style="width:150px;" src="../data/g-shame/logo.png" alt=""></div>  
            <a href="feed.php">            
            <div class="sidebarChoice active">
                <span class="material-symbols-outlined"> home </span>
                <h2>Home</h2>
            </div>
</a>
<a onclick="alert('Bientot disponnible !');return false; " href="groupes.php">

            <div class="sidebarChoice">
                <span class="material-symbols-outlined"> group </span>              
                <h2>Groupes</h2>
            </div>
            </a>
<a href="pages.php">
            <div class="sidebarChoice">
                  <span class="material-symbols-outlined"> description</span>
                   <h2>Page</h2>
            </div>
            </a>
<a href="profil.php?user=<?=$username?>">
            <div class="sidebarChoice">
                <span class="material-symbols-outlined"> account_circle </span>                
                <h2>Profile</h2>
            </div>
            </a>
<a href="../authentification/logout.php">
            <div class="sidebarChoice">
                <span class="material-symbols-outlined"> logout </span>
                <h2>Log out</h2>
            </div>
            </a>

            
        </div>