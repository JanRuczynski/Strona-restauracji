<?php
    include('../connection.php');
    include('parts/const.php');
    include('parts/menu.php');

    
?>

<div class="main=content">
    <div class="wrapper">
        <h1>Zaaktualizuj pozycję</h1>

        <br><br>

        <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM food WHERE id=$id";

            $res = mysqli_query($con, $sql);

            if($res==true) {
                $count = mysqli_num_rows($res);
                if($count==1) {
                    $row = mysqli_fetch_assoc($res);

                    $title=$row['title'];
                    $description=$row['description'];
                    $price=$row['price'];
                    $image_name=$row['image_name'];
                    $featured=$row['featured'];
                    $active=$row['active'];
                }
                else {
                    header('Location: ../admin/manage-food.php');
                }
            }
        ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Nazwa: </td>
                        <td>
                            <input type="text" name="title" placeholder="Nazwa pozycji">
                        </td>
                    </tr>
                    <tr>
                        <td>Opis: </td>
                        <td>
                            <textarea name="description" cols="30" rows="5" placeholder="Opis pozycji."></textarea>    
                        </td>
                    </tr>
                    <tr>
                        <td>Cena: </td>
                        <td>
                            <input type="number" name="price">
                        </td>
                    </tr>
                    <tr>
                        <td>Wybierz obrazek: </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>Polecane: </td>
                        <td>
                            <input type="radio" name="featured" value="Yes"> Tak
                            <input type="radio" name="featured" value="No"> Nie
                     </td>
                    </tr>
                    <tr>
                        <td>Aktywne: </td>
                        <td>
                            <input type="radio" name="active" value="Yes"> Tak
                            <input type="radio" name="active" value="No"> Nie
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
    </div>
</div>

<?php
    if(isset($_POST['submit'])) {
        $id = $_GET['id'];
        $title=$row['title'];
        $price=$row['price'];
        $image_name=$row['image_name'];
        $featured=$row['featured'];
        $active=$row['active'];
    
        $sql = "UPDATE food SET
            title='$title',
            description = '$description',
            price = $price,
            image_name = '$image_name',
            featured = '$featured',
            active = '$active'
            WHERE id = $id
        ";
    
        $res = mysqli_query($con, $sql);
    
        if($res==true) {
            $_SESSION['update'] = "<div class='success'>Dane zaaktualizowane pomyślnie.</div>";
            header('Location: ../admin/manage-food.php');
        }
        else{
            $_SESSION['update'] = "<div class='error'>Dane nie zostały zaaktualizowane pomyślnie.</div>";
            header('Location: ../admin/manage-food.php');
        }
    }
    
?>

<?php
    include('parts/footer.php');
?>