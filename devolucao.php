<?php 

//inicio a sessão
session_start();

//verifico se o usuario esta logado
require 'check.php';

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

if (isLoggedIn()) {


//Id livro
$acervoid = $_GET['id'];
$livro = new veri();

//defino minhas classes de verificação e update
$user = new usuario_adm(); 
$update = new update_quant();
$sintese = new sintese();

$sql = "SELECT u.userid, a.livroid, a.numero, a.n, l.locaid FROM usuarios u, locacao l, livro_acervo a WHERE l.userid = u.userid and l.statuslocacao = 'locado' and l.acervoid = ".$acervoid;
$stmt = DB::prepare($sql);
$stmt ->execute();
    
    foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){

        $locacaoid = $value['locaid'];

        $id = $acervoid;

        $status = "disponivel";

        $livroid = $value['livroid'];

        $numero = $value['numero'];

        $n = $value['n'];

        $previsao = "";

        $livro ->setLivroid($livroid);

        $livro ->setNumero($numero);

        $livro ->setN($n);

        $livro ->setStatus($status);

        $livro ->setPrevisao($previsao);

        $livro ->update($id);

        $id = $value['userid'];

        foreach ($user->readSi($id) as $key => $usr) {


            $quant -= $usr['quant'];
            $limite = $usr['limite'];
            $update ->setLimite($limite);
            $update ->setQuant($quant);
            $update ->update($id);

            $locacao = new locacao();

            $id = $locacaoid;
            $statuslocacao = "devolvido";
            $dataentrega = date('d-m-y');

            $locacao ->setDataentrega($dataentrega);
            $locacao ->setStatuslocacao($statuslocacao);
            $locacao ->update($id);





    header("Location: painel.php?mensagem=Devolução realizada com sucesso");  
}

}

} else{

    header("Location: painel.php?mensagem=Usuario não logado");
}?>