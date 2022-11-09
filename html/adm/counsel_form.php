<?php
$sub_menu = '400650';
include_once('./_common.php');
include_once(G5_PLUGIN_PATH.'/counsel/config.php');
include_once(G5_PLUGIN_PATH.'/counsel/function.lib.php');

include_once(G5_EDITOR_LIB);

auth_check($auth[$sub_menu], "w");

if($csconfig['bo_table']){
	$board = sql_fetch(" select * from {$g5['board_table']} where bo_table = '{$csconfig['bo_table']}' ");
	if ($board['bo_table']) {
		$write_counsel_table = $g5['write_prefix'] . $csconfig['bo_table']; // 게시판 테이블 전체이름

        if (isset($wr_id) && $wr_id){
            $write = sql_fetch(" select * from $write_counsel_table where wr_id = '$wr_id' ");
		}else{
			alert('등록된 자료가 없습니다.');
		}
	}
}else{
	alert("완라인 환경설정 > 환경설정 > 게시판명을 입력하세요.", "counsel_config.php");
}


$name = get_sideview($write['mb_id'], get_text($write['wr_name']), $write['mb_email'], $write['mb_homepage']);

// 확인
$is_score_yes  =  $write['wr_14'] ? 'checked="checked"' : '';
$is_score_no   = !$write['wr_14'] ? 'checked="checked"' : '';

$g5['title'] = '온라인 상담';
include_once (G5_ADMIN_PATH.'/admin.head.php');

$qstr .= ($qstr ? '&amp;' : '').'sca='.$sca;


$wr_1_temp = explode("|", $write[wr_1]);
$data[zip]			= $wr_1_temp[0];
$data[addre1]		= $wr_1_temp[1];
$data[addre2]		= $wr_1_temp[2];
$data[addre3]		= $wr_1_temp[3];
$data[addr_jibeon]	= $wr_1_temp[4];

$wr_2_temp = explode("|", $write[wr_2]);
$data[ozip]		= $wr_2_temp[0];
$data[oaddre1]		= $wr_2_temp[1];
$data[oaddre2]		= $wr_2_temp[2];
$data[oaddre3]		= $wr_2_temp[3];
$data[oaddr_jibeon]	= $wr_2_temp[4];

$wr_3_temp = explode("」「", $write[wr_3]);
$tel_temp = explode("-", $wr_3_temp[0]);
$data[tel1]	= $tel_temp[0];
$data[tel2]	= $tel_temp[1];
$data[tel3]	= $tel_temp[2];

$hphone_temp = explode("-", $wr_3_temp[1]);
$data[hphone1]	= $hphone_temp[0];
$data[hphone2]	= $hphone_temp[1];
$data[hphone3]	= $hphone_temp[2];

$otel_temp = explode("-", $wr_3_temp[2]);
$data[otel1]	= $otel_temp[0];
$data[otel2]	= $otel_temp[1];
$data[otel3]	= $otel_temp[2];

$wr_4_temp = explode("」「", $write[wr_4]);
$data[sex]	= $wr_4_temp[0];
$data[rcid]	= $wr_4_temp[1];
$data[ename]	= $wr_4_temp[2];

$ymd_temp = explode("-", $wr_4_temp[3]);
$data[year]	= $ymd_temp[0];
$data[month]	= $ymd_temp[1];
$data[day]	= $ymd_temp[2];

$data[merry]	= $wr_4_temp[4];
$data[grade]	= $wr_4_temp[5];
$data[bizno]	= $wr_4_temp[6];
$data[emailok]	= $wr_4_temp[7];

$wr_5_temp = explode("」「", $write[wr_5]);
$data[job]	= $wr_5_temp[0];
$data[duty]	= $wr_5_temp[1];
$data[likes]	= $wr_5_temp[2];

$wr_6_temp = explode("」「", $write[wr_6]);
$data[input1]	= $wr_6_temp[0];
$data[input2]	= $wr_6_temp[1];
$data[input3]	= $wr_6_temp[2];
$data[input4]	= $wr_6_temp[3];
$data[input5]	= $wr_6_temp[4];
$data[input6]	= $wr_6_temp[5];

$wr_7_temp = explode("」「", $write[wr_7]);
$data[select1]	= $wr_7_temp[0];
$data[select2]	= $wr_7_temp[1];
$data[select3]	= $wr_7_temp[2];
$data[select4]	= $wr_7_temp[3];
$data[select5]	= $wr_7_temp[4];
$data[select6]	= $wr_7_temp[5];

