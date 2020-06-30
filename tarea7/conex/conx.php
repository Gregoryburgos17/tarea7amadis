<?php  
//GREGORY BURGOS
class conexion{

public $mycon=null;
static $intancia=null;
function __construct(){
    $this->mycon =mysqli_connect(BD_HOST,BD_USER,BD_PASS,BD_NAME);
    if( $this->mycon===false ){
        echo"
        <script>
        window.location='install.php';
        </script>
        <h1> DB ERROR..</h1>
        
        ";
      exit();
    }

}
function _destruct(){
    mysqli_close( $this->mycon);
}
public static function ejercutar($sql){
    if(self::$intancia==null){
        self::$intancia=new conexion();
    }
    $sr=mysqli_query(self::$intancia->mycon,$sql);
    return $sr;
}

public static function query($sql){
    if(self::$intancia==null){
        self::$intancia=new conexion();
    }
    $sr=mysqli_query(self::$intancia->mycon,$sql);
    $final=[];
  while($row=mysqli_fetch_assoc($sr)){
      $final[]=$row;
    }
    return $final;
}
















}





?>