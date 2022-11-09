<?php
$sub_menu = '790100';
include_once('./_common.php');
include_once(G5_PLUGIN_PATH.'/counsel/config.php');

check_demo();

auth_check($auth[$sub_menu], "w");

if ($is_admin != 'super')
    alert('최고관리자만 접근 가능합니다.');

$bbs_row = sql_fetch(" select * from {$g5['board_table']} where bo_table='".$_POST['bo_table']."' ");
$step_file = G5_PATH.'/skin/board/'.$bbs_row['bo_skin'].'/write.step1.skin.php';
if (!file_exists($step_file)) {

	alert('온라인상담성격에 맞지 않는 게시판입니다.');

}else{

	$counsel_table = $g5['write_prefix'] . $_POST['bo_table'];
	if (!$csconfig['add_change']) {
		sql_query(" ALTER TABLE `{$counsel_table}` CHANGE `wr_1` `wr_1` TEXT NOT NULL ", true);
		sql_query(" ALTER TABLE `{$counsel_table}` CHANGE `wr_2` `wr_2` TEXT NOT NULL ", true);
		sql_query(" ALTER TABLE `{$counsel_table}` CHANGE `wr_3` `wr_3` TEXT NOT NULL ", true);
		sql_query(" ALTER TABLE `{$counsel_table}` CHANGE `wr_4` `wr_4` TEXT NOT NULL ", true);
		sql_query(" ALTER TABLE `{$counsel_table}` CHANGE `wr_5` `wr_5` TEXT NOT NULL ", true);
		sql_query(" ALTER TABLE `{$counsel_table}` CHANGE `wr_6` `wr_6` TEXT NOT NULL ", true);
		sql_query(" ALTER TABLE `{$counsel_table}` CHANGE `wr_7` `wr_7` TEXT NOT NULL ", true);
		sql_query(" ALTER TABLE `{$counsel_table}` CHANGE `wr_8` `wr_8` TEXT NOT NULL ", true);
		sql_query(" ALTER TABLE `{$counsel_table}` CHANGE `wr_9` `wr_9` TEXT NOT NULL ", true);
		sql_query(" ALTER TABLE `{$counsel_table}` CHANGE `wr_10` `wr_10` TEXT NOT NULL ", true);

		sql_query(" ALTER TABLE `{$counsel_table}` ADD `wr_11` TEXT NOT NULL AFTER `wr_10` ", true);
		sql_query(" ALTER TABLE `{$counsel_table}` ADD `wr_12` TEXT NOT NULL AFTER `wr_11` ", true);
		sql_query(" ALTER TABLE `{$counsel_table}` ADD `wr_13` TEXT NOT NULL AFTER `wr_12` ", true);
		sql_query(" ALTER TABLE `{$counsel_table}` ADD `wr_14` char(1) NOT NULL DEFAULT '0' AFTER `wr_13` ", true);

		sql_query(" update {$g5['counsel_table']} set add_change = '1' where num = '1' ");
	}
}

check_token();

$sql = " Update {$g5['counsel_table']}
			set bo_table	=	'{$_POST['bo_table']}',
				agree		=	'{$_POST['agree']}',
				agree_info	=	'{$_POST['agree_info']}',
				gourl		=	'{$_POST['gourl']}',
				sex			=	'{$_POST['Nsex']}',
				addre		=	'{$_POST['Naddre']}',
				tel			=	'{$_POST['Ntel1']}',
				oaddre		=	'{$_POST['Noaddre']}',
				otel		=	'{$_POST['Notel1']}',
				hphone		=	'{$_POST['Nhphone1']}',
				ename		=	'{$_POST['Nename']}',
				birth		=	'{$_POST['Nbirth']}',
				merry		=	'{$_POST['Nmerry']}',
				grade		=	'{$_POST['Ngrade']}',
				bizno		=	'{$_POST['Nbizno']}',
				job			=	'{$_POST['Njob']}',
				duty		=	'{$_POST['Nduty']}',
				likes		=	'{$_POST['Nlikes']}',
				rcid		=	'{$_POST['Nrcid']}',
				emailok		=	'{$_POST['Nemailok']}',
				input1		=	'{$_POST['Ninput1']}',
				input2		=	'{$_POST['Ninput2']}',
				input3		=	'{$_POST['Ninput3']}',
				input4		=	'{$_POST['Ninput4']}',
				input5		=	'{$_POST['Ninput5']}',
				input6		=	'{$_POST['Ninput6']}',
				select1		=	'{$_POST['Nselect1']}',
				select2		=	'{$_POST['Nselect2']}',
				select3		=	'{$_POST['Nselect3']}',
				select4		=	'{$_POST['Nselect4']}',
				select5		=	'{$_POST['Nselect5']}',
				select6		=	'{$_POST['Nselect6']}',
				radio1		=	'{$_POST['Nradio1']}',
				radio2		=	'{$_POST['Nradio2']}',
				radio3		=	'{$_POST['Nradio3']}',
				radio4		=	'{$_POST['Nradio4']}',
				radio5		=	'{$_POST['Nradio5']}',
				radio6		=	'{$_POST['Nradio6']}',
				check1		=	'{$_POST['Ncheck1']}',
				check2		=	'{$_POST['Ncheck2']}',
				check3		=	'{$_POST['Ncheck3']}',
				check4		=	'{$_POST['Ncheck4']}',
				check5		=	'{$_POST['Ncheck5']}',
				check6		=	'{$_POST['Ncheck6']}',
				txt1		=	'{$_POST['Ntxt1']}',
				txt2		=	'{$_POST['Ntxt2']}',
				txt3		=	'{$_POST['Ntxt3']}',
				txt4		=	'{$_POST['Ntxt4']}'
				$sql_common
			";
sql_query($sql);

goto_url('./counsel_config.php', false);

?>
