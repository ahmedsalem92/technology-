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



    <!-- product MEnu Section Starts Here -->
    <section class="product-menu">
        <div class="container">
            <h2 class="text-center">قائمة المنتجات</h2>

            <?php 
                //display product that are active
                $sql = "SELECT * FROM tbl_tech WHERE active='Yes'";

                //Execute the query
                $res=mysqli_query($conn, $sql);

                //count rows
                $count = mysqli_num_rows($res);

                //check whether the products are available or not
                if($count>0)
                {
                    //products available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get the values
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
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
                    //product not available
                    echo "<div class='error'>product not found.</div>";
                }
            ?>



            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- product Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?> 