<?php
session_start();
include("../connection.php");
include("../functions.php");

$user_data = check_login($con);
include('parts/menu.php')

?>


    <div class="main-content">
        <div class="wrapper">
        <h2>Hello, <?php echo $user_data['user_name']; ?></h2>
            <h2>Panel kontrolny</h2>
            
            <div class="col-4 text-center">
                <h1>5<h1>
                <br />
                Kategorie
            </div>
            <div class="col-4 text-center">
                <h1>5<h1>
                <br />
                Kategorie
            </div>
            <div class="col-4 text-center">
                <h1>5<h1>
                <br />
                Kategorie
            </div>
            <div class="col-4 text-center">
                <h1>5<h1>
                <br />
                Kategorie
            </div>

            <div class="clfx"></div>

            <br>
        </div>
    </div>
<?php include('parts/footer.php');