<!DOCTYPE html>
<html>
<head>
	<title>show</title>
	<meta charset="utf-8">
	<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>

<?php require_once("./cbg_splider.php"); ?>
<?php require_once("./cbg_dec.php"); ?>

<?php $i=1;foreach ($result as $k => $v) { ?>
<div style="<?php if($i != 1){echo "display: none;";}?>" id="data_<?php echo $i;?>" class="data_page">
	<?php foreach ($v as $m => $n) {?>
	<div style="background-color: ; width: 33%; border: 2px;;">
		<p><?php if($m=='href'){?><a href="<?php echo $n;?>" target="view_window"><?php }?><?php echo $all_dec[$m].':   ';if(!is_array($n)){echo $n;}else{var_dump($n);}?><?php if($m=='href'){?></a><?php }?></p>
	</div>
	<?php }?>	
</div>
<?php $i++;}?>

<input id="page_num" value="1" style="display: none;">
<input id="max_page_num" value="<?php echo count($result);?>" style="display: none;">

<button id="up">上一页</button>
<button id="down">下一页</button>

<script type="text/javascript">
	$("#up").click(function(){
		var page_num = $("#page_num").val();
		page_num--;

		if(page_num < 1){
			page_num = 1;
			alert('已经是第一页了');
		}

		$("#page_num").val(page_num);
		$(".data_page").hide();
		$("#data_"+page_num).show();
	})
	$("#down").click(function(){
		var page_num = $("#page_num").val();
		page_num++;

		if(page_num > $("#max_page_num").val()){
			page_num = $("#max_page_num").val();
			alert('已经是最后一页');
		}

		$("#page_num").val(page_num);
		$(".data_page").hide();
		$("#data_"+page_num).show();
	})
</script>



</body>
</html>