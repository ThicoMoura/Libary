<?php 

//inicio a sessão
session_start();

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

//Id livro
$id = $_GET['id'];

if ($id == "all") {

$sql = "SELECT hide, locaid FROM locacao";
$stmt = DB::prepare($sql);
$stmt ->execute();

foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value) {
    
    if (in_array("0", $value)) {
    $hidden = new hide();

   	$id = $value['locaid'];

   	$hide = 1;

    $hidden -> setHide($hide);
    $hidden -> update($id);

    //header("Location: painel.php?mensagem=Ocultado com sucesso");  

}else{
  header("Location: painel.php?mensagem=O item ja está ocultado");

}}
} else {

//defino minhas classes de verificação e update
$hidden = new hide();
$hide = 1;

$sql = "SELECT hide FROM locacao WHERE locaid = ".$id;
$stmt = DB::prepare($sql);
$stmt ->execute();

    foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value) {
    
    if (in_array("0", $value)) {

    $hidden -> setHide($hide);
    $hidden -> update($id);

    header("Location: painel.php?mensagem=Ocultado com sucesso");  

}else{
  header("Location: painel.php?mensagem=O item ja está ocultado");

}}}?>