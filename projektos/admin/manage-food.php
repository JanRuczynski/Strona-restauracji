<?php 
include('parts/menu.php'); 
include('../connection.php')
?>

<div class="main-content">
    <div class="wrapper">
        <div class="text-left">
            <h1>Zarządzaj daniami</h1>
            <br/>
            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>
            <br/>
            <br/>
            <br/>


            <a href="food.php" class="btn-primary">Dodaj pozycję</a>
        </div>
        <br /><br /><br />
        <table class="tbl-full">
            <tr>
                <th>Numer</th>
                <th>Nazwa dania</th>
                <th>Cena</th>
                <th>Obrazek</th>
                <th>Aktywne?</th>
                <th>Polecane?</th>
                <th>Akcje</th>
            </tr>

            <?php
                $sql = "SELECT * FROM food";
                $res = mysqli_query($con, $sql);
                if($res == true){
                    $count = mysqli_num_rows($res);
                    if($count>0){
                        while($rows=mysqli_fetch_assoc($res)){
                            $id=$rows['id'];
                            $title=$rows['title'];
                            $price=$rows['price'];
                            $image_name=$rows['image_name'];
                            $featured=$rows['featured'];
                            $active=$rows['active'];

                            ?>
                                <tr>
                                    <td><?php echo $id?></td>
                                    <td><?php echo $title ?></td>
                                    <td><?php echo $price."zł" ?></td>
                                    <td>
                                        <?php
                                            if($image_name=="") {
                                                echo "<div class='error'>Brak obrazka.</div>";
                                            }
                                            else {
                                                ?>
                                                <img src="../images/foodimages/<?php echo $image_name; ?>" width="100px">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $active ?></td>
                                    <td><?php echo $featured ?></td>
                                    <td>
                                        <a href="update-food.php?id=<?php echo $id;?>" class="btn-secondary">Zaaktualizuj dane</a>
                                        <a href="delete-food.php?id=<?php echo $id;?>" class="btn-3">Usuń pozycję</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    else{
                    }
                }
            ?>
        </table>
    </div>
</div>     


<?php include('parts/footer.php'); ?>