    <?php
    session_start();

    if ($_SESSION['role']==0)
    {
         include_once('menu_admin.php');
       
    }
    else if($_SESSION['role']==1)
    {
         include_once('menu_master.php');
    
    }
    
?>
