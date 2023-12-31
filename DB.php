<?php
require_once 'conexion/DB_Connect.php';
require_once 'modelo/Usuarios.php';
class DB
{ 
    private $db;
    private $pdo;

    function __construct() 
    {
        $this->db = new DB_Connect();
        $this->pdo = $this->db->connect();
    }
 
    function __destruct() { }
 

    public function getAllUsuarios() 
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users');                                     
        $stmt->execute();
        $array = array();
       
        $ind = 0;
        foreach ($stmt as $row) 
        {
            // do something with $row
            $itm = new Usuarios();  //obtenemos los campos del models
            $itm->id= $row['id'];
            $itm->username= $row['username'];
            $itm->email= $row['email'];
            $itm->pasword= $row['password'];
            $itm->fullname = $row['fullname'];               
            $array[$ind] = $itm;
            $ind++;
        }
        return $array;
    }


        public function getUsuario($id) 
        {
            $stmt = $this->pdo->prepare('SELECT * from users where id = :id ');                                     
            $stmt->execute( array('id' => $id));
            $array = array();
           
            $ind = 0;
            foreach ($stmt as $row) 
            {
               // do something with $row
                $itm = new Usuarios();  //obtenemos los campos del models/Tipo_lesiones
                $itm->id= $row['id'];
                $itm->username= $row['username'];
                $itm->email= $row['email'];
                $itm->pasword= $row['password'];
                $itm->fullname = $row['fullname'];  
                $array[$ind] = $itm;
                $ind++;
            }
            return $array;
         }
    
}
 
?>