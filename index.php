


<?php include('partials-front/menu.php'); ?>

<!-- product sEARCH Section Starts Here -->
<section class="tech-search text-center">
    <div class="container">

        <form action="<?php echo SITEURL; ?>product-search.php" method="POST">
            <input type="search" name="search" placeholder="البحث عن منتج ..." required>
            <input type="submit" name="submit" value="بحث" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- product sEARCH Section Ends Here -->


<?php 

    if(isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }

?>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">اصناف المنتجات</h2>

        <?php 
                // create sql query to display categories from database
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='No' LIMIT 4";
                //execute the query
                $res = mysqli_query($conn, $sql);
                // count rows to check whether the category is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //categories available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get the values like title, image_name
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>

        <a href="<?php echo SITEURL; ?>category-product.php?category_id=<?php echo $id; ?>">
            <div class="box-3 float-container">

                <?php
                            //check wheather pictutre available or not 
                            if($image_name=="")
                            {
                                //display message
                                echo "<div class='error'>Image not Available</div>";
                            }
                            else
                            {
                                //image Available
                                ?>
                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza"
                    class="img-cat img-curve"  >
                <?php
                            }
                            ?>
                <h3 class="float-text text-black"><?php echo $title; ?></h3>
            </div>
        </a>

        <?php
                    }
                }
                else
                {
                    //categories not available
                    echo "<div class='error'>Category not Added.</div>";
                }
            ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- product MEnu Section Starts Here -->
<section class="product-menu">
    <div class="container">
        <h2 class="text-center">قائمة منتجات الموبيلات</h2>

        <?php 
        
        //get products from database that are active and featured
        //SQL query
        $sql2 = "SELECT * FROM tbl_tech WHERE active='YES' AND featured='YES' LIMIT 6";

        //Execute the query
        $res2 = mysqli_query($conn, $sql2);

        //count Rows
        $count2 = mysqli_num_rows($res2);

        //check whether product available or not
        if($count2>0)
        {
            //product available
            while($row=mysqli_fetch_assoc($res2))
            {
                //Get all the values
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
                ?>
                    
                    <div class="product-menu-box">
                        <div class="product-menu-img">
                            <?php 
                                //check whether image available or not
                                if($image_name=="")
                                {
                                    //image not available
                                    echo "<div class='error'>Image not avaible</div>";
                                }
                                else
                                {
                                    //image avaible
                                    ?>
                                        <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?> " alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                    <?php
                                }

                            ?>
                        </div>

                        <div class="product-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="product-price">LE <?php echo $price; ?></p>
                            <p class="product-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?product_id=<?php echo $id; ?>" class="btn btn-primary">اطلب الان</a>
                        </div>
                    </div>


                <?php
            }
        }
        else
        {
            // product not available
            echo "<div class='error'>product not available.</div>";
        }
        
        ?>

        <div class="clearfix"></div>

    </div>

    <p class="text-center">
        <a href="<?php echo SITEURL; ?>product.php">روئية جميع المنتجات</a>
    </p>
</section>
<!-- product Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>