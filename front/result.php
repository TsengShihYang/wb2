<?php
$que=$Que->find($_GET['id']);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$que['text'];?></legend>
    <div style="font-weight:bolder"><?=$que['text'];?></div>

<?php
$opts=$Que->all(['parent'=>$que['id']]);
foreach($opts as $key=> $opt){
    $total=($que['count']>0)?$que['count']:1;
    $rate=round($opt['count']/$total,2);
    $length=80*$rate;
    $num=$rate*100;
    echo "<div style='display:flex;margin:10px 0px'>";
    echo "<div style='width:50%'>";
        echo $key+1;
        echo ".";
        echo $opt['text'];
    echo "</div>";
    echo "<div style='width:50%'>";
        echo "<div style='display:inline-block;
                          height:25px;
                          background:#ccc;
                          width:$length%'></div>";
        echo $opt['count']."票($num%)";
    echo "</div>";
    echo "</div>";
}
?>
<div class="ct">
            <button onclick="location.href='?do=que'">返回</button>
        </div>
</fieldset>