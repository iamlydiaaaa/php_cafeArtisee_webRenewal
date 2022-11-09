<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

$sql_search = "";
// 검색이면
if ($sca || $stx) {
    // where 문을 얻음
    $sql_search = get_sql_search($sca, $sfl, $stx, $sop);
    $search_href = '../bbs/board.php?bo_table='.$bo_table.'&amp;page='.$page.$qstr;
    $list_href = '../bbs/board.php?bo_table='.$bo_table;
} else {
    $search_href = '';
    $list_href = '../bbs/board.php?bo_table='.$bo_table.'&amp;page='.$page;
}

if (!$board['bo_use_list_view']) {
    if ($sql_search)
       $sql_search = " and " . $sql_search;

// 윗글을 얻음
    $sql = " select wr_id, wr_subject from $write_table where wr_is_comment = 0 and wr_num = '$write[wr_num]' and wr_reply < '$write[wr_reply]' $sql_search order by wr_num desc, wr_reply desc limit 1 ";
    $prev = sql_fetch($sql);
    // 위의 쿼리문으로 값을 얻지 못했다면
    if (!$prev['wr_id']) {
        $sql = " select wr_id, wr_subject from $write_table where wr_is_comment = 0 and wr_num < '$write[wr_num]' $sql_search order by wr_num desc, wr_reply desc limit 1 ";
        $prev = sql_fetch($sql);
    }

    // 아래글을 얻음
    $sql = " select wr_id, wr_subject from $write_table where wr_is_comment = 0 and wr_num = '$write[wr_num]' and wr_reply > '$write[wr_reply]' $sql_search order by wr_num, wr_reply limit 1 ";
    $next = sql_fetch($sql);
    // 위의 쿼리문으로 값을 얻지 못했다면
    if (!$next['wr_id']) {
        $sql = " select wr_id, wr_subject from $write_table where wr_is_comment = 0 and wr_num > '$write[wr_num]' $sql_search order by wr_num, wr_reply limit 1 ";
        $next = sql_fetch($sql);
    }
}

// 이전글 링크
$prev_href = '';
if ($prev['wr_id']) {
    $prev_wr_subject = get_text(cut_str($prev['wr_subject'], 255));
    $prev_href = '../bbs/board.php?bo_table='.$bo_table.'&amp;wr_id='.$prev['wr_id'].'&amp;page='.$page.$qstr;
}

// 다음글 링크
$next_href = '';
if ($next['wr_id']) {
    $next_wr_subject = get_text(cut_str($next['wr_subject'], 255));
    $next_href = '../bbs/board.php?bo_table='.$bo_table.'&amp;wr_id='.$next['wr_id'].'&amp;page='.$page.$qstr;
}
?>

