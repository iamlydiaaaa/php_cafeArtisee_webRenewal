<?
$sub_menu = '790100';
include_once('./_common.php');
include_once(G5_PLUGIN_PATH.'/counsel/config.php');
include_once(G5_PLUGIN_PATH.'/counsel/function.lib.php');

auth_check($auth[$sub_menu], "r");

if (!defined("_GNUBOARD_")) exit;

$g5['title'] = '항목 등록 및 수정';
include_once(G5_PATH.'/head.sub.php');

$item = sql_fetch(" select * from {$g5['counsel_item_table']} where icode='$items'");


if($mode=='100'){

	if($item[icode]){

		$sql  = "update {$g5['counsel_item_table']} set iname='$Niname',size='$Nsize',size2='$Nsize2',editor='$editor',type='$Ntype',bigo='$Nbigo', ";
		$sql .= "it1='$Nit1',it2='$Nit2',it3='$Nit3',it4='$Nit4',it5='$Nit5' ";
		$sql .= ",it6='$Nit6',it7='$Nit7',it8='$Nit8',it9='$Nit9',it10='$Nit10',it11='$Nit11',it12='$Nit12',it13='$Nit13',it14='$Nit14' ";
		$sql .= ",it15='$Nit15',it16='$Nit16',it17='$Nit17',it18='$Nit18',it19='$Nit19',it20='$Nit20',it21='$Nit21',it22='$Nit22',it23='$Nit23' ";
		$sql .= ",it24='$Nit24',it25='$Nit25',it26='$Nit26',it27='$Nit27',it28='$Nit28',it29='$Nit29',it30='$Nit30' ";
		$sql .= "where icode='$items' ";

	}else{

		$sql = " select max(num) as num from {$g5['counsel_item_table']}";
		$row = sql_fetch($sql);
		$Nmno = $row[num]+1;

		$sql="insert into {$g5['counsel_item_table']} set mno = $Nmno, icode = '$items', iname = '$Niname', size = '$Nsize', size2 = '$Nsize2', editor='$editor', type = '$Ntype', bigo = '$Nbigo', ";
		$sql .= "it1='$Nit1',it2='$Nit2',it3='$Nit3',it4='$Nit4',it5='$Nit5' ";
		$sql .= ",it6='$Nit6',it7='$Nit7',it8='$Nit8',it9='$Nit9',it10='$Nit10',it11='$Nit11',it12='$Nit12',it13='$Nit13',it14='$Nit14' ";
		$sql .= ",it15='$Nit15',it16='$Nit16',it17='$Nit17',it18='$Nit18',it19='$Nit19',it20='$Nit20',it21='$Nit21',it22='$Nit22',it23='$Nit23' ";
		$sql .= ",it24='$Nit24',it25='$Nit25',it26='$Nit26',it27='$Nit27',it28='$Nit28',it29='$Nit29',it30='$Nit30' ";
	}

	if(sql_query($sql)){
		echo "<script type='text/javascript'> location.href('counsel_open.php?inum=".$inum."&items=".$items."&itemname=".$itemname."'); opener.parent.location.reload(); </script>";
	}
	else{ alert('정보를 수정하는 데 문제가 발생했습니다. 다시 시도해 주세요.','counsel_open.php?inum='.$inum.'&items='. $items.'&itemname='.$itemname); }

}

