<?php
include("fparts/fmenu.php");
include("connection.php");
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                $sql = "SELECT * FROM food WHERE active='Yes' AND featured='YES'";

                $res = mysqli_query($con, $sql);

                $count = mysqli_num_rows($res);

                if($count>0) {
                    while($row=mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="food-menu-box">
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
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price"> <?php echo $price." zł"; ?></p>
                            <p class="food-detail">
                                <?php echo $description ?>
                            </p>
                            <br>

                            <a href="order.php?id=<?php echo $id; ?>" class="btn btn-primary">Zamów teraz</a>
                        </div>
                    </div>
                    <?php
                    }
                }
                else {
                    echo "<div class='error'>Dane niedostępne.</div>";
                }
            ?>

            <div class="clearfix"></div>

            

        </div>

    </section>

<?php
include("fparts/ffooter.php");
?>