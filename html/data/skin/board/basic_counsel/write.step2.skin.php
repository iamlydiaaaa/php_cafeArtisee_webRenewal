<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PLUGIN_PATH.'/counsel/config.php');
include_once(G5_PLUGIN_PATH.'/counsel/function.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

if(!$w && $csconfig['agree']){
    if (!isset($_POST['agree']) || !$_POST['agree']) {
        alert('온라인상담약관의 내용에 동의하셔야 상담을 하실 수 있습니다.', G5_BBS_URL.'/write.php?bo_table='.$bo_table);
    }
    $agree  = preg_replace('#[^0-9]#', '', $_POST['agree']);
}


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

<section id="bo_w">
    <h2 id="container_title"><?php echo $g5['title'] ?></h2>

    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
    <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) {
        $option = '';
        if ($is_notice) {
            $option .= "\n".'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'<label for="notice">공지</label>';
        }

        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= "\n".'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'<label for="html">html</label>';
            }
        }

        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= "\n".'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'."\n".'<label for="secret">비밀글</label>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }

        if ($is_mail) {
            $option .= "\n".'<input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'."\n".'<label for="mail">답변메일받기</label>';
        }
    }

    echo $option_hidden;
    ?>

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <tbody>
        <?php if ($is_name) { ?>
        <tr>
            <th scope="row"><label for="wr_name">이름<strong class="sound_only">필수</strong></label></th>
            <td><input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="frm_input required" size="10" maxlength="20"></td>
        </tr>
        <?php } ?>

        <?php if ($is_password) { ?>
        <tr>
            <th scope="row"><label for="wr_password">비밀번호<strong class="sound_only">필수</strong></label></th>
            <td><input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="frm_input <?php echo $password_required ?>" maxlength="20"></td>
        </tr>
        <?php } ?>

        <?php if ($is_email) { ?>
        <tr>
            <th scope="row"><label for="wr_email">이메일</label></th>
            <td><input type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="frm_input email" size="50" maxlength="100"></td>
        </tr>
        <?php } ?>

        <?php if ($is_homepage) { ?>
        <tr>
            <th scope="row"><label for="wr_homepage">홈페이지</label></th>
            <td><input type="text" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" class="frm_input" size="50"></td>
        </tr>
        <?php } ?>

        <?php if ($option) { ?>
        <tr>
            <th scope="row">옵션</th>
            <td><?php echo $option ?></td>
        </tr>
        <?php } ?>

        <?php if ($is_category) { ?>
        <tr>
            <th scope="row"><label for="ca_name">분류<strong class="sound_only">필수</strong></label></th>
            <td>
                <select name="ca_name" id="ca_name" required class="required" >
                    <option value="">선택하세요</option>
                    <?php echo $category_option ?>
                </select>
            </td>
        </tr>
        <?php } ?>


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
            <th scope="row"><label for="wr_subject">상담제목<strong class="sound_only">필수</strong></label></th>
            <td>
                <div id="autosave_wrapper">
                    <input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="frm_input required" size="50" maxlength="255">
                    <?php if ($is_member) { // 임시 저장된 글 기능 ?>
                    <script src="<?php echo G5_JS_URL; ?>/autosave.js"></script>
                    <?php if($editor_content_js) echo $editor_content_js; ?>
                    <button type="button" id="btn_autosave" class="btn_frmline">임시 저장된 글 (<span id="autosave_count"><?php echo $autosave_count; ?></span>)</button>
                    <div id="autosave_pop">
                        <strong>임시 저장된 글 목록</strong>
                        <div><button type="button" class="autosave_close"><img src="<?php echo $board_skin_url; ?>/img/btn_close.gif" alt="닫기"></button></div>
                        <ul></ul>
                        <div><button type="button" class="autosave_close"><img src="<?php echo $board_skin_url; ?>/img/btn_close.gif" alt="닫기"></button></div>
                    </div>
                    <?php } ?>
                </div>
            </td>
        </tr>

        <tr>
            <th scope="row"><label for="wr_content">문의내용<strong class="sound_only">필수</strong></label></th>
            <td class="wr_content">
                <?php if($write_min || $write_max) { ?>
                <!-- 최소/최대 글자 수 사용 시 -->
                <p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
                <?php } ?>
                <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
                <?php if($write_min || $write_max) { ?>
                <!-- 최소/최대 글자 수 사용 시 -->
                <div id="char_count_wrap"><span id="char_count"></span>글자</div>
                <?php } ?>
            </td>
        </tr>

        <?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
        <tr>
            <th scope="row"><label for="wr_link<?php echo $i ?>">링크 #<?php echo $i ?></label></th>
            <td><input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo$write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="frm_input" size="50"></td>
        </tr>
        <?php } ?>

        <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
        <tr>
            <th scope="row">파일 #<?php echo $i+1 ?></th>
            <td>
                <input type="file" name="bf_file[]" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file frm_input">
                <?php if ($is_file_content) { ?>
                <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="frm_file frm_input" size="50">
                <?php } ?>
                <?php if($w == 'u' && $file[$i]['file']) { ?>
                <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>

        <?php if ($is_guest) { //자동등록방지  ?>
        <tr>
            <th scope="row">자동등록방지</th>
            <td>
                <?php echo $captcha_html ?>
            </td>
        </tr>
        <?php } ?>

        </tbody>
        </table>
    </div>

    <div class="btn_confirm">
        <input type="submit" value="작성완료" id="btn_submit" accesskey="s" class="btn_submit">
        <a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn_cancel">취소</a>
    </div>
    </form>

    <script>
    <?php if($write_min || $write_max) { ?>
    // 글자수 제한
    var char_min = parseInt(<?php echo $write_min; ?>); // 최소
    var char_max = parseInt(<?php echo $write_max; ?>); // 최대
    check_byte("wr_content", "char_count");

    $(function() {
        $("#wr_content").on("keyup", function() {
            check_byte("wr_content", "char_count");
        });
    });

    <?php } ?>
    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }

    function fwrite_submit(f)
    {
		<?=$javastr?>

        <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
                "content": f.wr_content.value
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content;
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }

        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }

        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    </script>
</section>
<!-- } 게시물 작성/수정 끝 -->