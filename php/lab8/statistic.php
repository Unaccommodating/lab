<?php
$content = "<style>body{background: #ddeaff;} div {background:white; border:3px solid #fc3; border-radius: 10px; padding:15px; width:100px;}</style>";
echo $content;
$json = file_get_contents("main.json");
$array = json_decode($json, true);


for ($i = 1; $i <= 5; $i++) { 
    $CTR = ( $array[($i)]["click"] * 100 / ($array[($i)]['view']) );
    $CTI = ( $array[($i)]["view"] * 100 / ($array['AllView']) );
    $CTB = ( $array[($i)]["buy"] * 100 / ($array[($i)]['click']) );
    echo "<div>";
    echo "<p>
            Баннер ".($i).":</b><br>
            CTR:".number_format($CTR, 2)."%<br>
            CTI:".number_format($CTI, 2)."%<br>
            CTB:".number_format($CTB, 2)."%<br><br>
          </p>";
          echo "</div>";
          echo "</br>";
}

?>