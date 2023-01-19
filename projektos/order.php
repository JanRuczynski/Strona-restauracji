<?php
    include("fparts/fmenu.php");
    include("connection.php");
?>
    <?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM food WHERE id=$id";
        $res = mysqli_query($con, $sql);
        $count = mysqli_num_rows($res);
        if($count==1) {
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
        }
        else {
            header('location:index.php');
        }

    }
    else {
        header('location:index.php');
    }

    ?>
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Wypełnij ten formularz żeby złożyć zamówienie.</h2>

            <form action="#" class="order">
                <fieldset>
                    <legend>Wybrane jedzenie</legend>

                    <div class="food-menu-img">
                    <?php
                                if($image_name=="") {
                                    echo "<div class='error'>Obrazek niedostępny.</div>";
                                }
                                else {
                                    ?>
                                    <img src="images/foodimages/<?php echo $image_name; ?>" class="img-responsive img-curve">
                                    <?php
                                }
                                ?>
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title?></h3>
                        <p class="food-price"><?php echo $price." zł"; ?></p>

                        <div class="order-label">Ilość</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Szczegóły dostawy</legend>
                    <div class="order-label">Imię i nazwisko</div>
                    <input type="text" name="full-name" placeholder="np. Jan Kowalski" class="input-responsive" required>

                    <div class="order-label">numer telefonu</div>
                    <input type="tel" name="contact" placeholder="np. 503xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="np. jankowalski@email.pl" class="input-responsive" required>

                    <div class="order-label">Adres</div>
                    <textarea name="address" rows="10" placeholder="np. ulica, numer, numer mieszkania" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Potwierdź zamówienie" class="btn btn-primary">
                </fieldset>

            </form>

            <?php
                if(isset($_POST['submit'])) {
                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];
                    $total = $price * $qty;
                    $order_date = date("Y-m-d h:i:sa");
                    $status = "Dostarczone";
                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];
                }
            ?>

        </div>
    </section>

<?php
include("fparts/ffooter.php")
?>
