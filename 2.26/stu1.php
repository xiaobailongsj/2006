<?php
$name=$_POST['name'];
$cla=$_POST['c_id'];
$pot=$_FILES['pot'];
$sub=$_POST['sub'];
$time = time();
$last = substr($pot['name'],strrpos($pot['name'],'.'));
$name_pot=time().rand(100,1000);
$potname=$name_pot.$last;
$dir=date('Y').'-'.date('m').'-'.date('d');
if(!is_dir($dir)){
    mkdir($dir);
}
$path =$dir.'/'.$potname;
$pot1=move_uploaded_file($pot['tmp_name'],$path);
if(empty($pot1)){
    echo "文件上传失败";exit;
}

session_start();
$log=$_SESSION['account'];
$pdo = new PDO("mysql:host=127.0.0.1;dbname=2006", 'root', 'root');
$sql="insert into sub(`name`,c_id,pot,sub,`time`,log)values ('$name','$cla','$path','$sub','$time','$log')";

$res= $pdo->query($sql);
if($res){
    echo "添加成功";
    header('refresh:2, url="list.php"');
}else{
    echo "添加失败";
    header('refresh:2, url="stu.php"');
}