$wr_8_temp = explode("」「", $write[wr_8]);
$data[radio1]	= $wr_8_temp[0];
$data[radio2]	= $wr_8_temp[1];
$data[radio3]	= $wr_8_temp[2];
$data[radio4]	= $wr_8_temp[3];
$data[radio5]	= $wr_8_temp[4];
$data[radio6]	= $wr_8_temp[5];

$wr_9_temp = explode("」「", $write[wr_9]);
$data[check1]	= explode("|", $wr_9_temp[0]);
$data[check2]	= explode("|", $wr_9_temp[1]);
$data[check3]	= explode("|", $wr_9_temp[2]);
$data[check4]	= explode("|", $wr_9_temp[3]);
$data[check5]	= explode("|", $wr_9_temp[4]);
$data[check6]	= explode("|", $wr_9_temp[5]);

$data[txt1]	= $write[wr_10];
$data[txt2]	= $write[wr_11];
$data[txt3]	= $write[wr_12];
$data[txt4]	= $write[wr_13];

$sql = " select * from {$g5['counsel_item_table']} order by mno ";
$result = sql_query($sql);

?>
<style>
#fwrite .frm_address {margin:5px 0 0}
#fwrite #addr3 {display:inline-block;margin:5px 0 0;vertical-align:middle}
#fwrite #addr_jibeon {display:block;margin:5px 0 0}
#fwrite #oaddr3 {display:inline-block;margin:5px 0 0;vertical-align:middle}
#fwrite #oaddr_jibeon {display:block;margin:5px 0 0}
</style>

<form name="fwrite" id="fwrite" method="post" action="./counsel_formupdate.php" onsubmit="return counsel_submit(this);">
<input type="hidden" name="w" value="<?php echo $w; ?>">
<input type="hidden" name="wr_id" value="<?php echo $wr_id; ?>">
<input type="hidden" name="sca" value="<?php echo $sca; ?>">
<input type="hidden" name="sst" value="<?php echo $sst; ?>">
<input type="hidden" name="sod" value="<?php echo $sod; ?>">
<input type="hidden" name="sfl" value="<?php echo $sfl; ?>">
<input type="hidden" name="stx" value="<?php echo $stx; ?>">
<input type="hidden" name="page" value="<?php echo $page; ?>">


