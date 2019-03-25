<?php

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$livro = new livro();

// Recebo os dados do Registro
$id = $_GET['id'];
$titulo = utf8_decode($_POST['titulo']);
$autor = utf8_decode($_POST['autor']);
$editora = utf8_decode($_POST['editora']);
$genero = utf8_decode($_POST['genero']);
$sinopse = utf8_decode($_POST['sinopse']);
$fileira = utf8_decode($_POST['fileira']);
$numero = utf8_decode($_POST['numero']);

	foreach ($livro -> readLid($id) as $key => $li) {
		// Verifica se a pdf foi enviada
		if ($pdf['error'] == 4){ // Imagem não enviada
			$pdf = $li['pdf'];

		} else {

			// Upload de pdf
			$pasta = 'pdf/';
			$nome = $pdf['name'];
			$ext = end(explode('.', $nome));
			$novo_nome = md5(date('d-m-Y h:i:s')).'.'.$ext;

			move_uploaded_file($pdf['tmp_name'], $pasta.$novo_nome);

			$pdf = $novo_nome;
		}

		$livro -> setTitulo($titulo);
		$livro -> setAutor($autor);
		$livro -> setEditora($editora);
		$livro -> setGenero($genero);
		$livro -> setSinopse($sinopse);
		$livro -> setFileira($fileira);
		$livro -> setNumero($numero);
		$livro -> update($id);

		header("Location: painel.php?mensagem=Atualização realizada com sucesso");
}