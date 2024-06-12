<?php include('partials/menu.php')?>

<!-- Main Content Section Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>

        <br /><br /><br />

        <?php 
                
                if (isset($_SESSION['update'])) 
                {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
                }
                
                ?>


        <br /><br /><br />


        <table class="tbl-full" width=100%>
            <tr>
                <th>S.N.</th>
                <th>Product</th>
                <th>Price</th>
                <th>Qty.</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>customer Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>

            <?php  
    
    //get all the orders from data base

    $sql = "SELECT * FROM tbl_order ORDER BY id DESC";  //Display the order in desinding order
    //execute query
    $res = mysqli_query($conn, $sql);
    //count the rows
    $count =mysqli_num_rows($res);

    $sn= 1; //create a serial number

    if($count>0)
    {
        //order available
        while($row=mysqli_fetch_assoc($res))
        {
            //get all the order details
            $id = $row['id'];
            $product = $row['product'];
            $price = $row['price'];
            $qty = $row['qty'];
            $total = $row['total'];
            $order_date = $row['order_date'];
            $status = $row['status'];
            $customer_name = $row['customer_name'];
            $customer_contact = $row['customer_contact'];
            $customer_email = $row['customer_email'];
            $customer_address = $row['customer_address'];

            ?>

            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $product; ?></td>
                <td><?php echo $price; ?></td>
                <td><?php echo $qty; ?></td>
                <td><?php echo $total; ?></td>
                <td><?php echo $order_date; ?></td>

                <td>

                    <?php 
                        
                        //echo $status;
                        if($status=="ordered")
                        {
                            echo "<p class='ordered'>$status</P>";
                        }
                        elseif($status=="On Delivery")
                        {
                            echo "<p class='ondelivery'>$status</P>";
                        }
                        elseif($status=="Delivered")
                        {
                            echo "<p class='delivered'>$status</P>";
                        }
                        elseif($status=="Cancelled")
                        {
                            echo "<p class='cancelled'>$status</P>";
                        }

                        ?>
                </td>

                <td><?php echo $customer_name; ?></td>
                <td><?php echo $customer_contact; ?></td>
                <td><?php echo $customer_email; ?></td>
                <td><?php echo $customer_address; ?></td>
                <td>
                    <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>"
                        class="btn-secondary">Update Order</a>
                </td>
            </tr>


            <?php

        }
    }
    else
    {
        //order not available
        echo "<tr><td colspan='12' class='error'>Orders not available</td></tr>";
    }
    
    ?>


        </table>

    </div>
</div>
<!-- Main Content end -->

<?php include('partials/footer.php')?>