<div id="bbs">
	<div class="viewskin">
		<?php if ($is_category) { ?>
		<div class="cate">
			<ul>
				<?php echo $category_option ?>
			</ul>
		</div>
		<?php } ?>
		<div class="khwrap">
			<div class="image">
				<div class="imgbig">
					<?php
						if ($view['file'][0]['file']) {
							$image = urlencode($view['file'][0]['file']);
							if (preg_match("/\.(gif|jpg|png)$/i", $image) && file_exists(G5_PATH.'/data/file/'.$bo_table.'/'.$image)) {
								echo '<img src="'.G5_URL.'/data/file/'.$bo_table.'/'.$image.'" alt="'.$view['file'][$i]['bf_content'].'">';
							} else {
								echo '<img src="'.$board_skin_url.'/img/noimg.gif" alt="">';
							}
						}
					?>
				</div>
				<div class="imgthb">
					<?php
					for ($i=0; $i<=4; $i++) {
					//for ($i=1; $i<=5; $i++) {
						echo $size[0];
						if ($i == 0) echo '<ul>';
						if ($view['file'][0]['file']) {
							$image = urlencode($view['file'][$i]['file']);
							if (preg_match("/\.(gif|jpg|png)$/i", $image) && file_exists(G5_PATH.'/data/file/'.$bo_table.'/'.$image)) {
								echo '<li>';
								echo '<a  class="inner"><i class="xi-expand-square"></i>';
								echo '<div class="img"><img src="'.G5_URL.'/data/file/'.$bo_table.'/'.$image.'" alt="'.$view['file'][$i]['bf_content'].'" class="'.$size[0].' '.$size[1].'"></div>';
								echo '</a>';
								echo '</li>';
							}
						}
					}
					if ($i > 0) echo '</ul>';
					?>
				</div>
			</div>
			<div class="standard">
				<div class="tit">
					<h3>
						<?php
						echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
						?>
					</h3>
					<p>
						<?php
						if ($category_name) echo ($category_name ? ''.$view['ca_name'] : ''); // 분류 출력 끝
						?>
					</p>
				</div>
				<div class="opt">
					<?php echo $view['wr_1']; ?>
				</div>
				<div class="dow">
					<?php for ($i=5; $i<=5; $i++) { if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {?>
					<a href="<?php echo $view['file'][$i]['href']; ?>" title="<?php echo $view['file'][$i]['source'] ?> <?php echo $view['file'][$i]['size'] ?>">브로슈어 다운로드 <i class="xi-download"></i></a>
					<?php }} ?>
					<?php for ($i=6; $i<=6; $i++) { if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {?>
					<a href="<?php echo $view['file'][$i]['href']; ?>" title="<?php echo $view['file'][$i]['source'] ?> <?php echo $view['file'][$i]['size'] ?>">리플릿 다운로드 <i class="xi-download"></i></a>
					<?php }} ?>
					<?php for ($i=7; $i<=7; $i++) { if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {?>
					<a href="<?php echo $view['file'][$i]['href']; ?>" title="<?php echo $view['file'][$i]['source'] ?> <?php echo $view['file'][$i]['size'] ?>">도면 다운로드 <i class="xi-download"></i></a>
					<?php }} ?>
					<?php for ($i=8; $i<=8; $i++) { if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {?>
					<a href="<?php echo $view['file'][$i]['href']; ?>" title="<?php echo $view['file'][$i]['source'] ?> <?php echo $view['file'][$i]['size'] ?>">시방서 다운로드 <i class="xi-download"></i></a>
					<?php }} ?>
					<?php for ($i=9; $i<=9; $i++) { if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {?>
					<a href="<?php echo $view['file'][$i]['href']; ?>" title="<?php echo $view['file'][$i]['source'] ?> <?php echo $view['file'][$i]['size'] ?>">전체 다운로드 <i class="xi-download"></i></a>
					<?php }} ?>
					
					<?php if(isset($view['link'][1]) && $view['link'][1]) { ?>
					<?php
					$cnt = 0;
					for ($i=1; $i<=count($view['link']); $i++) {
						if ($view['link'][$i]) {
							$cnt++;
							$link = cut_str($view['link'][$i], 70);
					?>
					<a href="<?php echo $view['link_href'][$i] ?>" title="<?php echo $link ?>" target="_blank"><i class="xi-codepen"></i> 3D 사진</a>
					<?php
						}
					}
					?>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="detail">
			<div class="tit">
				<h2>제품설명</h2>
			</div>
			<div class="cnt">
				<?php echo $view['wr_content']; ?>
			</div>
		</div>
		<?php ob_start(); ?>
		<div class="ctrl">
			<div class="button fl">
				<?php if ($update_href) { ?><a href="<?php echo $update_href ?>" class="bt bt_b02"><i class="xi-pen"></i> 수정</a><?php } ?>
				<?php if ($delete_href) { ?><a href="<?php echo $delete_href ?>" class="bt bt_adm" onclick="del(this.href); return false;"><i class="xi-trash-o"></i> 삭제</a><?php } ?>
				<?php if ($copy_href) { ?><a href="<?php echo $copy_href ?>" class="bt bt_adm" onclick="board_move(this.href); return false;"><i class="xi-eye-o"></i> 복사</a><?php } ?>
				<?php if ($move_href) { ?><a href="<?php echo $move_href ?>" class="bt bt_adm" onclick="board_move(this.href); return false;"><i class="xi-catched"></i> 이동</a><?php } ?>
				<?php if ($search_href) { ?><a href="<?php echo $search_href ?>" class="bt bt_adm"><i class="xi-search"></i> 검색</a><?php } ?>
			</div>
			<div class="button fr">
				<a href="<?php echo $list_href ?>" class="bt bt_b01"><i class="xi-list"></i> 목록으로</a>
				<?php /*if ($reply_href) { ?><a href="<?php echo $reply_href ?>" class="bt bt_b01"><i class="xi-reply"></i> 답변</a><?php }*/ ?>
				<?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="bt bt_b02"><i class="xi-pen-o"></i> 등록하기</a><?php } ?>
			</div>
		</div>
		<?php if ($prev_href || $next_href) { ?>
		<div class="beafter khskip">
			<?php if ($prev_href) { ?>
			<div><strong><i class="xi-caret-up-min"></i> 이전제품 </strong> <a href="<?php echo $prev_href ?>"><?php echo $prev_wr_subject;?></a> <em><?php echo str_replace('-', '.', substr($prev_wr_date, '2', '8')); ?></em></div>
			<?php } ?>
			<?php if ($next_href) { ?>
			<div><strong><i class="xi-caret-down-min"></i> 다음제품 </strong> <a href="<?php echo $next_href ?>"><?php echo $next_wr_subject;?></a> <em><?php echo str_replace('-', '.', substr($next_wr_date, '2', '8')); ?></em></div>
			<?php } ?>
		</div>
		<?php } ?>
		<?php
		$link_buttons = ob_get_contents();
		ob_end_flush();
		?>
	</div>
</div>
<script>
function file_download(link, file) {
    <? if ($board[bo_download_point] < 0) { ?>if (confirm("'"+file+"' 파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board[bo_download_point])?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?"))<?}?>
    document.location.href=link;
}

$(function() {
	// 이미지 새창보기
	$(".innesr").click(function() {
		window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=600,height=600,resizable=yes,scrollbars=no,status=no");
		return false;
	});
	// 이미지 미리보기
	$(".imgthb .img").bind("click focus", function(){		
		var img_src = $(this).children('img').attr('src');
		var img_alt = $(this).children('img').attr('alt');
		$('.imgbig img').attr('src', img_src);
		$('.imgbig img').attr('alt', img_alt);
	});
});
</script>