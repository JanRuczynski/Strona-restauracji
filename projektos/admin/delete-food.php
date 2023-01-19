<?php
    include('../connection.php');
    include('parts/const.php');

    $id = $_GET['id'];
    
    $sql = "DELETE FROM food WHERE id = $id";

    $res = mysqli_query($con, $sql);

    if($res==true) {
        $_SESSION['delete'] = "<div class='success'>Pozycja pomyślnie usunięta.</div>";
        header('Location: ../admin/manage-food.php');
    }
    else {

        $_SESSION['delete'] = "<div class='error'>Nie udało się usunąć pozycji.</div>";
        header('Location: ../admin/manage-food.php');
    }
?>