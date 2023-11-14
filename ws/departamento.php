<?php
	
	include 'config.php';
	
	$pdo = new Conexion();
	
	//Listar registros y consultar registro
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(isset($_GET['id']))
		{
			$sql = $pdo->prepare("SELECT * FROM departamento WHERE id_departamento=:id");
			$sql->bindValue(':id', $_GET['id']);
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header("HTTP/1.1 200 hay datos");
			echo json_encode($sql->fetchAll());
			exit;				
			
			} else {
			
			$sql = $pdo->prepare("SELECT * FROM departamento");
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header("HTTP/1.1 200 hay datos");
			echo json_encode($sql->fetchAll());
			exit;		
		}
	}
	
	//Insertar registro
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$sql = "INSERT INTO departamento (departamento) VALUES(:departamento)";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':departamento', $_POST['departamento']);
		$stmt->execute();
		$idPost = $pdo->lastInsertId(); 
		if($idPost)
		{
			header("HTTP/1.1 200 Ok");
			echo json_encode($idPost);
			exit;
		}
	}
	
	//Actualizar registro
	if($_SERVER['REQUEST_METHOD'] == 'PUT')
	{		
		$sql = "UPDATE departamento SET departamento=:departamento WHERE id_departamento=:id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':departamento', $_GET['departamento']);
		$stmt->bindValue(':id', $_GET['id_departamento']);
		$stmt->execute();
		header("HTTP/1.1 200 Ok");
		exit;
	}
	
	//Eliminar registro
	if($_SERVER['REQUEST_METHOD'] == 'DELETE')
	{
		$sql = "DELETE FROM productos WHERE id_departamento=:id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':id', $_GET['id_departamento']);
		$stmt->execute();
		header("HTTP/1.1 200 Ok");
		exit;
	}
	
	//Si no corresponde a ninguna opción anterior
	header("HTTP/1.1 400 Bad Request");
?>