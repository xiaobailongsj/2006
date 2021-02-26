<?php
$account = $_POST['account'];
$pwd = $_POST['pwd'];
$pwd = md5($pwd);
$pdo = new PDO("mysql:host=127.0.0.1;dbname=2006", 'root', 'root');
$sql="select * from `user` where account='$account'";
$res=$pdo->query($sql);
$arr= $res->fetch(PDO::FETCH_ASSOC);
if(!empty($arr)){
    if($pwd==$arr['pwd']){
        session_start();
        $_SESSION['account']=$account;
        $_SESSION['id']=$arr['id'];

        $response=[
            'erron'=>0,
            'mgs'=>'登录成功'
        ];
    }else{

        $response=[
            'erron'=>40001,
            'mgs'=>'登录失败'
        ];
    }
}else{
    $response=[
        'erron'=>40001,
        'mgs'=>'登录失败,帐号或密码有误'
    ];
}
echo json_encode($response);