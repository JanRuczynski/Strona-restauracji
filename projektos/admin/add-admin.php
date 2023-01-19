<?php 
include('parts/menu.php'); 
include("../connection.php");
include("../functions.php");
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Dodaj Administratora</h1>
        </br>
        </br>
        </br>
        
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Nazwa użytkownika: </td>
                    <td>
                        <input type="text" name="user_name" placeholder="nazwa użytkownika">
                    </td>
                </tr>
                <tr>
                    <td>Hasło: </td>
                    <td>
                        <input type="password" name="password" placeholder="hasło">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('parts/footer.php'); ?>

<?php
    
    if(isset($_POST['submit'])){
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            $user_id = random_num(20);
            $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";
            echo $query;
        
            mysqli_query($con, $query);
            header("Location: manage-admin.php");

            die;
        }else
        {
            echo "Please enter some valid information";
        }
    }
?>