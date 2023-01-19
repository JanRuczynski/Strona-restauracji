<?php 
include('parts/menu.php');
include('../functions.php');
include('parts/const.php');
?>

<div class="main-content">
    <div class="wrapper">
        <div class="text-left">
            <h1>Zarządzaj Administratorami</h1>
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


            <a href="add-admin.php" class="btn-primary">Dodaj administratora</a>
        </div>
        <br /><br /><br />
        <table class="tbl-full">
            <tr>
                <th>Numer</th>
                <th>Nazwa użytkownika</th>
                <th>Akcje</th>
            </tr>

            <?php
                $sql = "SELECT * FROM users";
                $res = mysqli_query($con, $sql);
                if($res == true){
                    $count = mysqli_num_rows($res);
                    if($count>0){
                        while($rows=mysqli_fetch_assoc($res)){
                            $id=$rows['id'];
                            $username=$rows['user_name'];

                            ?>
                                <tr>
                                    <td><?php echo $id?></td>
                                    <td><?php echo $username ?></td>
                                    <td>
                                        <a href="update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Zaaktualizuj dane</a>
                                        <a href="delete-admin.php?id=<?php echo $id;?>" class="btn-3">Usuń administratora</a>
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