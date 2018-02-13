<?php
    include '../lib/Session.php';
    Session::checkLogin();
    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';
?>

<?php

class AdminLogin{

    private $db;
    private $fm;

    public function __construct (){

        $this->db = new Database();
        $this->fm = new Format();

    }

    public function adminLogin ($adminUser, $adminPass){

        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);

        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

        if(empty($adminUser) || empty($adminPass)){

            $loginmsq = "Username or Password must not be empty!";
            return $loginmsq;

        }
        else
        {

            $query = "SELECT * FROM admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass' ";
            $result = $this->db->select($query);
            if($result != false){

             $value = $result->fetch_assoc();
             Session::set("adminlogin", true);
             Session::set("adminId", $value['adminId']);
             Session::set("adminUser", $value['adminUser']);
             Session::set("adminName", $value['adminName']);

             header("Location:dashboard.php" );

            }
            else
            {
                $loginmsq = "Username or Password not match!";
                return $loginmsq;
            }

        }


    }

}

