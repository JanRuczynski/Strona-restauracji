<?php include('parts/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Dodaj kategorię</h1>

        <br><br>

        <?php
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="tytuł kategorii">
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
                        <input type="submit" name="add_category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['submit'])) {
                $title = $_POST['title'];

                if(isset($_POST['featured'])) {
                    $featured = $_POST['featured']
                }
                else {
                    $featured = "No";
                }

                if(isset($_POST['active'])) {
                    $active = $_POST['active']
                }
                else {
                    $active = "No";
                }
                
                $sql = "INSERT INTO tbl_category SET
                    title='$title',
                    featured='$featured',
                    active='$active'
                ";

                $res = mysqli_query($con, $sql);

                if($res==true) {
                    $_SESSION['add'] = "<div class='success'>Kategoria dodana pomyślnie.</div>";
                    header('location:../admin/category.php');
                }
                else {
                    $_SESSION['add'] = "<div class='error'>Kategoria nie została dodana pomyślnie.</div>";
                    header('location:../admin/category.php');
                }
            }
        ?>
    </div>
</div>
                


<?php include('parts/footer.php'); ?>