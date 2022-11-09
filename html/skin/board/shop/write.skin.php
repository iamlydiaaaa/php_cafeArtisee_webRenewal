<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<div id="bbs">
	<div class="writeskin">
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
			<div class="khwrap">
				<div class="image">
					<div class="tit">
						<h3>제품이미지</h3>
					</div>
					<?php
					//for($i=0; $i<=4; $i++) {
					for ($i=0; $i<=4; $i++) {
					$file_path = $file[$i]['path']."/".$file[$i][file];//이미지의 경로 
				?>
					<div class="item">
						<div class="box">
							<label for="bf_file_<?php echo $i+1 ?>"><i class="xi-download"></i> 이미지첨부</label>
							<input type="file" name="bf_file[]" id="bf_file_<?php echo $i+1 ?>" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능">
							<?php if ($is_file_content) { ?>
							<input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="t_txt" size="50" placeholder="파일 설명을 입력해주세요.">
							<?php } ?>
						</div>
						<?php if($w == 'u' && $file[$i]['file']) { ?>
						<div class="del">
							<input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1">
							<label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
						</div>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
				<div class="standard">
					<div class="tit">
						<h3>제품설명</h3>
					</div>
					<div class="info">
						<?php if ($is_name) { ?>
						<dl>
							<dt>
								<label for="wr_name">이름</label>
							</dt>
							<dd>
								<input type="text" name="wr_name" value="<?=$name?>" id="wr_name" required="required" class="frm_input required" maxlength="20" size="15">
							</dd>
						</dl>
						<?php } ?>
						<?php if ($is_password) { ?>
						<dl>
							<dt>
								<label for="wr_password">비밀번호</label>
							</dt>
							<dd>
								<input type="password" name="wr_password" id="wr_password" <?=$password_required?> class="frm_input <?=$password_required?>" maxlength="20" size="15">
							</dd>
						</dl>
						<?php } ?>
						<?php if ($is_email) { ?>
						<dl>
							<dt>
								<label for="wr_email">이메일</label>
							</dt>
							<dd>
								<input type="text" name="wr_email" value="<?=$email?>" id="wr_email" class="frm_input email" maxlength="100" size="50">
							</dd>
						</dl>
						<?php } ?>
						<?php if ($is_homepage) { ?>
						<dl>
							<dt>
								<label for="wr_homepage">홈페이지</label>
							</dt>
							<dd>
								<input type="text" name="wr_homepage" value="<?=$homepage?>" id="wr_homepage" class="frm_input" size="50">
							</dd>
						</dl>
						<?php } ?>
						<?php if ($option) { ?>
						<dl>
							<dt>옵션</dt>
							<dd>
								<?=$option?>
							</dd>
						</dl>
						<?php } ?>
						<dl>
							<dt>
								<label for="wr_subject">제품명</label>
							</dt>
							<dd>
								<input name="wr_subject" id="wr_subject" value="<?=$subject?>" required="required" placeholder="제품명을 입력하세요." class="frm_input full_input required">
							</dd>
						</dl>
						<?php if ($is_category) { ?>
						<dl>
							<dt>
								<label for="ca_name">카테고리</label>
							</dt>
							<dd>
								<select name="ca_name" id="ca_name" required="required" class="frm_input full_input required">
									<option value="">카테고리를 선택하세요</option>
									<?php echo $category_option ?>
								</select>
							</dd>
						</dl>
						<?php } ?>
						<dl>
							<dt>
								<label for="wr_1">제품특징</label>
							</dt>
							<dd>
								<textarea name="wr_1" id="wr_1" required="required" placeholder="제품특징을 입력하세요." class="frm_input full_input required h200"><?php echo $write['wr_1'] ?></textarea>
							</dd>
						</dl>
					</div>
					<div class="upload">
						<div class="item">
							<div class="box">
								<label for="bf_file_5"><i class="xi-download"></i> 브로슈어 파일첨부</label>
								<input type="file" name="bf_file[]" id="bf_file_5" class="t_file">
							</div>
							<?php if($w == 'u' && $file[5]['file']) { ?>
							<div class="del">
								<input type="checkbox" id="bf_file_del5" name="bf_file_del[5]" value="1">
								<label for="bf_file_del5"><?php echo $file[5]['source'].'('.$file[5]['size'].')';  ?> 삭제</label>
							</div>
							<?php } ?>
						</div>
						<div class="item">
							<div class="box">
								<label for="bf_file_6"><i class="xi-download"></i> 리플렛 파일첨부</label>
								<input type="file" name="bf_file[]" id="bf_file_6" class="t_file">
							</div>
							<?php if($w == 'u' && $file[6]['file']) { ?>
							<div class="del">
								<input type="checkbox" id="bf_file_del6" name="bf_file_del[6]" value="1">
								<label for="bf_file_del6"><?php echo $file[6]['source'].'('.$file[6]['size'].')';  ?> 삭제</label>
							</div>
							<?php } ?>
						</div>
						<div class="item">
							<div class="box">
								<label for="bf_file_7"><i class="xi-download"></i> 도면 파일첨부</label>
								<input type="file" name="bf_file[]" id="bf_file_7" class="t_file">
							</div>
							<?php if($w == 'u' && $file[7]['file']) { ?>
							<div class="del">
								<input type="checkbox" id="bf_file_del7" name="bf_file_del[7]" value="1">
								<label for="bf_file_del7"><?php echo $file[7]['source'].'('.$file[7]['size'].')';  ?> 삭제</label>
							</div>
							<?php } ?>
						</div>
						<div class="item">
							<div class="box">
								<label for="bf_file_8"><i class="xi-download"></i> 시방서 파일첨부</label>
								<input type="file" name="bf_file[]" id="bf_file_8" class="t_file">
							</div>
							<?php if($w == 'u' && $file[8]['file']) { ?>
							<div class="del">
								<input type="checkbox" id="bf_file_del8" name="bf_file_del[8]" value="1">
								<label for="bf_file_del8"><?php echo $file[8]['source'].'('.$file[8]['size'].')';  ?> 삭제</label>
							</div>
							<?php } ?>
						</div>
						<div class="item">
							<div class="box">
								<label for="bf_file_9"><i class="xi-download"></i> 전체 파일첨부</label>
								<input type="file" name="bf_file[]" id="bf_file_9" class="t_file">
							</div>
							<?php if($w == 'u' && $file[9]['file']) { ?>
							<div class="del">
								<input type="checkbox" id="bf_file_del9" name="bf_file_del[9]" value="1">
								<label for="bf_file_del9"><?php echo $file[9]['source'].'('.$file[9]['size'].')';  ?> 삭제</label>
							</div>
							<?php } ?>
						</div>
						<?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
						<div class="item">
							<div class="box">
								<label for="wr_link<?php echo $i ?>"><i class="xi-link"></i> 링크  #<?php echo $i ?></label>
								<input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo$write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="t_txt">
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="detail">
				<div class="tit">
					<h2>제품설명</h2>
				</div>
				<div class="cnt">
					<? //echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
					<textarea name="wr_content" id="wr_content" required="required" class="frm_input full_input required h400"><?php echo $write['wr_content'] ?></textarea>
				</div>
			</div>
			<div class="control">
				<div class="button fl">
					<?php if ($is_use_captcha) { //자동등록방지  ?>
					<?php echo $captcha_html ?>
					<?php } ?>
					<a href="./board.php?bo_table=<?php echo $bo_table ?>" class="bt bt_b01">취소</a> </div>
				<div class="button fr"> <a href="./board.php?bo_table=<?=$bo_table?>" class="bt bt_b01">목록보기</a>
					<button type="submit" name="btn_submit" accesskey="s" class="bt bt_b02"><i class="xi-border-color"></i> 작성완료</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
// 이미지 등비율 리사이징
$(window).load(function() {
    view_image_resize();
});
var now = new Date();
var timeout = false;
var millisec = 200;
var tid;
$(window).resize(function() {
    now = new Date();
    if (timeout === false) {
        timeout = true;

        if(tid != null)
            clearTimeout(tid);

        tid = setTimeout(resize_check, millisec);
    }
});

function resize_check() {
    if (new Date() - now < millisec) {
        if(tid != null)
            clearTimeout(tid);

        tid = setTimeout(resize_check, millisec);
    } else {
        timeout = false;
        view_image_resize();
    }
}

$(function() {
    $(".view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });
});

function view_image_resize()
{
    var $img = $(".rankiss_oimg img");
    var img_wrap = $(".rankiss_oimg").width();
    var win_width = $(window).width() - 35;
    var res_width = 0;

    if(img_wrap < win_width)
        res_width = img_wrap;
    else
        res_width = win_width;

    $img.each(function() {
        var img_width = $(this).width();
        var img_height = $(this).height();
        var this_width = $(this).data("width");
        var this_height = $(this).data("height");

        if(this_width == undefined) {
            $(this).data("width", img_width); // 원래 이미지 사이즈
            $(this).data("height", img_height);
            this_width = img_width;
            this_height = img_height;
        }

        if(this_width > res_width) {
            $(this).width(res_width);
            var res_height = Math.round(res_width * $(this).data("height") / $(this).data("width"));
            $(this).height(res_height);
        } else {
            $(this).width(this_width);
            $(this).height(this_height);
        }
    });
}

<?php
// 관리자라면 분류 선택에 '공지' 옵션을 추가함
if ($is_admin)
{
    echo '
    if (ca_name_select = document.getElementById("ca_name")) {
        ca_name_select.options.length += 1;
        ca_name_select.options[ca_name_select.options.length-1].value = "공지";
        ca_name_select.options[ca_name_select.options.length-1].text = "공지";
    }';
}
?>

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
    <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함  ?>

    var subject = "";
    var content = "";
    $.ajax({
        url: g4_bbs_url+"/filter.ajax.php",
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

    <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함 ?>

    return true;
}
</script> 
