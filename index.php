<?php
	$b=new PDO("mysql:host=localhost;dbname=add", "root", "");
	$nome=array(
		"ramon",
		"Luis",
		"Paulo",
		"Giovana",
		"Mariana",
		"Gustavo",
		"Ana",
		"Fabiula",
		"Mauricio",
		"Bruna",
		"Rui",
		"Cristiano",
		"Edite",
		"flordelico",
		"Dorlico",
		"Um Dois Tres de oliveira Quatro",
		"Marcelo Piroka",
		"Naira Pinto de Jesus",
		"Fabiana",
		"Fabio"
	);
	$p=array(
		"Arroz",
		"Games",
		"ticTac",
		"Maconha",
		"Cristal",
		"Batata",
		"Margarina",
		"Peito de frango",
		"Crack",
		"Netflix",
		"PC"
	);


	echo "hhh";
	for($i=0; $i < 200; $i++ ){
		$unidade=rand(0, 500);
		$d=rand(1, 31);
		$d=($d < 10 )? "0$d" : $d;
		$m=rand(1, 31);
		$m=($m < 10 )? "0$m" : $m;
		$data=$d."/".$m."/".rand(1970, 2016);
		$insert=$b->prepare("INSERT INTO `usuario`(`nome`, `unidade`, `produto`, `data`) VALUES (?,?,?,?)");
		$insert->bindParam(1, $nome[rand(0,18)]);
		$insert->bindParam(2, $unidade);
		$insert->bindParam(3, $p[rand(0,10)]);
		$insert->bindParam(4, $data);
		//$insert->execute();
		echo "$i<br>";
	}

?>
