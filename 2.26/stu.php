<?php
session_start();
if(empty($_SESSION['account'])){
    echo "请先登录";
    header('refresh:2, url="login.html"');exit;
}
?>
<?php
$pdo = new PDO("mysql:host=127.0.0.1;dbname=2006", 'root', 'root');
$sql='select * from c_class';
$res = $pdo->query($sql);
$arr = $res->fetchAll();
//print_r($arr)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="stu1.php" method="post"  enctype="multipart/form-data">
    <table>
        <tr>
            <td>学生姓名</td>
            <td>
                <input type="text" name="name" id="name">
            </td>
        </tr>
        <tr>
            <td>新闻班级</td>
            <td>
                <select name="c_id" id="">
                    <?php foreach ($arr as $k=>$v){?>
                        <option value="<?php echo $v['c_id']?>"><?php echo $v['c_name']?></option>
                    <?php } ?>

                </select>
            </td>
        </tr>
        <tr>
            <td>学生照片</td>
            <td><input type="file" name="pot" id=""></td>
        </tr>
        <tr>
            <td>学生简介</td>
            <td><textarea name="sub" id="" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" value="添加"></td>
            <td></td>
        </tr>
    </table>
</form>
<script>
document.getElementById('name').addEventListener('blur',function () {
  var name = document.getElementById('name').value
    var reg =/^[\u4e00-\u9fa5_a-zA-Z0-9]{2,30}$/
    if(name==""){
        alert('用户名不能为空')

    }else if(!reg.test(name)){
        alert('用户名允许数字字母汉字2-30位')

    }else{

    }
});

</script>
</body>
</html>