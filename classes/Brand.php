<?php
    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';
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

}