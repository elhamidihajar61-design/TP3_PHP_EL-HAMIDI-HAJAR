<?php require "config.php";
function mention($note){
 if($note>=16) return "Très bien";
 elseif($note>=14) return "Bien";
 elseif($note>=12) return "Assez bien";
 elseif($note>=SEUIL) return "Passable";
 else return "Ajourné";
}
echo mention(15)."<br>";
$mois=date("m");
switch($mois){
 case "01": echo "Janvier"; break; case "02": echo "Février"; break; case "10": echo "Octobre"; break;
 default: echo "Autre mois $mois";
}
echo "<br>Triangle:<br>";
for($i=1;$i<=6;$i++){ for($j=1;$j<=$i;$j++) echo "*"; echo "<br>"; }
$i=0; while($i<=20){ if($i==10) echo "<b>$i</b> "; else echo "$i "; $i+=2; } echo "<br>";
for($i=0;$i<=10;$i++){ if($i%2!=0) continue; echo "$i "; } echo "<br>";
$i=1; while(true){ switch($i){ case 5: echo "At 5<br>"; break; case 10: echo "At 10; quitting<br>"; break 2; } $i++; }
?>