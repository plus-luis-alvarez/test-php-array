<?php
require("conexion.php");

$body = file_get_contents("php://input");
$data = json_decode($body,true);

$id = $data['id'];
$idProfesor = $data['idProfesor'];
$idAsignatura = $data['idAsignatura'];
$list = $data['data'];

$info = array();
foreach($list as $item){
    $sql = "call USP_TASK_INSERT(:title,:description)";
    $stmt = $cn->prepare($sql);
    $stmt->bindParam(":title",$item['title'],PDO::PARAM_STR);
    $stmt->bindParam(":description",$item['description'],PDO::PARAM_STR);
    $stmt->execute();
    $idTask = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['Id'];
    array_push($info,$idTask);
}
$send = array("info"=>$info, "status" => 200);
http_response_code(200);
echo json_encode($send);