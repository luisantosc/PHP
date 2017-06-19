<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Campeonatos</title>
	</head>
	<body>
		<?php
			$time=$_POST['adicionar'];
			$nome="times.txt";
			$modo="r";
			$a=0;
			$handle=fopen($nome,$modo);
			if($handle==0){
				exit();
			}
			while(!feof($handle)){
				$linha=fgets($handle);
				$linha=str_replace("\r\n","",$linha);
				if($linha==$time){
					echo"Esse time j? existe";
					$a=1;
				}
			}
			$handle=fopen($nome,"a");
			if($a==0){
				$time.="\r\n";
				$n=fwrite($handle,$time);
			}
		?>
	</body>
</html>