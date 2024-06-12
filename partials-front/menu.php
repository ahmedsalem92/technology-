<?php include('config/constants.php'); ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technology Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container menu">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.jpg" alt="Protect Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">القائمة الرئسية</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">اصناف المتجات</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>product.php">منتجات الموبيلات</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>about-us.php">طرق التواصل معنا</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->