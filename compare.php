<?php include 'inc/header.php';?>

<?php
    $login = Session::get("cuslogin");
    if ($login == false) {
        header("Location:login.php");
    }
?>


    <style>
        table.tblone img
        {
            height: 90px;
            width: 100px;
        }
    </style>

    <div class="main">
        <div class="content">
            <div class="cartoption">
                <div class="cartpage">
                    <h2>Compare</h2>

                    <table class="tblone">
                        <tr>
                            <th>SL</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>/td>
                                </tr>


                    </table>



                </div>
                <div class="shopping">
                    <div class="shopleft" style="width: 100%; text-align: center;">
                        <a href="index.php"> <img src="images/shop.png" alt="" /></a>
                    </div>

                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    </div>
<?php include 'inc/footer.php';?>