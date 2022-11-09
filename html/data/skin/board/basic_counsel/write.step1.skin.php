<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

?>
<!-- 온라인상담약관 동의 시작 { -->
<div class="mbskin">
    <form  name="fregister" id="fregister" action="<?php echo G5_BBS_URL.'/write.php?bo_table='.$bo_table ?>" onsubmit="return fregister_submit(this);" method="POST" autocomplete="off">

    <p>온라인상담약관 내용에 동의하셔야 온라인상담 하실 수 있습니다.</p>

    <section id="fregister_term">
        <h2>온라인상담약관</h2>
        <textarea readonly><?php echo get_text($csconfig['agree_info']) ?></textarea>
        <fieldset class="fregister_agree">
            <label for="agree11">온라인상담약관의 내용에 동의합니다.</label>
            <input type="checkbox" name="agree" value="1" id="agree11">
        </fieldset>
    </section>

    <div class="btn_confirm">
        <input type="submit" class="btn_submit" value="온라인상담">
		<a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn_cancel">취소</a>
    </div>

    </form>

    <script>
    function fregister_submit(f)
    {
        if (!f.agree.checked) {
            alert("온라인상담약관의 내용에 동의하셔야 온라인상담 하실 수 있습니다.");
            f.agree.focus();
            return false;
        }

        return true;
    }
    </script>
</div>
<!-- } 온라인상담 약관 동의 끝 -->