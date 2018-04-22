<?php
    header('Content-Type:text/html; charset=UTF-8');
    $conn = mysqli_connect('localhost', 'root' ,'' , 'makeorder');
    if (mysqli_connect_errno() !== 0) {
        die(mysqli_connect_error());
    }
    mysqli_query($conn,"set names utf8");

    $result=mysqli_query($conn,"select * from category");
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    $lists=mysqli_query($conn,"select *from product");
    $searches=[];
    while ($search = mysqli_fetch_assoc($lists)) {
        $searches[]=$search;
    }


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="style/bootstrap-admin.css">
<link rel="stylesheet" href="style/product.css">

</head>

<body>
 
<span class="main-title">商品列表</span>
<div class="details">
    <div class="details_operation clearfix">
        <div class="bui_select">
            <input class="btn btn-primary" type="button" value="添加商品" class="d" onclick="addPro()" style="display: inline-block;margin-top: 1.5rem;">
        </div>
        <div class="fr">
            <div class="text">
                <span class="search_txt">所属类目：</span>
                <div class="bui_select">
                    <select id="" class="select form-control search_select" onchange="change(this.value)">
                        <option value="" selected='selected'>全部</option>
                        <?php foreach($rows as $key=>$row):?>
                        <option value="<?=$row['name']?>" >
                            <?php echo $row['name'];?>
                        </option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!--表格-->
    <table  class="table  table-hover">
        <thead>
            <tr>
                <th width="10%">商品编号</th>
                <th width="15%">商品名称</th>
                <th width="10%">商品单价</th>
                <th width="20%">商品描述</th>
                <th width="15%">商品图像</th>
                <th width="15%">所属类目</th>
                <th width="15%">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($searches as $key=>$search):?>
            <tr align="center">
                <!-- 这里的id和for里面的c1 需要循环出来 -->
                <td><?php echo $search['id'];?></td>
                <td><?php echo $search['name']; ?></td>
                <td><?php echo $search['price'];?></td>
                <td style="overflow: hidden;white-space: nowrap;text-overflow:ellipsis;"><?php echo $search['description'];?></td>
                <td><img style="width: 4rem;height:4rem;" src="./images/<?php echo $search['icon'].'.png';?>"/></td>
                <td><?php echo $search['category_name'];?></td>
                <td>
                    <a class="btn btn-link" onclick="editPro(<?php echo $search['id'];?>)">修改</a>
                    <a class="btn btn-link"  onclick="delPro(<?php echo $search['id'];?>)">删除</a>
                    </td>
                <td></td>
            </tr>
            <?php  endforeach;?>
        </tbody>
    </table> 
    <!-- <?php 
        if($totalRows>$pageSize){
            echo showPage($page, $totalPage,"keywords={$keywords}&order={$order}");   
        }
    ?> -->
</div>
<script type="text/javascript">
function showDetail(id,t){
	$("#showDetail"+id).dialog({
		  height:"auto",
	      width: "auto",
	      position: {my: "center", at: "center",  collision:"fit"},
	      modal:false,//是否模式对话框
	      draggable:true,//是否允许拖拽
	      resizable:true,//是否允许拖动
	      title:"商品名称："+t,//对话框标题
	      show:"slide",
	      hide:"explode"
	});
}
	function addPro(){
		window.location='addPro.php';
	}
	function editPro(id){
		window.location='editPro.php?id='+id;
	}
	function delPro(id){
		if(window.confirm("您确认要删除嘛？添加一次不易，且删且珍惜!")){
			window.location="delPro.php?id="+id;
		}
	}
	function search(){
		if(event.keyCode==13){
			var val=document.getElementById("search").value;
			window.location="listPro.php?keywords="+val;
		}
	}
	function change(val){
        if(val!=null){
		    window.location="listPro_cate.php?name="+val;
        }
        else if(val==null){
            window.location="listPro.php";
        }
	}
</script>
</body>
</html>