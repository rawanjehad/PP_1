<?php

class Db {
    // The database connection
    protected static $connection;

    function __construct() {
      date_default_timezone_set('Asia/Jerusalem');
    }

    /**
     * Connect to the database
     *
     * @return bool false on failure / mysqli MySQLi object instance on success
     */
    public function connect() {
        // Try and connect to the database
        if(!isset(self::$connection)) {
            // Load configuration as an array. Use the actual location of your configuration file
            //$config = parse_ini_file('config.ini');
            //if($_SESSION["u"]=="show")
            //$config = parse_ini_file('config_show.ini');

            
             self::$connection = new mysqli('localhost','root','','cloudc');
            self::$connection->set_charset("utf8");
           /* self::$connection = new mysqli('localhost','mayar','fodjy7-cihves-ziFdeq','mayar_pay4');
            self::$connection->set_charset("utf8");*/

        }

        // If connection was not successful, handle the error
        if(self::$connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            return false;
        }
        return self::$connection;
    }

    /**
     * Query the database
     *
     * @param $query The query string
     * @return mixed The result of the mysqli::query() function
     */
    public function query($query) {
        // Connect to the database

//var_dump($query);
        $connection = $this ->connect();

        // Query the database
        $result = $connection->query($query);

        //print "<script> alert('".$result."');</script>";

       // var_dump($query);
       // var_dump($result);

        return $result;
    }


    public function getCon() {
        // Connect to the database
        $connection = $this -> connect();
        return $connection;
    }
    /**
     * Fetch rows from the database (SELECT query)
     *
     * @param $query The query string
     * @return bool False on failure / array Database rows on success
     */
    public function select($query) {

        $rows = array();
	//	var_dump($query);
        $result = $this ->query($query);
        if($result === false) {
            return false;
        }
        while ($row = $result -> fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * Fetch the last error from the database
     *
     * @return string Database error message
     */
    public function error() {
        $connection = $this -> connect();
        return $connection -> error;
    }

    /**
     * Quote and escape value for use in a database query
     *
     * @param string $value The value to be quoted and escaped
     * @return string The quoted and escaped string
     */
    public function quote($value) {
        $connection = $this -> connect();
        return "'" . $connection -> real_escape_string($value) . "'";
    }
}

?>
