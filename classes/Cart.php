<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');
?>


<?php
/**
 * Cart class
 */
class Cart{

    private $db;
    private $fm;


    public function __construct()
    {

        $this->db = new Database();
        $this->fm = new Format();

    }

    public function addToCart($quantity, $id)
    {
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $productId = mysqli_real_escape_string($this->db->link, $id);
        $sId = session_id();
        $squery = "SELECT * FROM product WHERE productId = '$productId'";
        $result = $this->db->select($squery)->fetch_assoc();

        $productName = $result['productName'];
        $price = $result['price'];
        $image = $result['image'];

        $chkquery = "SELECT * FROM cart WHERE productId = '$productId' AND sId = '$sId'";
        $getPro = $this->db->select($chkquery);
        if($getPro){
            $msg = "Product already added!";
            return $msg;
        }
        else {
            $query = "INSERT INTO cart(sId, productId, productName, price, quantity, image) "
                . "VALUES('$sId','$productId','$productName','$price','$quantity','$image')";
            $inserted_row = $this->db->insert($query) ;
            if ($inserted_row){
                header("location:cart.php");
            } else{
                header("location:404.php");
            }
        }

    }

    public function getCartProduct()
    {
        $sId = session_id();
        $query = "SELECT * FROM cart  WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateCartQuantity($cartId, $quantity)
    {
        $cartId   = mysqli_real_escape_string($this->db->link, $cartId);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $query = "UPDATE cart SET
                    quantity = '$quantity'
                    WHERE cartId = '$cartId'";
        $updated_row = $this->db->update($query) ;
        if ($updated_row){
            //echo "<script> window.location='cart.php';</script> ";
            $msg = "<span class='success'>Quantity updated successfuly! </span>";
            return $msg;
        } else{
            $msg = "<span class='error'>Quantity not Updated! </span>";
            return $msg;
        }
    }

    public function delProductByCart($delId)
    {
        $delquery = "DELETE FROM cart WHERE cartId = '$delId'";
        $deldata = $this->db->delete($delquery) ;
        if ($deldata){
            echo "<script> window.location='cart.php';</script> ";
        } else{
            $msg = "<span class='error'>Product not deleted! </span>";
            return $msg;
        }
    }



}