<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');
?>


<?php
/**
 * Brand class
 */

class Brand{

    private $db;
    private $fm;


    public function __construct (){

        $this->db = new Database();
        $this->fm = new Format();

    }

    public function brandInsert ($brandName){

        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);

        if(empty($brandName)){

            $msq = "<span class='error'>Brand field must not be empty!</span>";
            return $msq;

        }
        else
        {
            $query = "INSERT INTO brand(brandName) VALUES('$brandName')" ;
            $brandinsert = $this->db->insert($query);

            if($brandinsert){

                $msq = "<span class='success'>Brand Name Inserted Successfully!</span>";
                return $msq;
            }
            else
            {
                $msq = "<span class='error'>Brand Name Not Inserted!</span>";
                return $msq;
            }
        }

    }

    public function getAllBrand(){

        $query = "SELECT * FROM brand ORDER BY brandId DESC";
        $result = $this->db->select($query);
        return $result;

    }

    public function getBrandById($id){

        $query = "SELECT * FROM brand WHERE brandId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function brandUpdate($brandName, $id){

        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if(empty($brandName)){

            $msq = "<span class='error'>Brand field must not be empty!</span>";
            return $msq;

        }
        else
        {
            $query = "UPDATE brand SET brandName = '$brandName' WHERE brandId = '$id'";
            $updated_row = $this->db->update($query);
            if($updated_row){
                $msq = "<span class='success'>Brand Name Updated Successfully!</span>";
                return $msq;
            }
            else
            {
                $msq = "<span class='error'>Brand Name Not Updated!</span>";
                return $msq;
            }
        }
    }

    public function delBrandById($id){

        // $id = mysqli_real_escape_string($this->db->link, $id);
        $qurey = "DELETE FROM brand WHERE brandId = '$id'";
        $deldata =  $this->db->delete($qurey);
        if($deldata){
            $msq = "<span class='success'>Brand Name Deleted Successfully!</span>";
            return $msq;
        }
        else
        {
            $msq = "<span class='error'>Brand Name Not Deleted!</span>";
            return $msq;
        }
    }

}