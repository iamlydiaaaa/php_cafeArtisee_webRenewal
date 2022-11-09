<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PLUGIN_PATH.'/counsel/config.php');

$wr_1 = $zip."|".$addre1."|".$addre2."|".$addre3."|".$addr_jibeon;
$wr_2 = $ozip."|".$oaddre1."|".$oaddre2."|".$oaddre3."|".$oaddr_jibeon;
$wr_3 = $tel1."-".$tel2."-".$tel3."」「".$hphone1."-".$hphone2."-".$hphone3."」「".$otel1."-".$otel2."-".$otel3;
$wr_4 = $sex."」「".$rcid."」「".$ename."」「".$year."-".$month."-".$day."」「".$merry."」「".$grade."」「".$bizno."」「".$emailok;
$wr_5 = $job."」「".$duty."」「".$likes;
$wr_6 = $input1."」「".$input2."」「".$input3."」「".$input4."」「".$input5."」「".$input6;
$wr_7 = $select1."」「".$select2."」「".$select3."」「".$select4."」「".$select5."」「".$select6;
$wr_8 = $radio1."」「".$radio2."」「".$radio3."」「".$radio4."」「".$radio5."」「".$radio6;

for ($s=0 ; $s<=sizeof($check1); $s++){
	$ch_val1 .= $check1[$s]."|";
}
for ($s=0 ; $s<=sizeof($check2); $s++){
	$ch_val2 .= $check2[$s]."|";
}
for ($s=0 ; $s<=sizeof($check3); $s++){
	$ch_val3 .= $check3[$s]."|";
}
for ($s=0 ; $s<=sizeof($check4); $s++){
	$ch_val4 .= $check4[$s]."|";
}
for ($s=0 ; $s<=sizeof($check5); $s++){
	$ch_val5 .= $check5[$s]."|";
}
for ($s=0 ; $s<=sizeof($check6); $s++){
	$ch_val6 .= $check6[$s]."|";
}

$wr_9 = $ch_val1."」「".$ch_val2."」「".$ch_val3."」「".$ch_val4."」「".$ch_val5."」「".$ch_val6;

$txt1 = '';
if (isset($_POST['txt1'])) {
    $txt1 = substr(trim($_POST['txt1']),0,65536);
    $txt1 = preg_replace("#[\\\]+$#", "", $txt1);
}
$wr_10 = $txt1;

$txt2 = '';
if (isset($_POST['txt2'])) {
    $txt2 = substr(trim($_POST['txt2']),0,65536);
    $txt2 = preg_replace("#[\\\]+$#", "", $txt2);
}
$wr_11 = $txt2;

$txt3 = '';
if (isset($_POST['txt3'])) {
    $txt3 = substr(trim($_POST['txt3']),0,65536);
    $txt3 = preg_replace("#[\\\]+$#", "", $txt3);
}
$wr_12 = $txt3;

$txt4 = '';
if (isset($_POST['txt4'])) {
    $txt4 = substr(trim($_POST['txt4']),0,65536);
    $txt4 = preg_replace("#[\\\]+$#", "", $txt4);
}
$wr_13 = $txt4;

$sql1  = " update $write_table set wr_1 = '$wr_1', wr_2 = '$wr_2', wr_3 = '$wr_3', wr_4 = '$wr_4', wr_5 = '$wr_5', wr_6 = '$wr_6', wr_7 = '$wr_7', wr_8 = '$wr_8', wr_9 = '$wr_9', wr_10 = '$wr_10', wr_11 = '$wr_11', wr_12 = '$wr_12', wr_13 = '$wr_13' where wr_id = '$wr_id' ";

if(sql_query($sql1)){
	if($csconfig['gourl']) alert('정상적으로 접수되었습니다.',$csconfig['gourl']);
	else alert('정상적으로 접수되었습니다.',"./write.php?bo_table=".$bo_table);
}
?>