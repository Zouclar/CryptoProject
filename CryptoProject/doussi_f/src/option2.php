<?php
require_once ('resources.php');
require_once ('menu.php');

 function chiffrage(){

$stdin = fopen("php://stdin", "r");
echo "Veuillez entrer le texte que vous voulez crypter : \n";
fscanf(STDIN, "%s\n", $entry);
if ($entry == null) {
	chiffrage();
}
else {
echo "Veuillez entrer la clé publique\n";
fscanf(STDIN, "%s\n", $cle);
echo "Veuillez entrer le nombre n\n";
fscanf(STDIN, "%s\n", $n);

  for ($i=0; $entry[$i] != "" ; $i++) {
  	$temp = ord($entry[$i]);
  	$temp2 = decbin($temp);
  	$bin = sprintf( "%08d", $temp2);
  	$line = $line.$bin;
  }
$rest = my_modulo(intval(strlen($line)), intval($n));
for ($rest; $rest != $n ; $rest++) {
	$line = $line."0";
	}
	$split = str_split($line, $n);
	cypher($split, $cle, $n);
}
}

function cypher($split, $cle, $n){
	$tab = [];
	$exp = explode(",", $cle);
	array_splice($exp, $n);
	$n--;
	for ($i=0; $split[$i] ; $i++) {
		for ($j=0; $split[$i][$j] != ''; $j++) {
			if ($split[$i][$j] == "1") {
				$tab[$i] += $exp[$n - $j];
			}
		}
		$s .= $tab[$i].",";
	}
echo "Le message crypté est : ".substr($s, 0,-1)."\n\n";
affchoice();
}