<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Inicial</title>
	</head>
	<body>
		<table>
			<tr>
				<th>Nome</th>
				<th>Jogos</th>
				<th>Pontos</th>
				<th>Vitórias</th>
				<th>Empates</th>
				<th>Derrotas</th>
				<th>Gols pró</th>
				<th>Gols contra</th>
				<th>Saldo de gols</th>
				<th>Aproveitamento</th>
			</tr>
			<?php 
				$handle=fopen("times.txt","r");
				while(!feof($handle)){
					$time=fgets($handle);
					$time=str_replace("\r\n","",$time);
						$jogos=0;
						$vitorias=0;
						$derrotas=0;
						$empates=0;
						$golsp=0;
						$golsc=0;
						$saldo=0;
						$ap=0;
					$handle1=fopen("resultados.txt","r");
					while(!feof($handle1)){
						$jogo=fgets($handle1);
						$jogo=str_replace("\r\n","",$jogo);
						$array=explode(";",$jogo);
						if($time==$array[0]||$time==$array[1]){
							$jogos++;
						}
						if($time==$array[0]){
							if($array[2]>$array[3]){
								$vitorias++;
							}elseif($array[2]<$array[3]){
								$derrotas++;
							}else{
								$empates++;
							}
						}elseif($time==$array[1]){
							if($array[3]>$array[2]){
								$vitorias++;
							}elseif($array[3]<$array[2]){
								$derrotas++;
							}else{
								$empates++;
							}
						}
						$pontos=$vitorias*3+$empates;
						if($time==$array[0]){
							$golsp+=$array[2];
							$golsc+=$array[3];
						}elseif($time==$array[1]){
							$golsc+=$array[2];
							$golsp+=$array[3];
						}
						$saldo=$golsp-$golsc;
					}
				if($jogos>0){
					$ap=($pontos/($jogos*3))*100;
					$ap.="%";
				}else{
					$ap=0;
					$ap.="%";
				}
			?>
			<tr>
				<td><?php echo $time;?></td>
				<td><?php echo $jogos;?></td>
				<td><?php echo $pontos;?></td>
				<td><?php echo $vitorias;?></td>
				<td><?php echo $empates;?></td>
				<td><?php echo $derrotas;?></td>
				<td><?php echo $golsp;?></td>
				<td><?php echo $golsc;?></td>
				<td><?php echo $saldo;?></td>
				<td><?php echo $ap;?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>