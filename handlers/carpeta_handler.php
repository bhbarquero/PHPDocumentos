<?php
class CarpetaHandler {
	function get($idCarpeta) {
		global $mstch;

		if(isset($_SESSION["usuarioId"])){
			
			$carpetas=get_carpetas($_SESSION["usuarioId"],$idCarpeta);
			$usuario = $_SESSION["usuario"];
			$archivos=get_archivos($idCarpeta);
			$grupos= get_grupos();
			$etiquetas=get_etiquetas();
			$MigasPan = $_SESSION['MigasPan'];
			$desCarpeta = get_DescripcionCarpeta($idCarpeta);	
			
			
			if($idCarpeta!=0)
			{
				$bandera=0;
				$MigasPan = $_SESSION['MigasPan'];
				$vectorMigas2 = explode(";",$MigasPan);
				$MigasPan="";
				foreach($vectorMigas2 as $valor){
					$vectorAux2= explode("-",$valor);
					
					if($bandera==0 and $vectorAux2[0]!= $idCarpeta)
					{
						if($MigasPan == "")
							{$MigasPan = $vectorAux2[0]."-".$vectorAux2[1];}
						else
							{$MigasPan = $MigasPan.";".$vectorAux2[0]."-".$vectorAux2[1];}
						
					}
					else
					{
						if($vectorAux2[0]== $idCarpeta)
							{$bandera=1;}
					}
					
					
				}
				
				
				
				$NombreCarpeta ="";
				
				foreach($desCarpeta as $value)
				{
					$NombreCarpeta=($value['Descripcion']);
				}	
				$MigasPan=$MigasPan.";".$idCarpeta."-".$NombreCarpeta;
				$_SESSION['MigasPan']= $MigasPan;
				
				$vectorMigas = explode(";",$MigasPan);
				$vectorMigasPan = array();	
				foreach($vectorMigas as $valor){
					$vectorAux= explode("-",$valor);
					array_push($vectorMigasPan,array("Id"=>$vectorAux[0],"Carpeta"=>$vectorAux[1].' / ',));
					
				}
			}
			else
			{
				$MigasPanAux = "0-Mi Unidad";
				$_SESSION['MigasPan']= $MigasPanAux;
				$vectorMigasPan=array();
				$vectorMigasPan = array(
					"Id" => "0",
					"Carpeta" => "Mi Unidad");
			}

			echo $mstch->render('header',array(
				'usuario'=>$usuario,
				'migas' => $vectorMigasPan
				));

			echo $mstch->render('miunidad', array(
				'carpetas' => $carpetas,
				'archivos' => $archivos,
				'grupos' => $grupos,
				'etiquetas' => $etiquetas));
			
			echo $mstch->render('footer');
		}
		else
			header('Location:/PHPDocumentos/');
		
	}
}