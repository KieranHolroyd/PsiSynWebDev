<?php 

include 'incl/db.php';
$id=$_POST['id'];
$r=DB::queryFirstRow("SELECT * FROM news WHERE id='$id'");
$return="<div style='padding: 10px;text-align: justify;'>".$r['content']."</div>";
$arr=array();
$arr['content']=$return;
$arr['title']=$r['title'];
$arr['authorndate']=$r['author']." | ".$r['uploaded'];
echo json_encode($arr);
?>