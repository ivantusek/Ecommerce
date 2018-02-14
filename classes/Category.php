<?php
    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';
?>

<?php
/**
 * Categgiry class
 */

class Category{

    private $db;
    private $fm;


    public function __construct (){

        $this->db = new Database();
        $this->fm = new Format();

    }

    public function catInsert ($catName){

        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);

        if(empty($catName)){

            $msq = "<span class='error'>Category field must not be empty!</span>";
            return $msq;

        }
        else
        {
            $query = "INSERT INTO category(catName) VALUES('$catName')" ;
            $catinsert = $this->db->insert($query);

            if($catinsert){

                $msq = "<span class='success'>Category Inserted Successfully!</span>";
                return $msq;
            }
            else
            {
                $msq = "<span class='error'>Category Not Inserted!</span>";
                return $msq;
            }
        }

    }
    public function getAllCat(){

        $query = "SELECT * FROM category ORDER BY catId DESC";
        $result = $this->db->select($query);
        return $result;

    }

    public function getCatById($id){

        $query = "SELECT * FROM category WHERE catId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function catUpdate($catName, $id){

        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if(empty($catName)){

            $msq = "<span class='error'>Category field must not be empty!</span>";
            return $msq;

        }
        else
        {
            $query = "UPDATE category SET catName = '$catName' WHERE catId = '$id'";
            $updated_row = $this->db->update($query);
            if($updated_row){
                $msq = "<span class='success'>Category Updated Successfully!</span>";
                return $msq;
            }
            else
            {
                $msq = "<span class='error'>Category Not Updated!</span>";
                return $msq;
            }
        }
    }

}