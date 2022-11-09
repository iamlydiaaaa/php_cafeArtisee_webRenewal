<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

define('COUNSEL', '0.1.1');

$g5['counsel_table']	   = G5_TABLE_PREFIX . 'counsel_config';// 고객상담 설정 테이블
$g5['counsel_item_table']  = G5_TABLE_PREFIX . 'counsel_item';  // 고객상담 아이템 설정 테이블

$csconfig	= sql_fetch(" select * from {$g5['counsel_table']} ");

?>
