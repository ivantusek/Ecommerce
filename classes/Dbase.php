<?php
// Dbase class
class Dbase
{

    // Connection to database
    private $_host = "localhost";
    private $_user = "root";
    private $_password = "";
    private $_name = "ecommerce";

    private $_conndb = false;
    public $_last_query = null;
    public $_affected_rows = 0;

    public $_insert_keys = array();
    public $_insert_values = array();
    public $_update_sets = array();

    public $_id;


    public function __construct()
    {

        $this->connect();
    }

    private function connect()
    {

        $this->_conndb = mysql_connect($this->_host, $this->_user, $this->_password);

        if (!$this->_conndb) {

            die("Databse connection failed: <br/>" . mysql_error());

        } else {
            $_select = mysqli_select_db($this->_name, $this->_conndb);

            if (!$_select) {

                die("Databse selection failed: <br/>" . mysql_error());

            }
        }

        mysql_set_charset("utf8", $this->_conndb);
    }

    public function close()
    {

        if (!mysql_close($this->_conndb)) {

            die("Closing connection failed.");

        }
    }

    public function escape($value)
    {

        if (function_exists("mysql_real_escape_string")) {
            if (get_magic_quotes_gpc()) {
                $value = stripslashes($value);
            }

            $value = mysql_real_escape_string($value);

        } else {

            if (!get_magic_quotes_gpc()) {
                $value = addslashes($value);
            }
        }

        return $value;
    }

    public function qurey($sql)
    {

        $this->_last_query = $sql;
        $result = mysql_qurey($sql, $this->_conndb);
        $this->displayQery($result);
        return $result;
    }

    public function displayQurey($result)
    {

        if (!$result) {
            $output = "Database qurey failed: " . mysql_error() . "<br/>";
            $output .= "Last SQL query was: " . $this->_last_query;
            die($output);
        }
        else {
            $this->_affected_rows = mysql_affected_rows($this->_conndb);

        }
    }

    public function fetchAll($sql) {

        $result = $this->query($sql);
        $out = array();

        while($row = mysql_fetch_assoc($result)) {
            $out[] = $row;
        }

        mysql_free_result($result);
        return $out;
    }

    public function fetchOne($sql) {

        $out = $this->fetchAll($sql);
        return array_shift($out);
    }

    public function lastId() {

        return mysql_insert_id($this->_conndb);
    }
}
