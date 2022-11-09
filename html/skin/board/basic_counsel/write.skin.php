<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PLUGIN_PATH.'/counsel/config.php');
include_once(G5_PLUGIN_PATH.'/counsel/function.lib.php');

if(!$w && $csconfig['agree']){
	if($_POST['agree']){
		include_once ($board_skin_path.'/write.step2.skin.php');
	}else{
		include_once ($board_skin_path.'/write.step1.skin.php');
	}
}else{
	include_once ($board_skin_path.'/write.step2.skin.php');
}
?>