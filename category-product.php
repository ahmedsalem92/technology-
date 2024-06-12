<?php include('partials-front/menu.php'); ?>


<?php 

//check whther id is passed or not
if(isset($_GET['category_id']))
{
    //Category id is set and get the id
    $category_id = $_GET['category_id'];
    //get the category title based on category ID
    $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

    //execute the query
    $res = mysqli_query($conn, $sql);

    //Get the value from database
    $row = mysqli_fetch_assoc($res);
    //get the title
    $category_title = $row['title'];

}
else
{
    //category not passed
    header('location:'.SITEURL);
}

?>

    <!-- product sEARCH Section Starts Here -->
    <section class="product-search text-center">
        <div class="container">
            
            <h2>البحث عن <a href="#" class="text-black"><?php echo $category_title; ?></a></h2>

        </div>
    </section>
    <!-- product sEARCH Section Ends Here -->



    <!-- product MEnu Section Starts Here -->
    <section class="product-menu">
        <div class="container">
            <h2 class="text-center">قائمة المنتجات</h2>

            <?php 
            
                //create sql query to get products bassed on selected category
                $sql2 = "SELECT * FROM tbl_tech WHERE category_id=$category_id";

                //execute the query
                $res2 = mysqli_query($conn, $sql2);

                //count the rows
                $count2 = mysqli_num_rows($res2);

                //check whether product is available or not
                if($count2>0)
                {
                    //product is available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
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
                    echo "<div class='error'> product not available. </div>";
                }
            
            ?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- product Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?> 