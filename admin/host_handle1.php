<?php
 if($_SERVER["REQUEST_METHOD"]=="POST"){
    if($_POST["ac_id"]=="IITG123"&&$_POST["iitg_password"]=="123456"){
        header('location:host.php');
    }
    else{
        echo '<script>confirm("IITG comunutity id and password is not matched! Please contact to the authorithity."); window.location = "admin.php"</script>';
    }
}
?>