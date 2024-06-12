

<?php include('partials-front/menu.php'); ?>

<?php 

    //check whether product id is set or not
    if(isset($_GET['product_id']))
    {
        //get the product id and details of the selected product
        $product_id = $_GET['product_id'];

        //get the details of the selected product
        $sql = "SELECT * FROM tbl_tech WHERE id=$product_id";

        //execute the query
        $res = mysqli_query($conn, $sql);

        //count the rows
        $count = mysqli_num_rows($res);

        //check whether the data is available or not
        if($count==1)
        {
            //we have data
            //GET the data from database
            $row = mysqli_fetch_assoc($res);


            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];

        }
        else
        {
            //product not available
            //redirect to homw page
            header('location:'.SITEURL);
        }
    }
    else
    {
        // redirect to homepage
        header('location:'.SITEURL);
    }

?>

    <!-- product sEARCH Section Starts Here -->
    <section class="product-search">
        <div class="container">
            
            <h2 class="text-center text-black">الرجاء ملاء البيانات التالية لتاكيد طلبك</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>المنتج الذي تم اختياره </legend>

                    <div class="product-menu-img">
                        <?php 
                        
                        //check whether the image is available or not
                        if($image_name=="")
                        {
                            //image not available
                            echo "<div class='error'> Image not available. </div>";
                        }
                        else
                        {
                            //image is available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php
                        }
                        
                        ?>


                    </div>
    
                    <div class="product-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="product" value="<?php echo $title; ?>">
                        <p class="product-price"> <?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">الكمية</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>تفاصيل الارسال </legend>
                    <div class="order-label">الاسم بالكامل </div>
                    <input type="text" name="full-name" placeholder="ادخل اسمك من فضلك " class="input-responsive" required>

                    <div class="order-label">رقم الهاتف</div>
                    <input type="text" name="contact" placeholder="ادخل رقم تلفونك" class="input-responsive" required>

                    <div class="order-label">البريد الالكتروني </div>
                    <input type="email" name="email" placeholder="ادخل الايمال الخاص بك" class="input-responsive" required>

                    <div class="order-label">العنوان</div>
                    <textarea name="address" rows="10" placeholder="ادخل عنوانك من فضلك" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="تاكيد الطلب" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 
            
            //check submit buttun clicked or not
            if(isset($_POST['submit']))
            {
                //get all the details from the form
                $product = mysqli_real_escape_string($conn,$_POST['product']);
                $price = mysqli_real_escape_string($conn,$_POST['price']);
                $qty = mysqli_real_escape_string($conn,$_POST['qty']);

                $total = $price * $qty; // total ==price * qty

                $order_date = date("Y-m-d h:i:sa"); // order date

                $status = "ordered"; // ordered , on delevely , delivered , cancelled

                $customer_name = mysqli_real_escape_string($conn,$_POST['full-name']);
                $customer_contact = mysqli_real_escape_string($conn,$_POST['contact']);
                $customer_email = mysqli_real_escape_string($conn,$_POST['email']);
                $customer_address = mysqli_real_escape_string($conn,$_POST['address']);

                //save the order in database

                //create sql to save the data

                $sql2 = "INSERT INTO tbl_order SET
                    product = '$product',
                    price = $price,
                    qty = $qty,
                    total = $total,
                    order_date = '$order_date',
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'

                ";

                //echo $sql2; die();
                
                //execute the query
                $res2 = mysqli_query($conn, $sql2);

                //echo $sql2; die();

                //check whether query executed successfully or not
                if($res2==true)
                {
                    //query executed and order saved
                    $_SESSION['order'] = "<div class='success text-center'> product ordered successfully. </div>";
                    header('location:'.SITEURL);
                }
                else
                {
                    //failed to save order
                    $_SESSION['order'] = "<div class='error text-center'> Failed to order product . </div>";
                    header('location:'.SITEURL);
                }

            }
            
            ?>

        </div>
    </section>
    <!-- product sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?> 