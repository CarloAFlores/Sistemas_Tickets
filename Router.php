<?php 

namespace MVC;

class Router{


	//En estos arreglos se almacenaran los llamados GET y POST
	public $rutasGET = [];
	public $rutasPOST = [];


	//En esta funcion, mediante el index de la carpeta public mandaremos la url y la funcion a donde nos dirigiremos
	public function get($url,$fn){
		$this->rutasGET[$url] = $fn;
	}


	//En esta funcion se comprobaran que tipo de metodo fue enviado
	public function comprobarRutas(){
		//Esto funciona para saber lainfo de la url
		$urlActual = $_SERVER['PATH_INFO'] ?? '/';
		//Funcion para saber el metodo que estaremos ocupando [GET,POST,PUT]
		$metodo = $_SERVER['REQUEST_METHOD'];


		//Concicion en caso que estemos usando el metodo get
		if($metodo === 'GET'){
			//Asignacion de la ruta a una variable, en caso de no exister dicha ruta, nos lanzara un null
			$fn = $this->rutasGET[$urlActual] ?? null;
		}

		//Condicion en que nos redireccionara a la pagina que deseemos
		if($fn){
			call_user_func($fn,$this);
		}else{
			//En caso de ser falso o null solo aparecera este mensaje
			echo "Pagina no encontrada";
		}
	}

}
 ?>
