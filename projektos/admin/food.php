<?php include('parts/menu.php'); 
include("../connection.php");?>

<div class="main-content">
    <div class="wrapper">
        <div class="text-left">
            <h1>Jedzenie</h1>

            <br><br>

            <?php
                if(isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" name="title" placeholder="Nazwa pozycji">
                        </td>
                    </tr>
                    <tr>
                        <td>Description: </td>
                        <td>
                            <textarea name="description" cols="30" rows="5" placeholder="Opis pozycji."></textarea>    
                        </td>
                    </tr>
                    <tr>
                        <td>Price: </td>
                        <td>
                            <input type="number" name="price">
                        </td>
                    </tr>
                    <tr>
                        <td>Select image: </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input type="radio" name="featured" value="Yes"> Yes
                            <input type="radio" name="featured" value="No"> No
                     </td>
                    </tr>
                    <tr>
                        <td>Active: </td>
                        <td>
                            <input type="radio" name="active" value="Yes"> Yes
                            <input type="radio" name="active" value="No"> No
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
            <?php
                if(isset($_POST['submit'])) {
                    echo "chuj";
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];

                    if(isset($_POST['featured'])) {
                        $featured = $_POST['featured'];
                    }
                    else {
                        $featured = "No";
                    }

                    if(isset($_POST['active'])) {
                        $active = $_POST['active'];
                    }
                    else {
                        $active = "No";
                    }
                
                    if(isset($_FILES['image']['name'])){
                        $image_name = $_FILES['image']['name'];
                        if($image_name!="") {
                            $ext = end(explode('.', $image_name));
                            $image_name = "Food-Name-".rand(0000,9999).".".$ext;
                            $src = $_FILES['image']['tmp_name'];
                            $dst = "../images/foodimages/".$image_name;
                            $upload = move_uploaded_file($src, $dst);
                            if($upload==false) {
                                $_SESSION['upload']= "<div class='error'>Nie udało się zapisać obrazu.</div>";
                                //header('location:../admin/manage-food.php');
                                echo "chuj";
                                die();
                            }

                        }
                    }
                    else {
                        $image_name = "";
                    }
                    $sql = "INSERT INTO food SET
                        title='$title',
                        description = '$description',
                        price = $price,
                        image_name = '$image_name',
                        featured='$featured',
                        active='$active'
                    ";

                    $res = mysqli_query($con, $sql);

                    if($res==true) {
                        $_SESSION['add'] = "<div class='success'>Pozycja dodana pomyślnie.</div>";
                        header('location:../admin/manage-food.php');
                    }
                    else {
                        $_SESSION['add'] = "<div class='error'>Pozycja nie została dodana pomyślnie.</div>";
                        header('location:../admin/manage-food.php');
                    }
                }
            ?>
        </div>
    </div>
</div>
                


<?php include('parts/footer.php'); ?>