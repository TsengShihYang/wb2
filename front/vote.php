<?php
$subject=$Que->find($_GET['id']);
?>

<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$subject['text'];?></legend>
    <div style="font-weight:bolder"><h3><?=$subject['text'];?></h3></div>
    <form action="api/vote.php" method="post">
        <?php
        $opts=$Que->all(['parent'=>$subject['id']]);
        foreach($opts as $opt){
            echo "<p>";
            echo "<input type='radio' name='opt' value='{$opt['id']}'>";
            echo $opt['text'];
            echo "</p>";
        }
        ?>
        <input type="submit" value="我要投票">
    </form>
</fieldset>