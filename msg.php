<?php
$showmsg;
$filename='file/msg.txt';
if(isset($_POST['msg'])>0){
	setmsg($filename, $_POST['msg']);
	flush();
	header('refresh:1;url=msg.php');
	echo "<script>alert('添加成功！');</script>";
	$showmsg=getmsg('file/msg.txt');
}
else{
	$showmsg=getmsg('file/msg.txt');
}

//function getmsg($fileurl){
//	$remsg='';
//	if(filesize($fileurl)>0){
//		$memo=file_get_contents($fileurl);
//		//file_get_contents(文件路径) 把指定文件的内容读取出来
//		$msgarr=explode('|', $memo);
//		if(count($msgarr)>0){
//			foreach($msgarr as $key=>$val){
//				$remsg.='<p>'.$val.'<span class=del><a href="delmsg.php?id='.$key.'">删除</a></span></p>';
//			}
//		}
//		else{
//			$remsg=$msgarr[0];
//		}
//		
//	}
//	else{
//		$remsg='';
//	}
//	return $remsg;
//}
function getmsg($filepath){
	$remsg='';
	
}


function setmsg($fileurl,$msg){
	$memo='';
	if(filesize($fileurl)>0){
		$memo=file_get_contents($fileurl);
		$memo.='|'.$msg;
	}
	else{
		$memo=$msg;
	}
	file_put_contents($fileurl, $memo);
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<style type="text/css">
			.talk{width: 950px;height: 500px;margin: 0 auto;background-color: burlywood;}
			.getform{width: 950px;height: 200px;margin: 0 auto;background-color: darkgray;text-align: center;}
			.showmsg{width: 600px;height: 350px;border:2px lightslategrey solid;position: absolute;left: 350px;top: 80px;overflow-y: auto;}
			.del{float: right;}
		</style>
	</head>
	<body>
		<div class="talk">
			<div class="showmsg">
				<?php
					echo $showmsg;
				?>
			</div>
		</div>
		
		<div class="getform">
			<form method="post" action="msg.php">
				<table align="center">
					<tr>
						<td>留言内容：</td>
						<td>
							<textarea rows="5" cols="60" name="msg" required="required"></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" value="提交" /></td>
					</tr>
				</table>
				
			</form>
		</div>
	</body>
</html>