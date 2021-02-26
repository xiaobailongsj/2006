<?php
$pdo = new PDO("mysql:host=127.0.0.1;dbname=2006", 'root', 'root');
$sql = "select * from sub inner join c_class on sub.c_id=c_class.c_id";

$res=$pdo->query($sql);
$arr = $res->fetchAll();
?>
<table border="1">
    <tr>
        <td>姓名</td>
        <td>班级</td>
        <td>照片</td>
        <td>学生简介</td>
        <td>操作</td>
    </tr>
    <?php foreach ($arr as $k=>$v){?>
    <tr>
        <td><?php echo $v['name']?></td>
        <td><?php if($v['c_id']==1){
            echo '2006';
            }else if($v['c_id']==2){
             echo '2007';
            }else{
            echo "2008";
            }
            ?></td>
        <td><img src="<?php echo $v['pot']?>" width="50px" height="50px" alt=""></td>
        <td><?php echo $v['sub']?></td>
        <td>
            <a href="#">删除</a>
            <a href="#">修改</a>
        </td>
    </tr>
    <?php }?>
</table>