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

}