<div class="tbl_frm01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?> 수정</caption>
    <colgroup>
        <col class="grid_4">
        <col>
    </colgroup>
    <tbody>
    <tr>
        <th scope="row">이름</th>
        <td><?php echo $name; ?></td>
    </tr>
    <tr>
        <th scope="row"><label for="wr_subject">제목</label></th>
        <td><input type="text" name="wr_subject" required class="required frm_input" id="wr_subject" size="100"
        value="<?php echo get_text($write['wr_subject']); ?>"></td>
    </tr>
	<?
	$mdatas = Array() ;
	for ($i=0; $row=sql_fetch_array($result); $i++) {

		$fvs=$row[icode];

		$mdatas[$fvs][icode]=trim($row[icode]);
		$mdatas[$fvs][iname]=trim(stripslashes($row[iname]));
		$mdatas[$fvs][size]=trim($row[size]);
		$mdatas[$fvs][size2]=trim($row[size2]);
		$mdatas[$fvs][editor]=trim($row[editor]);
		$mdatas[$fvs][bigo]=trim(stripslashes($row[bigo]));
		$mdatas[$fvs][type]=$row[type];
		$mdatas[$fvs][1]=trim(stripslashes($row[it1]));
		$mdatas[$fvs][2]=trim(stripslashes($row[it2]));
		$mdatas[$fvs][3]=trim(stripslashes($row[it3]));
		$mdatas[$fvs][4]=trim(stripslashes($row[it4]));
		$mdatas[$fvs][5]=trim(stripslashes($row[it5]));
		$mdatas[$fvs][6]=trim(stripslashes($row[it6]));
		$mdatas[$fvs][7]=trim(stripslashes($row[it7]));
		$mdatas[$fvs][8]=trim(stripslashes($row[it8]));
		$mdatas[$fvs][9]=trim(stripslashes($row[it9]));
		$mdatas[$fvs][10]=trim(stripslashes($row[it10]));
		$mdatas[$fvs][11]=trim(stripslashes($row[it11]));
		$mdatas[$fvs][12]=trim(stripslashes($row[it12]));
		$mdatas[$fvs][13]=trim(stripslashes($row[it13]));
		$mdatas[$fvs][14]=trim(stripslashes($row[it14]));
		$mdatas[$fvs][15]=trim(stripslashes($row[it15]));
		$mdatas[$fvs][16]=trim(stripslashes($row[it16]));
		$mdatas[$fvs][17]=trim(stripslashes($row[it17]));
		$mdatas[$fvs][18]=trim(stripslashes($row[it18]));
		$mdatas[$fvs][19]=trim(stripslashes($row[it19]));
		$mdatas[$fvs][20]=trim(stripslashes($row[it20]));
		$mdatas[$fvs][21]=trim(stripslashes($row[it21]));
		$mdatas[$fvs][22]=trim(stripslashes($row[it22]));
		$mdatas[$fvs][23]=trim(stripslashes($row[it23]));
		$mdatas[$fvs][24]=trim(stripslashes($row[it24]));
		$mdatas[$fvs][25]=trim(stripslashes($row[it25]));
		$mdatas[$fvs][26]=trim(stripslashes($row[it26]));
		$mdatas[$fvs][27]=trim(stripslashes($row[it27]));
		$mdatas[$fvs][28]=trim(stripslashes($row[it28]));
		$mdatas[$fvs][29]=trim(stripslashes($row[it29]));
		$mdatas[$fvs][30]=trim(stripslashes($row[it30]));

		$Arrays=DArray($fvs,$mdatas);

			if (($row[type] == '21' || $row[type] == '22') && $csconfig[$fvs]!='0')
				add_javascript(G5_POSTCODE_JS, 0);    //다음 주소 js

			switch($row[type]){
				case '0': //영문이름
					if($csconfig[$fvs]!='0'){
					if($csconfig[$fvs]=='2') { $mdatas[$fvs][iname] .= "<strong class=\"sound_only\">필수</strong>"; $mdatas[$fvs]['class']=" required";}
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td><input type="text" name="'.$fvs.'" value="'.$data[$fvs].'" id="'.$fvs.'"'.$mdatas[$fvs]['class'].' class="frm_input'.$mdatas[$fvs]['class'].'" size="'.$mdatas[$fvs][size].'" placeholder="'.$mdatas[$fvs][bigo].'"></td>
					</tr>';
				} break;

				case '1': //셀렉트박스
					if($csconfig[$fvs]!='0'){
					if($csconfig[$fvs]=='2') { $mdatas[$fvs][iname] .= "<strong class=\"sound_only\">필수</strong>"; $mdatas[$fvs]['class']=" required";}
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>'.single_selectbox($fvs,$Arrays,$Arrays,$data[$fvs],$mdatas[$fvs]['class'],1).' '.$mdatas[$fvs][bigo].'</td>
					</tr>';
				} break;

				case '2': //텍스트
					if($csconfig[$fvs]!='0'){
					if($csconfig[$fvs]=='2') { $mdatas[$fvs][iname] .= "<strong class=\"sound_only\">필수</strong>"; $mdatas[$fvs]['class']=" required";}
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td><input type="text" name="'.$fvs.'" value="'.$data[$fvs].'" id="'.$fvs.'"'.$mdatas[$fvs]['class'].' class="frm_input'.$mdatas[$fvs]['class'].'" size="'.$mdatas[$fvs][size].'" placeholder="'.$mdatas[$fvs][bigo].'"></td>
					</tr>';
				} break;

				case '3': //라디오
					if($csconfig[$fvs]!='0'){

					$spaces='';

					if($mdatas[$fvs][size]==100){ $spaces='<br>'; }
					else{ for($j=0; $j<$mdatas[$fvs][size]; $j++) { $spaces.='&nbsp;';}   }

					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>'.single_radiobox($fvs,$Arrays,$Arrays,$data[$fvs],$spaces).' '.$mdatas[$fvs][bigo].'</td>
					</tr>';

					if($csconfig[$fvs]=='2') {
						$javastr.="
						kk=0;
						for ( ii=0; ii < ".sizeof($Arrays)." ; ii++ ){
							if (document.fwrite.".$fvs."[ii].checked) {kk=1; ii=".sizeof($Arrays)."; }
						}
						if(kk<1){ alert('".$mdatas[$fvs][iname]."을(를) 선택하여 주십시오.'); document.fwrite.".$fvs."[0].focus(); return false ;   }
						";
					}

				} break;

				case '4'://체크박스
					if($csconfig[$fvs]!='0'){

					$spaces='';

					if($mdatas[$fvs][size]==100){ $spaces='<br>'; }
					else{ for($j=0; $j<$mdatas[$fvs][size]; $j++) { $spaces.='&nbsp;';}   }

					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>'.single_checkbox($fvs,$Arrays,$Arrays,$data[$fvs],$spaces).' '.$mdatas[$fvs][bigo].'</td>
					</tr>';

					if($csconfig[$fvs]=='2') {
						$javastr.="
						kk=0;
						for ( ii=0; ii < ".sizeof($Arrays)." ; ii++ ){
							if (document.fwrite.".$fvs."[ii].checked) {kk=1; ii=".sizeof($Arrays)."; }
						}
						if(kk<1){ alert('".$mdatas[$fvs][iname]."을(를) 선택하여 주십시오.'); document.fwrite.".$fvs."[0].focus(); return false ;   }
						";
					}

				} break;

				case '5': //긴분장
					if($csconfig[$fvs]!='0'){
					if($csconfig[$fvs]=='2') { $mdatas[$fvs][iname] .= "<strong class=\"sound_only\">필수</strong>"; $mdatas[$fvs]['class']=" required";}
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>';
					if($mdatas[$fvs][editor]=='1'){
						echo editor_html($fvs, get_text($data[$fvs], 0));
					}else{
						echo '<textarea name="'.$fvs.'" id="'.$fvs.'"'.$mdatas[$fvs]['class'].' class="frm_input'.$mdatas[$fvs]['class'].'" style="width:100%" placeholder="'.$mdatas[$fvs][bigo].'">'.$data[$fvs].'</textarea>';
					}
					echo '</td>
					</tr>';

					if($mdatas[$fvs][editor]=='1') $javastr .= get_editor_js($fvs);

				} break;

				case '21': //주소
					if($csconfig[$fvs]!='0'){
					if($csconfig[$fvs]=='2') { $mdatas[$fvs][iname] .= "<strong class=\"sound_only\">필수</strong>"; $mdatas[$fvs]['class']=" required";}
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>
						<label for="zip" class="sound_only">우편번호</label>
						<input type="text" name="zip" value="'.$data[zip].'" id="zip"'.$mdatas[$fvs]['class'].' class="frm_input'.$mdatas[$fvs]['class'].'" size="5" maxlength="6">
						<button type="button" class="btn_frmline" onclick="win_zip(\'fwrite\', \'zip\', \'addre1\', \'addre2\', \'addre3\', \'addr_jibeon\');">주소 검색</button><br>
						<input type="text" name="addre1" value="'.$data[addre1].'" id="addre1"'.$mdatas[$fvs]['class'].' class="frm_input frm_address'.$mdatas[$fvs]['class'].'" size="'.$mdatas[$fvs][size].'">
						<label for="addre1">기본주소</label><br>
						<input type="text" name="addre2" value="'.$data[addre2].'" id="addre2"'.$mdatas[$fvs]['class'].' class="frm_input frm_address" size="'.$mdatas[$fvs][size].'">
						<label for="addre2">상세주소</label>
						<br>
						<input type="text" name="addre3" value="'.$data[addre3].'" id="addre3"'.$mdatas[$fvs]['class'].' class="frm_input frm_address" size="'.$mdatas[$fvs][size].'" readonly="readonly">
						<label for="addre3">참고항목</label>
						<input type="hidden" name="addr_jibeon" value="'.$data[addr_jibeon].'">
						'.$mdatas[$fvs][bigo].'</td>
					</tr>';
				} break;

				case '22': //직장주소
					if($csconfig[$fvs]!='0'){
					if($csconfig[$fvs]=='2') { $mdatas[$fvs][iname] .= "<strong class=\"sound_only\">필수</strong>"; $mdatas[$fvs]['class']=" required";}
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>
						<label for="ozip" class="sound_only">우편번호</label>
						<input type="text" name="ozip" value="'.$data[ozip].'" id="ozip"'.$mdatas[$fvs]['class'].' class="frm_input'.$mdatas[$fvs]['class'].'" size="5" maxlength="6">
						<button type="button" class="btn_frmline" onclick="win_zip(\'fwrite\', \'ozip\', \'oaddre1\', \'oaddre2\', \'oaddre3\', \'oaddr_jibeon\');">주소 검색</button><br>
						<input type="text" name="oaddre1" value="'.$data[oaddre1].'" id="oaddre1"'.$mdatas[$fvs]['class'].' class="frm_input frm_address'.$mdatas[$fvs]['class'].'" size="'.$mdatas[$fvs][size].'">
						<label for="oaddre1">기본주소</label><br>
						<input type="text" name="oaddre2" value="'.$data[oaddre2].'" id="oaddre2"'.$mdatas[$fvs]['class'].' class="frm_input frm_address" size="'.$mdatas[$fvs][size].'">
						<label for="oaddre2">상세주소</label>
						<br>
						<input type="text" name="oaddre3" value="'.$data[oaddre3].'" id="oaddre3"'.$mdatas[$fvs]['class'].' class="frm_input frm_address" size="'.$mdatas[$fvs][size].'" readonly="readonly">
						<label for="oaddre3">참고항목</label>
						<input type="hidden" name="oaddr_jibeon" value="'.$data[oaddr_jibeon].'">
						'.$mdatas[$fvs][bigo].'</td>
					</tr>';
				} break;

				case '31': // 전화번호
					if($csconfig[$fvs]!='0'){
					if($csconfig[$fvs]=='2') { $mdatas[$fvs][iname] .= "<strong class=\"sound_only\">필수</strong>"; $mdatas[$fvs]['class']=" required";}
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td><input type="text" name="'.$fvs.'1" value="'.$data[tel1].'" id="'.$fvs.'1"'.$mdatas[$fvs]['class'].' class="frm_input'.$mdatas[$fvs]['class'].'" size="'.$mdatas[$fvs][size].'" maxlength="3"> - <input type="text" name="'.$fvs.'2" value="'.$data[tel2].'" id="'.$fvs.'2"'.$mdatas[$fvs]['class'].' class="frm_input'.$mdatas[$fvs]['class'].'" size="'.$mdatas[$fvs][size].'" maxlength="4"> - <input type="text" name="'.$fvs.'3" value="'.$data[tel3].'" id="'.$fvs.'3"'.$mdatas[$fvs]['class'].' class="frm_input'.$mdatas[$fvs]['class'].'" size="'.$mdatas[$fvs][size].'" maxlength="4"> '.$mdatas[$fvs][bigo].'</td>
					</tr>';
				} break;

				case '32': // 직장전화번호
					if($csconfig[$fvs]!='0'){
					if($csconfig[$fvs]=='2') { $mdatas[$fvs][iname] .= "<strong class=\"sound_only\">필수</strong>"; $mdatas[$fvs]['class']=" required";}
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td><input type="text" name="'.$fvs.'1" value="'.$data[otel1].'" id="'.$fvs.'1"'.$mdatas[$fvs]['class'].' class="frm_input'.$mdatas[$fvs]['class'].'" size="'.$mdatas[$fvs][size].'" maxlength="3"> - <input type="text" name="'.$fvs.'2" value="'.$data[otel2].'" id="'.$fvs.'2"'.$mdatas[$fvs]['class'].' class="frm_input'.$mdatas[$fvs]['class'].'" size="'.$mdatas[$fvs][size].'" maxlength="4"> - <input type="text" name="'.$fvs.'3" value="'.$data[otel3].'" id="'.$fvs.'3"'.$mdatas[$fvs]['class'].' class="frm_input'.$mdatas[$fvs]['class'].'" size="'.$mdatas[$fvs][size].'" maxlength="4"> '.$mdatas[$fvs][bigo].'</td>
					</tr>';
				} break;

				case '33': // 휴대폰번호
					if($csconfig[$fvs]!='0'){
					if($csconfig[$fvs]=='2') { $mdatas[$fvs][iname] .= "<strong class=\"sound_only\">필수</strong>"; $mdatas[$fvs]['class']=" required";}
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td><input type="text" name="'.$fvs.'1" value="'.$data[hphone1].'" id="'.$fvs.'1"'.$mdatas[$fvs]['class'].' class="frm_input'.$mdatas[$fvs]['class'].'" size="'.$mdatas[$fvs][size].'" maxlength="3"> - <input type="text" name="'.$fvs.'2" value="'.$data[hphone2].'" id="'.$fvs.'2"'.$mdatas[$fvs]['class'].' class="frm_input'.$mdatas[$fvs]['class'].'" size="'.$mdatas[$fvs][size].'" maxlength="4"> - <input type="text" name="'.$fvs.'3" value="'.$data[hphone3].'" id="'.$fvs.'3"'.$mdatas[$fvs]['class'].' class="frm_input'.$mdatas[$fvs]['class'].'" size="'.$mdatas[$fvs][size].'" maxlength="4"> '.$mdatas[$fvs][bigo].'</td>
					</tr>';
				} break;

				case '41': //생년월일
					if($csconfig[$fvs]!='0'){
					if($csconfig[$fvs]=='2') { $mdatas[$fvs][iname] .= "<strong class=\"sound_only\">필수</strong>"; $mdatas[$fvs]['class']=" required";}

					$ss=0;for($yy=1900; $yy<=2013; $yy++){$Ayears[$ss]=$yy; $ss++;}
					$ss=0;for($yy=1; $yy<=12; $yy++){$Amonths[$ss]=$yy; $ss++;}
					$ss=0;for($yy=1; $yy<=31; $yy++){$Adays[$ss]=$yy; $ss++;}

					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>'.single_selectbox("year",$Ayears,$Ayears,$data[year],$mdatas[$fvs]['class'],0).'년 '.single_selectbox("month",$Amonths,$Amonths,$data[month],$mdatas[$fvs]['class'],0).'월 '.single_selectbox("day",$Adays,$Adays,$data[day],$mdatas[$fvs]['class'],0).'일 '.$mdatas[$fvs][bigo].'</td>
					</tr>';
				} break;

				case '50'://추천인
					if($csconfig[$fvs]!='0'){
					if($csconfig[$fvs]=='2') { $mdatas[$fvs][iname] .= "<strong class=\"sound_only\">필수</strong>"; $mdatas[$fvs]['class']=" required";}
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td><input type="text" name="'.$fvs.'" value="'.$data[$fvs].'" id="'.$fvs.'"'.$mdatas[$fvs]['class'].' class="frm_input'.$mdatas[$fvs]['class'].'" size="'.$mdatas[$fvs][size].'" placeholder="'.$mdatas[$fvs][bigo].'"></td>
					</tr>';
				} break;

				case '60': //메일수신여부
					if($csconfig[$fvs]!='0'){
					if($csconfig[$fvs]=='2') { $mdatas[$fvs][iname] .= "<strong class=\"sound_only\">필수</strong>"; $mdatas[$fvs]['class']=" required";}
					if($data[$fvs]=='1'){ $emailcheck='checked'; }

					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td><input type="checkbox" name="'.$fvs.'" value="1" id="'.$fvs.'"'.$mdatas[$fvs]['class'].' '.$emailcheck.' class="frm_input'.$mdatas[$fvs]['class'].'"> '.$mdatas[$fvs][bigo].'</td>
					</tr>';
				} break;

				case '70': //성별
					if($csconfig[$fvs]!='0'){

					if($data[$fvs]=='남' || !$data[$fvs]){ $mancheck='checked'; }else{ $womancheck='checked'; }

					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td><input type="radio" name="'.$fvs.'" value="남" id="man_'.$fvs.'" '.$mancheck.' class="frm_input"> 남
						<input type="radio" name="'.$fvs.'" value="여" id="woman_'.$fvs.'" '.$womancheck.' class="frm_input"> 여
						</td>
					</tr>';
				} break;

				case '80': //사업자번호
					if($csconfig[$fvs]!='0'){
					if($csconfig[$fvs]=='2') { $mdatas[$fvs][iname] .= "<strong class=\"sound_only\">필수</strong>"; $mdatas[$fvs]['class']=" required";}
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td><input type="text" name="'.$fvs.'" value="'.$data[$fvs].'" id="'.$fvs.'"'.$mdatas[$fvs]['class'].' class="frm_input'.$mdatas[$fvs]['class'].'" size="'.$mdatas[$fvs][size].'" placeholder="'.$mdatas[$fvs][bigo].'"></td>
					</tr>';
				} break;

			}// end switch
			unset($needstr);
	}
	?>
    <tr>
        <th scope="row">내용</th>
        <td><?php echo editor_html('wr_content', get_text($write['wr_content'], 0)); ?></td>
    </tr>
    <tr>
        <th scope="row">처리</th>
        <td>
            <input type="radio" name="wr_14" value="1" id="is_score_yes" <?php echo $is_score_yes; ?>>
            <label for="is_score_yes">완료</label>
            <input type="radio" name="wr_14" value="0" id="is_score_no" <?php echo $is_score_no; ?>>
            <label for="is_score_no">접수</label>
        </td>
    </tr>
    </tbody>
    </table>
</div>

<div class="btn_confirm01 btn_confirm">
    <input type="submit" value="확인" class="btn_submit" accesskey="s">
    <a href="./counsel_list.php?<?php echo $qstr; ?>">목록</a>
</div>
</form>

<script>
function counsel_submit(f)
{
	<?=$javastr?>

    <?php echo get_editor_js('wr_content'); ?>

    return true;
}
</script>

<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');
?>
