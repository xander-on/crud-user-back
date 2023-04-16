<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//todo env
//Conecta a la base de datos  con usuario, contraseña y nombre de la BD
$servidor        = $_ENV['DB_HOST'];
$usuario         = $_ENV['DB_USERNAME'];
$contrasenia     = $_ENV['DB_PASSWORD'];
$nombreBaseDatos = $_ENV['DB_DATABASE'];
$conexionBD      = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos);

//name table
$table = "empleados";


// Consulta datos y recepciona una clave para consultar dichos datos con dicha clave
if (isset($_GET["consultar"])){

    $query = "SELECT * FROM $table WHERE id=".$_GET["consultar"];
    $sqlEmpleados = mysqli_query($conexionBD,$query);

    if(mysqli_num_rows($sqlEmpleados) > 0){
      $empleados = mysqli_fetch_all($sqlEmpleados,MYSQLI_ASSOC);
      echo json_encode($empleados);
      exit();
    }
    else{  echo json_encode(["success"=>0]); }
}


//borrar pero se le debe de enviar una clave ( para borrado )
if (isset($_GET["borrar"])){
    $query = "DELETE FROM $table WHERE id=".$_GET["borrar"];
    $sqlEmpleados = mysqli_query($conexionBD, $query);
    if($sqlEmpleados){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}


//Inserta un nuevo registro y recepciona en método post los datos de nombre y correo
if(isset($_GET["insertar"])){
    $data = json_decode(file_get_contents("php://input"));
    $nombre = $data->nombre;
    $correo = $data->correo;
    if( ($correo!="") && ($nombre!="") ){
      $query = "INSERT INTO $table(nombre,correo) VALUES('$nombre','$correo') ";
      $sqlEmpleados = mysqli_query($conexionBD,$query);
      echo json_encode(["success"=>1]);
    }
    exit();
}



// Actualiza datos pero recepciona datos de nombre, correo y una clave para realizar la actualización
if(isset($_GET["actualizar"])){
    
    $data = json_decode(file_get_contents("php://input"));

    $id=(isset($data->id))?$data->id:$_GET["actualizar"];
    $nombre=$data->nombre;
    $correo=$data->correo;
    $query = "UPDATE $table SET nombre='$nombre',correo='$correo' WHERE id='$id'";
    $sqlEmpleados = mysqli_query($conexionBD, $query);
    echo json_encode(["success"=>1]);
    exit();
}


// Consulta todos los registros de la tabla empleados
$sqlEmpleados = mysqli_query($conexionBD,"SELECT * FROM $table ");
if(mysqli_num_rows($sqlEmpleados) > 0){
    $empleados = mysqli_fetch_all($sqlEmpleados,MYSQLI_ASSOC);
    echo json_encode($empleados);
}
else{ echo json_encode([["success"=>0]]); }


?>