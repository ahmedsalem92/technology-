<?php include('partials-front/menu.php'); ?>

<!-- product sEARCH Section Starts Here -->
<section class="product-search text-center">
    <div class="container">

        <?php

                //            //Get the search keyword
                //$search = $_POST['search'];
                //$search = mysqli_real_escape_string($_POST['search']);
                $search = mysqli_real_escape_string($conn, $_POST['search']);

            ?>

        <h2> بحث عن <a href="#" class="text-black"><?php echo $search; ?></a></h2>


    </div>
</section>
<!-- product sEARCH Section Ends Here -->



<!-- product MEnu Section Starts Here -->
<section class="product-menu">
    <div class="container">
        <h2 class="text-center"> قائمة المنتجات </h2>

        <?php  
            
            //SQL query to Get products based on search keyword
            // $search = burger' drop database name;
            // Select * from tbl_product where title like '%burger'%' or decreption like '%burger'%'
            $sql = "SELECT * FROM tbl_tech WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
            
            // Execute the query
            $res = mysqli_query($conn, $sql);

            //count Rows
            $count = mysqli_num_rows($res);

            //check whether product available of not
            if($count>0)
            {
                //product Available
                while($row=mysqli_fetch_assoc($res))
                {
                    //get the datails
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
                <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?> " alt="Chicke Hawain Pizza"
                    class="img-responsive img-curve">
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

                <a href="<?php echo SITEURL; ?>order.php?product_id=<?php echo $id; ?>" class="btn btn-primary">اطلب
                    الان</a>
            </div>
        </div>

        <?php
                }
            }
            else
            {
                //product not Available
                echo "<div class='error'>Product not found.</div>";
            }

            ?>

        <div class="clearfix"></div>



    </div>

</section>
<!-- product Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>