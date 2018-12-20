<?php
#------------------------------------------------------------------------------------------#
#  Copyright (c) Dr. R. Urban                                                              #
#  24.05.2015                                                                              #
#  Web-GUI-for-stockfish-chess                                                             #
#  https://github.com/antiproton                                                           #
#  Released under the MIT license                                                          #
#  https://github.com/antiproton/Web-GUI-for-stockfish-chess/blob/master/LICENSE           #
#------------------------------------------------------------------------------------------#
// session_start();

$security_code = "1534";

$pfad_stockfish  = "C:/xampp/htdocs/Chess/assets/stockfish/Windows/stockfish_10_x64.exe";

$thinking_time = 1000; # milliseconds
#------------------------------------

$code = "1534";

if ($code !== $security_code){echo "Security code is not the same"; exit;}

$fen = $_POST['fen'];
if ($fen == ""){echo "FEN is empty!";exit;}

// $fen = 'rnbqkbnr/pppppppp/8/8/8/4P3/PPPP1PPP/RNBQKBNR b KQkq - 0 1';


$time = microtime(1);
$cwd='./';


$sf  = $pfad_stockfish;


$descriptorspec = array(
0 => array("pipe","r"),
1 => array("pipe","w"),
) ;

$other_options = array('bypass_shell' => 'true');

$process = proc_open($sf, $descriptorspec, $pipes, $cwd, null, $other_options) ;

if (is_resource($process)) {
fwrite($pipes[0], "uci\n");
fwrite($pipes[0], "ucinewgame\n");
fwrite($pipes[0], "isready\n");

fwrite($pipes[0], "position fen $fen\n");
fwrite($pipes[0], "go movetime $thinking_time\n");
fwrite($pipes[0], "setoption name MultiPV value 5\n");

$str="";



while(true){
usleep(100);
$s = fgets($pipes[1],4096);
$str1 = $s;
if(strpos(' '.$str1,'multipv 1')){
break;
}
}

while(true){
usleep(100);
$s = fgets($pipes[1],4096);
$str2 = $s;
if(strpos(' '.$str2,'multipv 2')){
break;
}
}

while(true){
usleep(100);
$s = fgets($pipes[1],4096);
$str3 = $s;
if(strpos(' '.$str3,'multipv 3')){
break;
}
}

while(true){
usleep(100);
$s = fgets($pipes[1],4096);
$str4 = $s;
if(strpos(' '.$str4,'multipv 4')){
break;
}
}

while(true){
usleep(100);
$s = fgets($pipes[1],4096);
$str5 = $s;
if(strpos(' '.$str5,'multipv 5')){
break;
}
}

$teile = explode(" ", $str1);
// $score = intval($teile[9]);
// $scored = $score/100;
// echo $scored." ";

$zug = str_split($teile[19]);
echo $zug[2].$zug[3].",";
// echo $zug.",";

$teile2 = explode(" ", $str2);
// $score = intval($teile2[9]);
// $scored = $score/100;
// echo $scored." ";

$zug2 = str_split($teile2[19]);
echo $zug2[2].$zug2[3].",";

$teile3 = explode(" ", $str3);
// $score = intval($teile3[9]);
// $scored = $score/100;
// echo $scored." ";

$zug3 = str_split($teile3[19]);
echo $zug3[2].$zug3[3].",";

$teile4 = explode(" ", $str4);
// $score = intval($teile4[9]);
// $scored = $score/100;
// echo $scored." ";

$zug4 = str_split($teile4[19]);
echo $zug4[2].$zug4[3].",";

$teile5 = explode(" ", $str5);
// $score = intval($teile5[9]);
// $scored = $score/100;
// echo $scored." ";

$zug5 = str_split($teile5[19]);
echo $zug5[2].$zug5[3].",";

while(true){
usleep(100);
$s = fgets($pipes[1],4096);
$str .= $s;
if(strpos(' '.$s,'bestmove')){
break;
}
}

$teile = explode(" ",$s);
// echo $teile[1];
$strbest = str_split($teile[1]);
// var_dump($strbest);



fclose($pipes[0]);
fclose($pipes[1]);
proc_close($process);

}

echo $strbest[0].$strbest[1]."-".$strbest[2].$strbest[3];
exit;
#echo "<br>";
#echo microtime(1)-$time;


?>