<?php
 
class DB_Connect {
 
    // constructor
    function __construct() 
    {
         
    }
 
    // destructor
    function __destruct() 
    {
        // $this->close();
    }
 
    // Connecting to database
    public function connect() 
    {
        require_once 'Config.php';

        $con = new PDO('mysql:host=localhost;dbname=prueba-php;charset=utf8', 'root', '');
        $con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
        // return database handler
        return $con;
    }
 
    // Closing database connection
    public function close() 
    {
        // mysql_close();
    }
 
}
 
?>