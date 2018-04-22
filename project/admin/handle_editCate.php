<?php 
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");
    $id=$_GET['id'];

    $result=mysqli_query($conn,"select weight from category");
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    for($i=0;$i<mysqli_num_rows($result);$i++){
        if($_POST['weight']===$rows[$i]){
            echo "该权值已经存在，不能更改，请重新编辑！";
            ?>
            <script type="text/javascript">
            window.location="editCate.php?id="+$id;
            </script>
<?php
        }
    }

    $sql="UPDATE category set name='".$_POST['name']."',weight='".$_POST['weight']."' where id='".$id."'";
    mysqli_query($conn,$sql);
    if(mysqli_errno($conn)!==0){
        die(mysqli_error($conn));
    }
    echo '修改类目信息成功！';
?>