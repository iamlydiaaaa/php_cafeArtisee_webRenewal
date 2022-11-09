<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 2;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<div id="bbs">
    <div class="ctrl">
		<div class="search">
			<form name="fsearch" method="get">
			<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
			<input type="hidden" name="sca" value="<?php echo $sca ?>">
			<input type="hidden" name="sop" value="and">
			<fieldset class="scboard">
				<legend>게시물 검색</legend>
				<label for="sfl" class="sound_only">검색대상</label>
				<select name="sfl" id="sfl">
					<option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>> <?php echo _("제품명");?></option>
					<option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>> <?php echo _("내용");?></option>
					<?php /*?><option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>> <?php echo _("제목+내용");?></option><?php */?>
				</select>
				<label for="stx" class="sound_only">검색어 필수</label>
				<input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" size="25" maxlength="20" placeholder="<?php echo _("검색어를 입력해주세요");?>">
				<button type="submit" value="검색"><i class="xi-search"></i><span class="sound_only">검색</span></button>
			</fieldset>
			</form>
		</div>
        <?php if ($rss_href || $write_href) { ?>
        <div class="bttn fr">
            <?php if ($admin_href) { ?><a href="<?php echo $admin_href ?>" class="bt bt_adm"><i class="xi-key"></i> 관리자</a><?php } ?>
            <?php if ($rss_href) { ?><a href="<?php echo $rss_href ?>" class="bt bt_b01"><i class="xi-rss-square"></i> RSS</a><?php } ?>
            <?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="bt bt_b02"><i class="xi-pen-o"></i> 글쓰기</a><?php } ?>
        </div>
        <?php } ?>
    </div>

    <?php if ($is_category) { ?>
    <div class="cate">
        <ul>
            <?php echo $category_option ?>
        </ul>
    </div>
    <?php } ?>

    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <div class="listskin">
		<ul>
			<?php
			for ($i=0; $i<count($list); $i++) {
			?>
			<li class="ktpscroll">
            	<div class="item">
					<?php if ($is_checkbox) { ?>
					<div class="chk">
					<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
					<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>" class="checkbox">
					</div>
					<?php } ?>

					<div class="img">
						<a href="<?php echo $list[$i]['href'] ?>">
						<?php
						$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'], false, true);
						if($thumb['src']) {
							$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" >';
							} else {
							$img_content = '<i>제품 이미지가 없습니다.</i>';
							}
						echo $img_content;
						?>
						</a>
					</div>

					<div class="inner">
						<div class="tit">
							<?php
							if ($list[$i]['is_notice']) // 공지사항
								echo '<strong class="notice_icon"><i class="xi-comment-o"></i><span class="sound_only">공지</span></strong>';
							else if ($wr_id == $list[$i]['wr_id'])
								echo "<span class=\"bo_current\">열람중</span>";
							else
								//echo $list[$i]['num'];
							?>
							<?php echo $list[$i]['subject'] ?>
							<?php echo $list[$i]['icon_reply'] ?>
							<?php if (isset($list[$i]['icon_secret'])) echo rtrim($list[$i]['icon_secret']); ?>
							<?php
							// if ($list[$i]['link']['count']) { echo '['.$list[$i]['link']['count']}.']'; }
							// if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }
							/*if (isset($list[$i]['icon_file'])) echo rtrim($list[$i]['icon_file']);
							if (isset($list[$i]['icon_link'])) echo rtrim($list[$i]['icon_link']);
							if (isset($list[$i]['icon_new'])) echo rtrim($list[$i]['icon_new']);
							if (isset($list[$i]['icon_hot'])) echo rtrim($list[$i]['icon_hot']);*/
							?>
							<?php if ($list[$i]['comment_cnt']) { ?>
							<span class="sound_only">댓글</span><span class="cnt">+<?php echo $list[$i]['wr_comment']; ?></span><span class="sound_only">개</span>
							<?php } ?>
						</div>
						<?php if ($is_category && $list[$i]['ca_name']) { ?>
						<div class="cate">
							<a href="<?php echo $list[$i]['ca_name_href'] ?>"><?php echo $list[$i]['ca_name'] ?></a>
						</div>
						<?php } ?>
					</div>
				</div>
			</li>
			<?php } ?>
			<?php if (count($list) == 0) { echo '<li class="nocontent">제품이 없습니다.</li>'; } ?>
		</ul>
	</div>
	<div class="ctrl">		
		<?php if ($list_href || $is_checkbox || $write_href) { ?>
		<div class="bttn fl">
			<?php if ($is_checkbox) { ?>
			<span class="bt bt_adm">
				<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
				<label for="chkall">전체선택</label>
			</span>
            <button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" class="bt bt_adm"><i class="xi-trash-o"></i> 선택삭제</button>
            <button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value" class="bt bt_adm"><i class="xi-eye-o"></i> 선택복사</button>
            <button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value" class="bt bt_adm"><i class="xi-catched"></i> 선택이동</button>
            <?php } ?>
		</div>
        <div class="bttn fr">
            <?php if ($list_href) { ?><a href="<?php echo $list_href ?>" class="bt bt_b01"><i class="xi-list"></i> 목록</a><?php } ?>
            <?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="bt bt_b02"><i class="xi-pen-o"></i> 글쓰기</a><?php } ?>
        </div>
        <?php } ?>
	</div>
    </form>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>
<?php echo $write_pages; ?>
<?php if ($is_checkbox) { ?>
<script type="text/javascript">
	//<![CDATA[
	function all_checked(sw) {
		var f = document.fboardlist;
		for (var i=0; i<f.length; i++) {
			if (f.elements[i].name == "chk_wr_id[]")
				f.elements[i].checked = sw;
		}
	}
	function fboardlist_submit(f) {
		var chk_count = 0;
		for (var i=0; i<f.length; i++) {
			if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
				chk_count++;
		}
		if (!chk_count) {
			alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
			return false;
		}
		if(document.pressed == "선택복사") {
			select_copy("copy");
			return;
		}
		if(document.pressed == "선택이동") {
			select_copy("move");
			return;
		}
		if(document.pressed == "선택삭제") {
			if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
				return false;
	
			f.removeAttribute("target");
			f.action = "./board_list_update.php";
		}
		return true;
	}

	// 선택한 게시물 복사 및 이동
	function select_copy(sw) {
		var f = document.fboardlist;
	
		if (sw == "copy")
			str = "복사";
		else
			str = "이동";
	
		var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");
	
		f.sw.value = sw;
		f.target = "move";
		f.action = "./move.php";
		f.submit();
	}
	//]]>
</script>
<?php } ?>
