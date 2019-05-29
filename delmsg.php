<?php
$filename='file/msg.txt';
if(isset($_GET['id'])){
	delmsg($filename, $_GET['id']);
}


function delmsg($fileurl,$id){
	if(filesize($fileurl)>0){
		$memo=file_get_contents($fileurl);
		$arr=explode('|', $memo);
		if(count($arr)>0){
			unset($arr[$id]);//删除数组指定下标的值
			$msg=implode('|', $msg);
			file_put_contents($fileurl, $msg);
			header("refresh:1;url=msg.php");
			echo "<script>alert('删除成功');</script>";
			//print_r($arr);
		}
	}
}


?>