<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

?>

</div>
<!-- } 콘텐츠 끝 -->

<hr>

<!-- 하단 시작 { -->
<div id="footer">
        <div class="f-wrap">
            <ul class="f-menu">
                <li><a href="http://iamlydia2.dothome.co.kr/bbs/content.php?co_id=privacy">개인정보처리방침</a></li>
                <li><a href="http://iamlydia2.dothome.co.kr/bbs/content.php?co_id=provision">클럽아티제 이용약관</a></li>
                <li><a href="https://www.cafeartisee.com/email-security/">이메일 무단수집 거부</a></li>
                <li><a href="https://www.cafeartisee.com/cctv-policies/">영상처리 기기운영·관리방침</a></li>
                <li><a href="https://www.cafeartisee.com/report/">경영공시</a></li>
            </ul>
            <h2>카페아티제</h2>
            <ul class="addr">
                <li><address>서울시 강남구 테헤란로 28길 32</address></li>
                <li>TEL: 02-543-6467</li>
            </ul>
            <ul class="company">                
                <li>사업자등록번호 220-87-92541</li>
                <li>(주)보나비 대표이사 이재영</li>
            </ul>
            <p>2019 cafe artisee, all rights reserved.</p>
        </div>
    </div>
<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_PATH."/tail.sub.php");
?>