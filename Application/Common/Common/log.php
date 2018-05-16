<?php


function errorLog($str){
	//打开日志文件
	$file = fopen(APP_PATH."log.txt", "a") or die("Unable to open file!");
	
	$txt = "\n".date('y-m-d h:i:s',time())."\t".$str."\n";
	
	//写入log日志
	fwrite($file, $txt);
	
	//关闭日志文件链接
	fclose($file);
}
?>