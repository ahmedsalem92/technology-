<?php include('partials/menu.php')?>

        <!-- Main Content Section Start -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Products</h1>

                <br /><br /><br />

<?php 

    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

                    if (isset($_SESSION['remove'])) 
                    {
                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
                    }

                    if (isset($_SESSION['delete'])) 
                    {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                    }

                    if (isset($_SESSION['unauthorize'])) 
                    {
                    echo $_SESSION['unauthorize'];
                    unset($_SESSION['unauthorize']);
                    }

                    if (isset($_SESSION['no-product-found'])) 
                    {
                    echo $_SESSION['no-product-found'];
                    unset($_SESSION['no-product-found']);
                    }

                    if (isset($_SESSION['upload'])) 
                    {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                    }

                    if (isset($_SESSION['remove-failed'])) 
                    {
                    echo $_SESSION['remove-failed'];
                    unset($_SESSION['remove-failed']);
                    }

                    if (isset($_SESSION['update'])) 
                    {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                    }


?>

<br /><br /><br />

<! --- Button to Add Admin ---!>
<a href="<?php echo SITEURL; ?>admin/add-product.php" class="btn-primary">Add Product</a>

<br /><br /><br />

<table class="tbl-full" width=100%>
    <tr>
        <th>S.N.</th>
        <th>Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Actions</th>
    </tr>

    <?php 
        // create sql query to get all the product
        $sql = "SELECT * FROM tbl_tech";

        //execute the query
        $res = mysqli_query($conn, $sql);

        //count rows to check whether we have products or not
        $count = mysqli_num_rows($res);

        $sn =1;

        if($count>0)
        {
            // wehave product in database
            //get the product from data base and display
            while($row=mysqli_fetch_assoc($res))
            {
                //get the values from individal columns
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];

                ?>

                <tr>
                    <td><?php echo $sn++; ?> </td>
                    <td><?php echo $title; ?></td>
                    <td><?php echo $price; ?></td>
                    <td>
                        <?php 
                            //check whether we have image or not
                            if($image_name=="")
                            {
                                //we do not have image, display error message
                                echo "<div class='error'> Image not added </div>";
                            }
                            else
                            {
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name ?>" width=100px height=100px >
                                <?php
                            }
                        ?>
                    </td>
                    <td><?php echo $featured; ?></td>
                    <td><?php echo $active; ?></td>
                    <td>
                        <a href="<?php echo SITEURL;?>admin/update-product.php?id=<?php echo $id; ?>" class="btn-secondary">Update Product</a>
                        <a href="<?php echo SITEURL;?>admin/delete-product.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Product</a>
                    </td>
                </tr>

                <?php

            }
        }
        else
        {
            //product not added in database
            echo "<tr> <td colspan='7' class='error' > Product not added yet. </td> </tr>";
        }
    
    ?>



</table>

            </div>
        </div>
        <!-- Main Content end -->

<?php include('partials/footer.php')?>