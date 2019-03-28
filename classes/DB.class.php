<?php

class DB{

	// instancia atual
	private static $instance;

	public static function getInstance(){

		if (!isset (self::$instance)){

			try{
				//self::$instance = new PDO('mysql:host=127.0.0.1; dbname=biblioteca', 'root', 'asdqwe');
				self::$instance = new PDO('mysql:host=localhost; dbname=biblioteca', 'root', '');
				// Setamos o atributo responsável pelos erros
				self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				// Setamos o atributo responsável pelos retornos padrões (retorna como objetos)
				self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			}

			catch (PDOException $erro){
				echo $erro->getMessage();
			}

		}

		return self::$instance;

	}

	public static function prepare($sql){
		return self::getInstance()->prepare($sql);
	}
	
}
