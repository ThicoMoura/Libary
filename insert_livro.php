<?php

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$livro = new livro();
$livro_acervo = new livro_acervo();

// Dados da Notícia
$titulo = utf8_decode($_POST['titulo']);
$autor = utf8_decode($_POST['autor']);
$editora = utf8_decode($_POST['editora']);
$genero = utf8_decode($_POST['genero']);
$foto = $_FILES['foto'];
$sinopse = utf8_decode($_POST['sinopse']);
$fileira = $_POST['fileira'];
$numero = $_POST['numero'];
$quant = $_POST['quant'];
$status = "disponivel";

//var numero
$n = 0;

echo '<pre>';
print_r($foto);
echo '</pre>';

// Upload de Foto
$pasta = 'fotos/';
$nome = $foto['name'];
$ext = explode('.', $nome);
$extensao = end($ext);
$novo_nome = md5(date('d-m-Y h:i:s')).'.'.$extensao;

move_uploaded_file($foto['tmp_name'], $pasta.$novo_nome);

$foto = $novo_nome;


$livro ->setTitulo($titulo);
$livro ->setAutor($autor);
$livro ->setEditora($editora);
$livro ->setGenero($genero);
$livro ->setFoto($foto);
$livro ->setSinopse($sinopse);
$livro ->setFileira($fileira);
$livro ->setNumero($numero);
$livro ->create();

	foreach ($livro->readKey($numero) as $key => $di) {

		//for para repetição de varios livros
		for ($i=0; $i < $quant ; $i++) { 

		$livroid = $di['livroid'];

		//soma do numero do livro
		$n ++;

		$livro_acervo ->setLivroid($livroid);
		$livro_acervo ->setNumero($numero);
		$livro_acervo ->setN($n);
		$livro_acervo ->setStatus($status);
		$livro_acervo ->create();

		header("Location: painel.php?mensagem=Livro cadastrado com sucesso");
}

}
?>