?>
<div id="memo_list" class="new_win mbskin">
    <h1 id="win_title"><?php echo $g5['title'] ?></h1>
    <form name="smstitemsfrm"  method="post" action="counsel_open.php">
    <input type="hidden" name="mode" value="100">
    <input type="hidden" name="items" value="<?=$items?>">
    <input type="hidden" name="inum" value="<?=$inum?>">
    <input type="hidden" name="Ntype" value="<?=$inum?>">
    <input type="hidden" name="itemname" value="<?=$itemname?>">
    <div class="tbl_frm01 tbl_wrap">
        <table>
        <caption>기본환경 설정</caption>
        <colgroup>
            <col class="grid_4">
            <col>
            <col class="grid_4">
            <col>
        </colgroup>
        <tbody>
        <tr>
            <th scope="row"><label for="cf_Niname">항목이름</label></th>
            <td><input type="text" name="Niname" value="<?php echo $item[iname] ?>" id="cf_Niname" required class="required frm_input" size="40" placeholder="항목마다 표시되는 이름"></td>
        </tr>


		<?
		if($inum==0 || $inum==2 || $inum==10 || $inum==21 || $inum==22 || $inum==31 || $inum==32 || $inum==33 || $inum==50 || $inum==80){
			if(strlen($item[size])<1) $lalaSize = 30;
			else $lalaSize = $item[size];
		?>
		<tr>
            <th scope="row"><label for="cf_Nsize">INPUT BOX SIZE</label></th>
            <td><input type="text" name="Nsize" value="<?php echo $lalaSize ?>" id="cf_Nsize" class="frm_input" size="5" placeholder="입력박스의 크기로  30 정도가 적당합니다."></td>
        </tr>
		<?}?>


		<?
		if($inum==5){
			if(strlen($item[size])<1) {
				$lalaSize = 50; $lalaSize2 = 5;
			} else{
				$lalaSize = $item[size]; $lalaSize2 = $item[size2];
			}
		?>
		<tr>
			<th scope="row"><label for="editor">DHTML 에디터 사용</label></th>
			<td><input type="checkbox" name="editor" value="1" <?php echo $item[editor]?'checked':''; ?> id="editor"></td>
		</tr>
		<tr>
			<th scope="row"><label for="cf_Nsize">TextBox Columns</label></th>
			<td><input type="text" name="Nsize" value="<?php echo $lalaSize?>" id="cf_Nsize" class="frm_input" size="5" placeholder="텍스트박스의 가로크기"></td>
		</tr>
		<tr>
			<th scope="row"><label for="cf_Nsize2">TextBox Rows</label></th>
			<td><input type="text" name="Nsize2" value="<?php echo $lalaSize2?>" id="cf_Nsize2" class="frm_input" size="5" placeholder="텍스트박스의 세로크기"></td>
		</tr>
		<?}?>

		<?
		if($inum==3||$inum==4){
			if(strlen($item[size])<1) $lalaSize = 100;
			else $lalaSize = $item[size];
		?>
		<tr>
			<th scope="row"><label for="cf_Nsize">항목별 공간</label></th>
			<td><input type="text" name="Nsize" value="<?php echo $lalaSize?>" id="cf_Nsize" class="frm_input" size="5"></td>
		</tr>
		<?}?>

		<tr>
            <th scope="row"><label for="cf_Nbigo">도움말</label></th>
            <td><input type="text" name="Nbigo" value="<?php echo $item[bigo] ?>" id="cf_Nbigo" class="frm_input" size="40" placeholder="도움말이 필요하면 입력합니다."></td>
        </tr>


		<?
		if($inum==1 || $inum==3 || $inum==4){
			$item_num=0;
			for ($k=0; $k<30; $k++){ $item_num++;
		?>
		<tr>
			<th scope="row"><label for="cf_Nit<?=$item_num?>">옵션<?=$item_num?></label></th>
			<td align="left"><input type="text" name="Nit<?=$item_num?>" value="<?php echo $item[it.$item_num]?>" id="cf_Nit<?=$item_num?>" class="frm_input" size="40"></td>
		</tr>
		<?
			}//for end
		}
		?>



        </tbody>
        </table>
    </div>

    <div class="btn_confirm01 btn_confirm">
		<input type="submit" value="확인" class="btn_submit">
        <button type="button" onclick="window.close();">창닫기</button>
    </div>

	</form>
</div>
<?
include_once(G5_PATH.'/tail.sub.php');
?>
