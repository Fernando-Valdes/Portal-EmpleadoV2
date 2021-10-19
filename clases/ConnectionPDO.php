<?php
    // 21/09/2016
    require_once "SettingDB.php";
class ConnectionMySQL{
    // Definicion de atributos
    private $host;
    private $user;
    private $password;
    private $database;
    private $conn;
    protected static $conexion;
    public $respuesta;
 
        public function __construct(){
            require_once "SettingDB.php";
            $this->host=HOST;
            $this->user=USER;
            $this->password=PASSWORD;
            $this->database=DATABASE;
                try{
                    self::$conexion = new PDO("mysql:charset=utf8mb4;host=$this->host;port=3306;dbname=$this->database", 
                    $this->user, $this->password);
                    self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    self::$conexion->setAttribute(PDO::ATTR_PERSISTENT, false);    
                }catch (PDOException $e){
                    echo "No hemos podido conectar con la base de datos.";
                    exit;
                    }
        }
    
        public static function GetConexion(){
                if(!self::$conexion){
                    new ConnectionMySQL();
                }
                return self::$conexion;
        }
  
        public function CloseConnection(){
            //Metodo que cierra la conexion a la BD
             $this->con->close();
        }
          
        public function ExecuteQuery($sql){
            /* Metodo que ejecuta un query sql
             Retorna un resultado si es un SELECT*/
             $result = $this->conexion->query($sql);
             return($this->respuesta=$result);
        }
          
        public function GetCountAffectedRows(){
            /* Metodo que retorna la cantidad de filas
             afectadas con el ultimo query realizado.*/
             return $this->conn->affected_rows;
        }
          
        public function GetRows($result){
            /*Metodo que retorna la ultima fila
             de un resultado en forma de arreglo.*/
             return $result->fetch_row();
        }
          
        public function SetFreeResult($result){
            //Metodo que libera el resultado del query.
             $result->free_result();
        }
  
}
?>