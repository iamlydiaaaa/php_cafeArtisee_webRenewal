<?php
$sub_menu = '790100';
include_once('./_common.php');
include_once(G5_PLUGIN_PATH.'/counsel/config.php');
include_once(G5_PLUGIN_PATH.'/counsel/function.lib.php');

auth_check($auth[$sub_menu], "w");

$db_reload = false;

if(!sql_query(" DESCRIBE {$g5['counsel_table']} ", false)) {
    sql_query(" CREATE TABLE IF NOT EXISTS `{$g5['counsel_table']}` (
		`num` int(11) NOT NULL AUTO_INCREMENT,
		`add_change` char(1) NOT NULL DEFAULT '0',
		`bo_table` varchar(20) NOT NULL DEFAULT '',
		`agree` char(1) NOT NULL DEFAULT '0',
		`agree_info` TEXT NOT NULL,
		`gourl` varchar(255) NOT NULL DEFAULT '',
		`sex` char(1) NOT NULL DEFAULT '2',
		`addre` char(1) NOT NULL DEFAULT '2',
		`tel` char(1) NOT NULL DEFAULT '2',
		`oaddre` char(1) NOT NULL DEFAULT '1',
		`otel` char(1) NOT NULL DEFAULT '1',
		`hphone` char(1) NOT NULL DEFAULT '1',
		`ename` char(1) NOT NULL DEFAULT '1',
		`birth` char(1) NOT NULL DEFAULT '1',
		`merry` char(1) NOT NULL DEFAULT '1',
		`grade` char(1) NOT NULL DEFAULT '1',
		`bizno` char(1) NOT NULL DEFAULT '1',
		`job` char(1) NOT NULL DEFAULT '1',
		`duty` char(1) NOT NULL DEFAULT '1',
		`likes` char(1) NOT NULL DEFAULT '1',
		`emailok` char(1) NOT NULL DEFAULT '1',
		`rcid` char(1) NOT NULL DEFAULT '1',
		`input1` char(1) NOT NULL DEFAULT '0',
		`input2` char(1) NOT NULL DEFAULT '0',
		`input3` char(1) NOT NULL DEFAULT '0',
		`input4` char(1) NOT NULL DEFAULT '0',
		`input5` char(1) NOT NULL DEFAULT '0',
		`input6` char(1) NOT NULL DEFAULT '0',
		`select1` char(1) NOT NULL DEFAULT '0',
		`select2` char(1) NOT NULL DEFAULT '0',
		`select3` char(1) NOT NULL DEFAULT '0',
		`select4` char(1) NOT NULL DEFAULT '0',
		`select5` char(1) NOT NULL DEFAULT '0',
		`select6` char(1) NOT NULL DEFAULT '0',
		`radio1` char(1) NOT NULL DEFAULT '0',
		`radio2` char(1) NOT NULL DEFAULT '0',
		`radio3` char(1) NOT NULL DEFAULT '0',
		`radio4` char(1) NOT NULL DEFAULT '0',
		`radio5` char(1) NOT NULL DEFAULT '0',
		`radio6` char(1) NOT NULL DEFAULT '0',
		`check1` char(1) NOT NULL DEFAULT '0',
		`check2` char(1) NOT NULL DEFAULT '0',
		`check3` char(1) NOT NULL DEFAULT '0',
		`check4` char(1) NOT NULL DEFAULT '0',
		`check5` char(1) NOT NULL DEFAULT '0',
		`check6` char(1) NOT NULL DEFAULT '0',
		`txt1` char(1) NOT NULL DEFAULT '0',
		`txt2` char(1) NOT NULL DEFAULT '0',
		`txt3` char(1) NOT NULL DEFAULT '0',
		`txt4` char(1) NOT NULL DEFAULT '0',
		PRIMARY KEY (`num`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8;", true);

    sql_query(" INSERT INTO {$g5['counsel_table']} VALUES (1, 0, '', '0', '해당 홈페이지에 맞는 온라인상담 이용약관을 입력합니다.', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0') ", true);
    $db_reload = true;
}

if(!sql_query(" DESCRIBE {$g5['counsel_item_table']} ", false)) {
    sql_query(" CREATE TABLE IF NOT EXISTS `{$g5['counsel_item_table']}` (
		`num` int(11) NOT NULL AUTO_INCREMENT,
		`mno` int(11) NOT NULL DEFAULT '0',
		`icode` varchar(10) NOT NULL,
		`iname` varchar(50) NOT NULL,
		`size` char(3) NOT NULL,
		`size2` char(3) NOT NULL,
		`editor` char(1) NOT NULL DEFAULT '0',
		`type` char(2) NOT NULL,
		`bigo` varchar(254) NOT NULL,
		`it1` varchar(50) NOT NULL,
		`it2` varchar(50) NOT NULL,
		`it3` varchar(50) NOT NULL,
		`it4` varchar(50) NOT NULL,
		`it5` varchar(50) NOT NULL,
		`it6` varchar(50) NOT NULL,
		`it7` varchar(50) NOT NULL,
		`it8` varchar(50) NOT NULL,
		`it9` varchar(50) NOT NULL,
		`it10` varchar(50) NOT NULL,
		`it11` varchar(50) NOT NULL,
		`it12` varchar(50) NOT NULL,
		`it13` varchar(50) NOT NULL,
		`it14` varchar(50) NOT NULL,
		`it15` varchar(50) NOT NULL,
		`it16` varchar(50) NOT NULL,
		`it17` varchar(50) NOT NULL,
		`it18` varchar(50) NOT NULL,
		`it19` varchar(50) NOT NULL,
		`it20` varchar(50) NOT NULL,
		`it21` varchar(50) NOT NULL,
		`it22` varchar(50) NOT NULL,
		`it23` varchar(50) NOT NULL,
		`it24` varchar(50) NOT NULL,
		`it25` varchar(50) NOT NULL,
		`it26` varchar(50) NOT NULL,
		`it27` varchar(50) NOT NULL,
		`it28` varchar(50) NOT NULL,
		`it29` varchar(50) NOT NULL,
		`it30` varchar(50) NOT NULL,
		PRIMARY KEY (`num`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8;", true);

    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 1, mno = 1, icode = 'sex', iname = '성별', size = '', type = '70' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 2, mno = 2, icode = 'addre', iname = '주소', size = '50', type = '21' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 3, mno = 3, icode = 'tel', iname = '전화번호', size = '5', type = '31' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 4, mno = 4, icode = 'oaddre', iname = '직장주소', size = '50', type = '22' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 5, mno = 5, icode = 'otel', iname = '직장전화번호', size = '5', type = '32' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 6, mno = 6, icode = 'hphone', iname = '휴대폰번호', size = '5', type = '33' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 7, mno = 7, icode = 'rcid', iname = '추천인', size = '30', type = '50' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 8, mno = 8, icode = 'ename', iname = '영문이름', size = '30', type = '0' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 9, mno = 9, icode = 'birth', iname = '생년월일', size = '', type = '41' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 10, mno = 10, icode = 'merry', iname = '결혼여부', size = '10', type = '3', it1 = '미혼', it2 = '기혼' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 11, mno = 11, icode = 'grade', iname = '최종학력', size = '', type = '1', it1 = '초등학교', it2 = '중학교', it3 = '고등학교', it4 = '대학교' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 12, mno = 12, icode = 'bizno', iname = '사업자번호', size = '40', type = '80' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 13, mno = 13, icode = 'job', iname = '직업', size = '', type = '1', bigo = '직업종류를 선택하세요.', it1 = '정치,행정', it2 = '법률', it3 = '보건,의료', it4 = '종교', it5 = '사회,복지', it6 = '문화예술,스포츠', it7 = '경제,금융', it8 = '연구,기술', it9 = '교육', it10 = '사무,관리', it11 = '판매,서비스', it12 = '기계,기능', it13 = '기타' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 14, mno = 14, icode = 'duty', iname = '직종', size = '', type = '1', bigo = '직종분류를 선택하세요.', it1 = '의회의원,고위임직원 및 관리자', it2 = '전문가', it3 = '기술공 및 중전문가', it4 = '사무종사자', it5 = '서비스 종사자', it6 = '판매 종사자', it7 = '농업,임업 및 어업 숙련근로자', it8 = '기능원 및 관련 기능 종사자', it9 = '장치,기계도장 및 조립 종사자', it10 = '단순노무 종사자', it11 = '군인' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 15, mno = 15, icode = 'likes', iname = '관심영역', size = '', type = '1', bigo = '관심영역을 선택하세요.', it1 = '센터방문상담신청', it2 = '전화상담신청', it3 = '세미나참석신청', it4 = '기타상담신청' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 16, mno = 16, icode = 'emailok', iname = '메일수신여부', size = '', type = '60', bigo = '정보 메일을 받겠습니다.' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 17, mno = 17, icode = 'input1', iname = '입력형1', size = '30', type = '2' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 18, mno = 18, icode = 'input2', iname = '입력형2', size = '30', type = '2' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 19, mno = 19, icode = 'input3', iname = '입력형3', size = '30', type = '2' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 20, mno = 20, icode = 'input4', iname = '입력형4', size = '30', type = '2' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 21, mno = 21, icode = 'input5', iname = '입력형5', size = '30', type = '2' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 22, mno = 22, icode = 'input6', iname = '입력형6', size = '30', type = '2' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 23, mno = 23, icode = 'select1', iname = '선택형1', type = '1', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 24, mno = 24, icode = 'select2', iname = '선택형2', type = '1', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 25, mno = 25, icode = 'select3', iname = '선택형3', type = '1', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 26, mno = 26, icode = 'select4', iname = '선택형4', type = '1', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 27, mno = 27, icode = 'select5', iname = '선택형5', type = '1', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 28, mno = 28, icode = 'select6', iname = '선택형6', type = '1', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 29, mno = 29, icode = 'radio1', iname = '라디오1', size = '10', type = '3', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 30, mno = 30, icode = 'radio2', iname = '라디오2', size = '10', type = '3', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 31, mno = 31, icode = 'radio3', iname = '라디오3', size = '10', type = '3', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 32, mno = 32, icode = 'radio4', iname = '라디오4', size = '10', type = '3', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 33, mno = 33, icode = 'radio5', iname = '라디오5', size = '10', type = '3', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", true);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 34, mno = 34, icode = 'radio6', iname = '라디오6', size = '10', type = '3', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 35, mno = 35, icode = 'check1', iname = '체크박스1', size = '10', type = '4', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 36, mno = 36, icode = 'check2', iname = '체크박스2', size = '10', type = '4', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 37, mno = 37, icode = 'check3', iname = '체크박스3', size = '10', type = '4', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 38, mno = 38, icode = 'check4', iname = '체크박스4', size = '10', type = '4', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 39, mno = 39, icode = 'check5', iname = '체크박스5', size = '10', type = '4', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", true);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 40, mno = 40, icode = 'check6', iname = '체크박스6', size = '10', type = '4', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 41, mno = 41, icode = 'txt1', iname = '긴문장1', size = '50', size2 = '5', type = '5' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 42, mno = 42, icode = 'txt2', iname = '긴문장2', size = '50', size2 = '5', type = '5' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 43, mno = 43, icode = 'txt3', iname = '긴문장3', size = '50', size2 = '5', type = '5' ", true);
    sql_query(" INSERT INTO {$g5['counsel_item_table']} SET num = 44, mno = 44, icode = 'txt4', iname = '긴문장4', size = '50', size2 = '5', type = '5' ", true);
    $db_reload = true;
}

if ($db_reload) {
    alert("DB를 갱신합니다.", G5_ADMIN_URL.'/counsel_config.php');
}

$g5['title'] = '환경설정';
include_once ('./admin.head.php');

$pg_anchor = '<ul class="anchor">
	<li><a href="#anc_cf_config">환경설정</a></li>
    <li><a href="#anc_cf_basic">기본형</a></li>
    <li><a href="#anc_cf_input">입력형</a></li>
    <li><a href="#anc_cf_select">선택형</a></li>
    <li><a href="#anc_cf_radio">라디오형</a></li>
    <li><a href="#anc_cf_check">체크박스형</a></li>
    <li><a href="#anc_cf_txt">긴문장형</a></li>
</ul>';

$frm_submit = '<div class="btn_confirm01 btn_confirm">
    <input type="submit" value="확인" class="btn_submit" accesskey="s">
    <a href="'.G5_URL.'/">메인으로</a>
</div>';

?>
<form name="frm" id="frm" action="./counsel_config_update.php" method="post">

<section id="anc_cf_config">
    <h2 class="h2_frm">홈페이지 기본환경 설정</h2>
    <?php echo $pg_anchor ?>

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <caption>홈페이지 기본환경 설정</caption>
        <colgroup>
            <col class="grid_4">
            <col>
            <col class="grid_4">
            <col>
        </colgroup>
        <tbody>
        <tr>
            <th scope="row"><label for="cf_bo_table">게시판명<strong class="sound_only">필수</strong></label></th>
            <td><?php echo get_board_id_select('bo_table', $csconfig['bo_table'], 'required') ?> <?=($csconfig['add_change'])?"DB갱신 완료!":"게시판명을 선택하셔야 DB갱신이 완료됩니다.";?></td>
        </tr>
		<?if($csconfig['bo_table']){?>
		<tr>
            <th scope="row"><label for="cf_agree">약관사용</label></th>
            <td>
                <input type="checkbox" name="agree" value="1" id="agree" <?php echo $csconfig['agree']?'checked':''; ?>> <label for="agree">보이기</label>
            </td>
        </tr>
		<tr>
			<th scope="row">약관내용</th>
			<td><textarea name="agree_info" id="agree_info" rows="10"><?php echo $csconfig['agree_info'] ?></textarea></td>
		</tr>
		<tr>
            <th scope="row"><label for="cf_gourl">리턴URL</label></th>
            <td>
			<?php echo help('온라인상담완료후 이동하는 URL을 입력합니다.(Default : ./write.php?bo_table='.$csconfig['bo_table'].')') ?>
			<input type="text" name="gourl" value="<?php echo $csconfig['gourl'] ?>" id="gourl" class="frm_input" size="40" placeholder="">
			</td>
        </tr>
		<?}?>
        </tbody>
        </table>
    </div>
</section>

<?php echo $frm_submit; ?>

<section id="anc_cf_basic">
    <h2 class="h2_frm">기본형 설정</h2>
    <?php echo $pg_anchor ?>

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <caption>기본형 설정</caption>
        <colgroup>
            <col class="grid_4">
            <col>
            <col class="grid_4">
            <col>
        </colgroup>
        <tbody>
        <tr>
            <th scope="row"><label for="cf_sex"><?=($sex[iname])?$sex[iname]:"성별";?></label></th>
            <td><?=single_selectbox('Nsex', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[sex], '' );?>
			<a href="./counsel_open.php?items=sex&inum=70&itemname=<?=$sex[iname];?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($sex[iname])?"수정":"등록";?></a></td>
            <th scope="row"><label for="cf_addre"><?=($addre[iname])?$addre[iname]:"주소";?></label></th>
            <td><?=single_selectbox('Naddre', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[addre], '' );?>
			<a href="./counsel_open.php?items=addre&inum=21&itemname=<?=$addre[iname];?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($addre[iname])?"수정":"등록";?></a></td>
        </tr>
		<tr>
            <th scope="row"><label for="cf_tel"><?=($tel[iname])?$tel[iname]:"전화번호";?></label></th>
            <td><?=single_selectbox('Ntel', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[tel], '' );?>
			<a href="./counsel_open.php?items=tel&inum=31&itemname=<?=$tel[iname];?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($tel[iname])?"수정":"등록";?></a></td>
            <th scope="row"><label for="cf_oaddre"><?=($oaddre[iname])?$oaddre[iname]:"직장주소";?></label></th>
            <td><?=single_selectbox('Noaddre', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[oaddre], '' );?>
			<a href="./counsel_open.php?items=oaddre&inum=22&itemname=<?=$oaddre[iname];?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($oaddre[iname])?"수정":"등록";?></a></td>
        </tr>
		<tr>
			<th scope="row"><label for="cf_otel"><?=($otel[iname])?$otel[iname]:"직장전화번호";?></label></th>
			<td><?=single_selectbox('Notel', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[otel], '' );?>
			<a href="./counsel_open.php?items=otel&inum=32&itemname=<?=$otel[iname];?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($otel[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_hphone"><?=($hphone[iname])?$hphone[iname]:"휴대폰번호";?></label></th>
			<td><?=single_selectbox('Nhphone', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[hphone], '' );?>
			<a href="./counsel_open.php?items=hphone&inum=33&itemname=<?=$hphone[iname];?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($hphone[iname])?"수정":"등록";?></a></td>
		</tr>
		<tr>
			<th scope="row"><label for="cf_rcid"><?=($rcid[iname])?$rcid[iname]:"추천인";?></label></th>
			<td><?=single_selectbox('Nrcid', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[rcid], '' );?>
			<a href="./counsel_open.php?items=rcid&inum=50&itemname=<?=$rcid[iname];?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($rcid[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_ename"><?=($ename[iname])?$ename[iname]:"영문이름";?></label></th>
			<td><?=single_selectbox('Nename', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[ename], '' );?>
			<a href="./counsel_open.php?items=ename&inum=0&itemname=<?=$ename[iname];?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($ename[iname])?"수정":"등록";?></a></td>
		</tr>
		<tr>
			<th scope="row"><label for="cf_birth"><?=($birth[iname])?$birth[iname]:"생년월일";?></label></th>
			<td><?=single_selectbox('Nbirth', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[birth], '' );?>
			<a href="./counsel_open.php?items=birth&inum=41&itemname=<?=$birth[iname];?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($birth[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_merry"><?=($merry[iname])?$merry[iname]:"결혼여부";?></label></th>
			<td><?=single_selectbox('Nmerry', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[merry], '' );?>
			<a href="./counsel_open.php?items=merry&inum=3&itemname=<?=$merry[iname];?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($merry[iname])?"수정":"등록";?></a></td>
		</tr>
		<tr>
			<th scope="row"><label for="cf_grade"><?=($grade[iname])?$grade[iname]:"최종학력";?></label></th>
			<td><?=single_selectbox('Ngrade', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[grade], '' );?>
			<a href="./counsel_open.php?items=grade&inum=1&itemname=<?=$grade[iname];?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($grade[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_bizno"><?=($bizno[iname])?$bizno[iname]:"사업자번호";?></label></th>
			<td><?=single_selectbox('Nbizno', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[bizno], '' );?>
			<a href="./counsel_open.php?items=bizno&inum=80&itemname=<?=$bizno[iname];?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($bizno[iname])?"수정":"등록";?></a></td>
		</tr>
		<tr>
			<th scope="row"><label for="cf_job"><?=($job[iname])?$job[iname]:"직업";?></label></th>
			<td><?=single_selectbox('Njob', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[job], '' );?>
			<a href="./counsel_open.php?items=job&inum=1&itemname=<?=$job[iname];?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($job[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_duty"><?=($duty[iname])?$duty[iname]:"직종";?></label></th>
			<td><?=single_selectbox('Nduty', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[duty], '' );?>
			<a href="./counsel_open.php?items=duty&inum=1&itemname=<?=$duty[iname];?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($duty[iname])?"수정":"등록";?></a></td>
		</tr>
		<tr>
			<th scope="row"><label for="cf_likes"><?=($likes[iname])?$likes[iname]:"관심영역";?></label></th>
			<td><?=single_selectbox('Nlikes', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[likes], '' );?>
			<a href="./counsel_open.php?items=likes&inum=1&itemname=<?=$likes[iname];?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($likes[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_emailok"><?=($emailok[iname])?$emailok[iname]:"메일수신여부";?></label></th>
			<td><?=single_selectbox('Nemailok', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[emailok], '' );?>
			<a href="./counsel_open.php?items=emailok&inum=60&itemname=<?=$emailok[iname];?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($emailok[iname])?"수정":"등록";?></a></td>
		</tr>
        </tbody>
        </table>
    </div>
</section>

<?php echo $frm_submit; ?>

<section id="anc_cf_input">
    <h2 class="h2_frm">입력형 설정</h2>
    <?php echo $pg_anchor ?>

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <caption>입력형 설정</caption>
        <colgroup>
            <col class="grid_4">
            <col>
            <col class="grid_4">
            <col>
        </colgroup>
        <tbody>
		<tr>
			<th scope="row"><label for="cf_input1"><?=($input1[iname])?$input1[iname]:"입력형 추가1";?></label></th>
			<td><?=single_selectbox('Ninput1', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[input1], '' );?>
			<a href="./counsel_open.php?items=input1&inum=2&itemname=<?=$input1[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($input1[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_input2"><?=($input2[iname])?$input2[iname]:"입력형 추가2";?></label></th>
			<td><?=single_selectbox('Ninput2', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[input2], '' );?>
			<a href="./counsel_open.php?items=input2&inum=2&itemname=<?=$input2[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($input2[iname])?"수정":"등록";?></a></td>
		</tr>
		<tr>
			<th scope="row"><label for="cf_input3"><?=($input3[iname])?$input3[iname]:"입력형 추가3";?></label></th>
			<td><?=single_selectbox('Ninput3', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[input3], '' );?>
			<a href="./counsel_open.php?items=input3&inum=2&itemname=<?=$input3[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($input3[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_input4"><?=($input4[iname])?$input4[iname]:"입력형 추가4";?></label></th>
			<td><?=single_selectbox('Ninput4', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[input4], '' );?>
			<a href="./counsel_open.php?items=input4&inum=2&itemname=<?=$input4[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($input4[iname])?"수정":"등록";?></a></td>
		</tr>
		<tr>
			<th scope="row"><label for="cf_input5"><?=($input5[iname])?$input5[iname]:"입력형 추가5";?></label></th>
			<td><?=single_selectbox('Ninput5', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[input5], '' );?>
			<a href="./counsel_open.php?items=input5&inum=2&itemname=<?=$input5[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($input5[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_input6"><?=($input6[iname])?$input6[iname]:"입력형 추가6";?></label></th>
			<td><?=single_selectbox('Ninput6', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[input6], '' );?>
			<a href="./counsel_open.php?items=input6&inum=2&itemname=<?=$input6[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($input6[iname])?"수정":"등록";?></a></td>
		</tr>

        </tbody>
        </table>
    </div>
</section>

<?php echo $frm_submit; ?>

<section id="anc_cf_select">
    <h2 class="h2_frm">선택형 설정</h2>
    <?php echo $pg_anchor ?>

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <caption>선택형 설정</caption>
        <colgroup>
            <col class="grid_4">
            <col>
            <col class="grid_4">
            <col>
        </colgroup>
        <tbody>
		<tr>
			<th scope="row"><label for="cf_select1"><?=($select1[iname])?$select1[iname]:"선택형 추가1";?></label></th>
			<td><?=single_selectbox('Nselect1', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[select1], '' );?>
			<a href="./counsel_open.php?items=select1&inum=1&itemname=<?=$select1[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($select1[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_select2"><?=($select2[iname])?$select2[iname]:"선택형 추가2";?></label></th>
			<td><?=single_selectbox('Nselect2', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[select2], '' );?>
			<a href="./counsel_open.php?items=select2&inum=1&itemname=<?=$select2[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($select2[iname])?"수정":"등록";?></a></td>
		</tr>
		<tr>
			<th scope="row"><label for="cf_select3"><?=($select3[iname])?$select3[iname]:"선택형 추가3";?></label></th>
			<td><?=single_selectbox('Nselect3', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[select3], '' );?>
			<a href="./counsel_open.php?items=select3&inum=1&itemname=<?=$select3[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($select3[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_select4"><?=($select4[iname])?$select4[iname]:"선택형 추가4";?></label></th>
			<td><?=single_selectbox('Nselect4', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[select4], '' );?>
			<a href="./counsel_open.php?items=select4&inum=1&itemname=<?=$select4[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($select4[iname])?"수정":"등록";?></a></td>
		</tr>
		<tr>
			<th scope="row"><label for="cf_select5"><?=($select5[iname])?$select5[iname]:"선택형 추가5";?></label></th>
			<td><?=single_selectbox('Nselect5', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[select5], '' );?>
			<a href="./counsel_open.php?items=select5&inum=1&itemname=<?=$select5[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($select5[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_select6"><?=($select6[iname])?$select6[iname]:"선택형 추가6";?></label></th>
			<td><?=single_selectbox('Nselect6', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[select6], '' );?>
			<a href="./counsel_open.php?items=select6&inum=1&itemname=<?=$select6[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($select6[iname])?"수정":"등록";?></a></td>
		</tr>
        </tbody>
        </table>
    </div>
</section>

<?php echo $frm_submit; ?>

<section id="anc_cf_radio">
    <h2 class="h2_frm">라디오형 설정</h2>
    <?php echo $pg_anchor ?>

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <caption>라디오형 설정</caption>
        <colgroup>
            <col class="grid_4">
            <col>
            <col class="grid_4">
            <col>
        </colgroup>
        <tbody>
		<tr>
			<th scope="row"><label for="cf_radio1"><?=($radio1[iname])?$radio1[iname]:"라디오 추가1";?></label></th>
			<td><?=single_selectbox('Nradio1', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[radio1], '' );?>
			<a href="./counsel_open.php?items=radio1&inum=3&itemname=<?=$radio1[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($radio1[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_radio2"><?=($radio2[iname])?$radio2[iname]:"라디오 추가2";?></label></th>
			<td><?=single_selectbox('Nradio2', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[radio2], '' );?>
			<a href="./counsel_open.php?items=radio2&inum=3&itemname=<?=$radio2[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($radio2[iname])?"수정":"등록";?></a></td>
		</tr>
		<tr>
			<th scope="row"><label for="cf_radio3"><?=($radio3[iname])?$radio3[iname]:"라디오 추가3";?></label></th>
			<td><?=single_selectbox('Nradio3', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[radio3], '' );?>
			<a href="./counsel_open.php?items=radio3&inum=3&itemname=<?=$radio3[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($radio3[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_radio4"><?=($radio4[iname])?$radio4[iname]:"라디오 추가4";?></label></th>
			<td><?=single_selectbox('Nradio4', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[radio4], '' );?>
			<a href="./counsel_open.php?items=radio4&inum=3&itemname=<?=$radio4[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($radio4[iname])?"수정":"등록";?></a></td>
		</tr>
		<tr>
			<th scope="row"><label for="cf_radio5"><?=($radio5[iname])?$radio5[iname]:"라디오 추가5";?></label></th>
			<td><?=single_selectbox('Nradio5', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[radio5], '' );?>
			<a href="./counsel_open.php?items=radio5&inum=3&itemname=<?=$radio5[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($radio5[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_radio6"><?=($radio6[iname])?$radio6[iname]:"라디오 추가6";?></label></th>
			<td><?=single_selectbox('Nradio6', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[radio6], '' );?>
			<a href="./counsel_open.php?items=radio6&inum=3&itemname=<?=$radio6[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($radio6[iname])?"수정":"등록";?></a></td>
		</tr>
        </tbody>
        </table>
    </div>
</section>

<?php echo $frm_submit; ?>

<section id="anc_cf_check">
    <h2 class="h2_frm">체크박스형 설정</h2>
    <?php echo $pg_anchor ?>

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <caption>체크박스형 설정</caption>
        <colgroup>
            <col class="grid_4">
            <col>
            <col class="grid_4">
            <col>
        </colgroup>
        <tbody>
		<tr>
			<th scope="row"><label for="cf_check1"><?=($check1[iname])?$check1[iname]:"체크박스 추가1";?></label></th>
			<td><?=single_selectbox('Ncheck1', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[check1], '' );?>
			<a href="./counsel_open.php?items=check1&inum=4&itemname=<?php echo $check1[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($check1[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_check2"><?=($check2[iname])?$check2[iname]:"체크박스 추가2";?></label></th>
			<td><?=single_selectbox('Ncheck2', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[check2], '' );?>
			<a href="./counsel_open.php?items=check2&inum=4&itemname=<?php echo $check2[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($check2[iname])?"수정":"등록";?></a></td>
		</tr>
		<tr>
			<th scope="row"><label for="cf_check3"><?=($check3[iname])?$check3[iname]:"체크박스 추가3";?></label></th>
			<td><?=single_selectbox('Ncheck3', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[check3], '' );?>
			<a href="./counsel_open.php?items=check3&inum=4&itemname=<?php echo $check3[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($check3[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_check4"><?=($check4[iname])?$check4[iname]:"체크박스 추가4";?></label></th>
			<td><?=single_selectbox('Ncheck4', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[check4], '' );?>
			<a href="./counsel_open.php?items=check4&inum=4&itemname=<?php echo $check4[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($check4[iname])?"수정":"등록";?></a></td>
		</tr>
		<tr>
			<th scope="row"><label for="cf_check5"><?=($check5[iname])?$check5[iname]:"체크박스 추가5";?></label></th>
			<td><?=single_selectbox('Ncheck5', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[check5], '' );?>
			<a href="./counsel_open.php?items=check5&inum=4&itemname=<?php echo $check5[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($check5[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_check6"><?=($check6[iname])?$check6[iname]:"체크박스 추가6";?></label></th>
			<td><?=single_selectbox('Ncheck6', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[check6], '' );?>
			<a href="./counsel_open.php?items=check6&inum=4&itemname=<?php echo $check6[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($check6[iname])?"수정":"등록";?></a></td>
		</tr>
        </tbody>
        </table>
    </div>
</section>

<?php echo $frm_submit; ?>

<section id="anc_cf_txt">
    <h2 class="h2_frm">긴문장형 설정</h2>
    <?php echo $pg_anchor ?>

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <caption>긴문장형 설정</caption>
        <colgroup>
            <col class="grid_4">
            <col>
            <col class="grid_4">
            <col>
        </colgroup>
        <tbody>
		<tr>
			<th scope="row"><label for="cf_txt1"><?=($txt1[iname])?$txt1[iname]:"긴문장 추가1";?></label></th>
			<td><?=single_selectbox('Ntxt1', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[txt1], '' );?>
			<a href="./counsel_open.php?items=txt1&inum=5&itemname=<?php echo $txt1[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($txt1[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_txt2"><?=($txt2[iname])?$txt2[iname]:"긴문장 추가2";?></label></th>
			<td><?=single_selectbox('Ntxt2', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[txt2], '' );?>
			<a href="./counsel_open.php?items=txt2&inum=5&itemname=<?php echo $txt2[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($txt2[iname])?"수정":"등록";?></a></td>
		</tr>
		<tr>
			<th scope="row"><label for="cf_txt3"><?=($txt3[iname])?$txt3[iname]:"긴문장 추가1";?></label></th>
			<td><?=single_selectbox('Ntxt3', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[txt3], '' );?>
			<a href="./counsel_open.php?items=txt3&inum=5&itemname=<?php echo $txt3[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($txt3[iname])?"수정":"등록";?></a></td>
			<th scope="row"><label for="cf_txt4"><?=($txt4[iname])?$txt4[iname]:"긴문장 추가1";?></label></th>
			<td><?=single_selectbox('Ntxt4', Array("선택항목","필수","사용안함"), Array("1","2","0"), $csconfig[txt4], '' );?>
			<a href="./counsel_open.php?items=txt4&inum=5&itemname=<?php echo $txt4[iname]; ?>" target="_blank" id="ol_after_memo" class="btn_frmline win_counsel"><?=($txt4[iname])?"수정":"등록";?></a></td>
		</tr>
        </tbody>
        </table>
    </div>
</section>

<?php echo $frm_submit; ?>

</form>


<script type="text/javascript">
<!--
	var win_counsel = function(href) {
		var new_win = window.open(href, 'win_counsel', 'left=100,top=100,width=500,height=600,scrollbars=1');
		new_win.focus();
	}

	$(function(){
		$(".win_counsel").click(function() {
			win_counsel(this.href);
			return false;
		});
	});


//-->
</script>


<?php
include_once ('./admin.tail.php');
?>