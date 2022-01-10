<?php include_once "../base.php";

foreach($_POST['id'] as $id){

    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $News->del($id);
    }else{
        $news=$News->find($id);
        $news['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        $News->save($news);

        /* $sh=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        $News->save(['id'=>$id,'sh'=>$sh]); */
    }
}


/*
 * 不健議的做法   
foreach($_POST['del'] as $id){
    $News->del($id);
}
$news=$News->all();

foreach($news as $n){
    if(isset($_POST['sh']) && in_array($n['id'],$_POST['sh'])){
        $n['sh']=1;
    }else{
        $n['sh']=0;
    }
    $n['sh']=(isset($_POST['sh']) && in_array($n['id'],$_POST['sh']))?1:0;
    $News->save($n);
}
 */
to("../back.php?do=news");