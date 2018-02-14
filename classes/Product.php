<?php
    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';
?>


<?php

/**
 * Product class
 */
class Product{

    private $db;
    private $fm;


    public function __construct (){

        $this->db = new Database();
        $this->fm = new Format();

    }

    public function productInsert($data, $file){

        $productName    = mysqli_real_escape_string($this->db->link, $data['productName']);
        $catId          = mysqli_real_escape_string($this->db->link, $data['catId']);
        $brandId        = mysqli_real_escape_string($this->db->link, $data['brandId']);
        $body           = mysqli_real_escape_string($this->db->link, $data['body']);
        $price          = mysqli_real_escape_string($this->db->link, $data['price']);
        $type           = mysqli_real_escape_string($this->db->link, $data['type']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if ($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == ""){

            $msq = "<span class='error'>Fields  must not be empty!</span>";
            return $msq;

        }
        else
        {
            move_uploaded_file($file_temp, $uploaded_image);
            $qurey = "INSERT INTO product(productName, catId, brandId, body, price, image, type) VALUE('$productName','$catId','$brandId','$body','$price','$uploaded_image','$type') ";
            $inserted_row = $this->db->insert($qurey);
            if($inserted_row){

                $msq = "<span class='success'>Product Inserted Successfully!</span>";
                return $msq;
            }
            else
            {
                $msq = "<span class='error'>Product Not Inserted!</span>";
                return $msq;
            }
        }




    }

}