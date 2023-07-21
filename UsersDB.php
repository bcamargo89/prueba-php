<?php 


class UsersDB {
    
    protected $mysqli;
    const LOCALHOST = '127.0.0.1';
    const USER = 'root';
    const PASSWORD = '';
    const DATABASE = 'prueba-php';
    
    /**
     * Constructor de clase
     */
    public function __construct() 
       {           
            try{
                //conexión a base de datos
                $this->mysqli = new mysqli(self::LOCALHOST, self::USER, self::PASSWORD, self::DATABASE);
              }catch (mysqli_sql_exception $e)
                   {
                    //Si no se puede realizar la conexión
                    http_response_code(500);
                    exit;
                   }     
       } 
    
    /**
     * obtiene un solo registro dado su ID
     * @param int $id identificador unico de registro
     * @return Array array con los registros obtenidos de la base de datos
     */
    public function getUser($id=0)
       {      
        $stmt = $this->mysqli->prepare("SELECT * FROM users WHERE id=? ; ");
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();        
        $peoples = $result->fetch_all(MYSQLI_ASSOC); 
        $stmt->close();
        return $peoples;              
       }



    
    /**
     * obtiene todos los registros de la tabla "users"
     * @return Array array con los registros obtenidos de la base de datos
     */
    public function getUsers()
        {        
        $result = $this->mysqli->query('SELECT * FROM users');          
        $users = $result->fetch_all(MYSQLI_ASSOC);          
        $result->close();
        return $users; 
        }



    
    /**
     * añade un nuevo registro en la tabla persona
     * @param String $name nombre completo de persona
     * @return bool TRUE|FALSE 
     */
    public function insert($username='',$email='',$password='',$fullaname='')
       {
       
        $hash = password_hash($password, PASSWORD_DEFAULT);

      /* para verificar si son las mismas contrase;as  
        if (password_verify($password, $hash)) {
         // La contraseña coincide con el hash
         } else {
         // La contraseña no coincide con el hash
         }
         */
       $stat = 0;
       $fecha_actual = date("d-m-Y h:i:s");
      
       
        $stmt = $this->mysqli->prepare("INSERT INTO users(username,email,password,fullname,stat,created_at ,updated_at ) VALUES (?,?,?,?,?,?,?); ");
        $stmt->bind_param('ssssiss', $username,$email,$hash,$fullaname,$stat,$fecha_actual,$fecha_actual);
        
   
    
     if (!$stmt->execute()) {
         echo 'error executing statement: ' . $stmt->error;
     }

        $r = $stmt->execute(); 
        $stmt->close();
        return $r;        
       }


     
    
    /**
     * elimina un registro dado el ID
     * @param int $id Identificador unico de registro
     * @return Bool TRUE|FALSE
     */
    public function delete($id=0)
       {
        $stmt = $this->mysqli->prepare("DELETE FROM users WHERE id = ? ; ");
        $stmt->bind_param('s', $id);
        $r = $stmt->execute(); 
        $stmt->close();
        return $r;
       }
    


    /**
     * Actualiza registro dado su ID
     * @param int $id Description
     */
    public function update($id, $newName,$password) 
       {
            if($this->checkID($id))
              {
                $stmt = $this->mysqli->prepare("UPDATE users SET password=? ,fullname=? WHERE id = ? ; ");
                $stmt->bind_param('sss',$password, $newName,$id);
                $r = $stmt->execute(); 
                $stmt->close();
                return $r;    
              }
             
            return false;
       }
    



    /**
     * verifica si un ID existe
     * @param int $id Identificador unico de registro
     * @return Bool TRUE|FALSE
     */
    public function checkID($id)
     {
            $stmt = $this->mysqli->prepare("SELECT * FROM users WHERE ID=?");
            $stmt->bind_param("s", $id);
            if($stmt->execute())
              {
                $stmt->store_result();    
                if ($stmt->num_rows == 1)
                    {                
                    return true;
                    }
              }  

        return false;
     }


         public function getName()
        {        
        $result = $this->mysqli->query('SELECT name FROM users');          
        $names = $result->fetch_all(MYSQLI_ASSOC);          
        $result->close();
        return $names; 
        }
    
}
?>