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



}