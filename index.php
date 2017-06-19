<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Inicial</title>
	</head>
	<body>
		<form method="post" action="adicionar_time.php">
			<input type="text" name="adicionar" id="adicionar" placeholder="Digite o time a ser adicionado" size="60"/>
			<input type="submit"/>
		</form>
		<br/><br/>
		<form method="post" action="adicionar_resultado.php">
			<select name="time_mandante" id="time_mandante">
				<?php
					$handle=fopen("times.txt","r");
					$i=0;
					while(!feof($handle)){
						$linha=fgets($handle);
						$i++;
				?>
				<option  name="time_mandante" id="time_mandante" ><?php echo "$linha";?></option>
				<?php		
					}
				?>
			</select><br/>
			<select name="time_visitante" id="time_visitante">
				<?php
					$handle=fopen("times.txt","r");
					$i=0;
					while(!feof($handle)){
						$linha=fgets($handle);
						$i++;
				?>
				<option name="time_visitante" id="time_visitante"><?php echo "$linha";?></option>
				<?php		
					}
				?>
			</select><br/>
			<input type="number" name="gols_mandante" id="gls_mandante" placeholder="Digite os gols do time mandante" size="60"/><br/>
			<input type="number" name="gols_visitante" id="gols_visitante" placeholder="Digite os gols do time visitante" size="60"/><br/>
			<input type="submit"/>
		</form>

	</body>
</html>