<?php
    include('../connection.php');
    include('parts/const.php');

    $id = $_GET['id'];
    
    $sql = "DELETE FROM users WHERE id = $id";

    $res = mysqli_query($con, $sql);

    if($res==true) {
        $_SESSION['delete'] = "<div class='success'>Administrator pomyślnie usunięty.</div>";
        header('Location: ../admin/manage-admin.php');
    }
    else {

        $_SESSION['delete'] = "<div class='error'>Nie udało się usunąć administratora.</div>";
        header('Location: ../admin/manage-admin.php');
    }
?>