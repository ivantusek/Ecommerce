<?php include 'inc/header.php';?>
<?php
    $login = Session::get("cuslogin");
    if ($login == false){
        header("Location:login.php");
    }

?>
    <style>
        .tblone
        {
            width:550px;
            margin:0 auto;
            border:2px solid #ddd;
        }
        .tblone tr td
        {
            text-align:justify;
        }
    </style>
    <div class="main">
        <div class="content">
            <div class="section group">

                <?php
                    $id = Session::get("cmrId");
                    $getdata = $cmr->getCustomerData($id);
                    if ($getdata){
                        while($result = $getdata->fetch_assoc()){
                        ?>
                        <form action="" method="POST">
                            <table class="tblone">
                                <tr>
                                    <td></td>
                                    <td colspan="3" font-color="red">Your Profile Details</td>
                                </tr>
                                <tr>
                                    <td width="20%">Name</td>
                                    <td width="5%">:</td>
                                    <td><?php echo $result['name'];?></td>
                                </tr>
                                <tr>
                                    <td width="20%">Phone</td>
                                    <td width="5%">:</td>
                                    <td><?php echo $result['phone'];?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?php echo $result['email'];?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>:</td>
                                    <td><?php echo $result['address'];?></td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>:</td>
                                    <td><?php echo $result['city'];?></td>
                                </tr>
                                <tr>
                                    <td>Zipcode</td>
                                    <td>:</td>
                                    <td><?php echo $result['zip'];?></td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td>:</td>
                                    <td><?php echo $result['country'];?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="update" value="Update Profile"></td>
                                </tr>
                            </table>
                        </form>
                    <?php } } ?>
            </div>
        </div>
    </div>

<?php include 'inc/footer.php';?>