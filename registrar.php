<?PHP
$hostname="localhost";
$database="tu_bd";
$username="root";
$password="";
$json=array();
	if(isset($_GET["names"])&&($_GET["user"]) && isset($_GET["pwd"])){
		$names=$_GET['names']
		$user=$_GET['user'];
		$pwd=$_GET['pwd'];
		
		$conexion=mysqli_connect($hostname,$username,$password,$database);
		
		$consulta="INSERT INTO usuarios(names, user, pwd) VALUES ('{$names}','{$user}' , '{$pwd}')";
		$resultado=mysqli_query($conexion,$consulta);

       
		if($consulta){
		   $consulta="SELECT * FROM usuarios  WHERE names='{$names}'";
		   $resultado=mysqli_query($conexion,$consulta);

			if($reg=mysqli_fetch_array($resultado)){
				$json['datos'][]=$reg;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}



		else{
			$results["names"]='';
			$results["user"]='';
			$results["pwd"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
		
	}
	else{   
		    $results["names"]='';
		   	$results["user"]='';
			$results["pwd"]='';
			$json['datos'][]=$results;
			echo json_encode($json);
		}
?>