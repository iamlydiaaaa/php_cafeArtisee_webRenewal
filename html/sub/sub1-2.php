<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PATH.'/head1.php');
?>
<script>
    $(function() {
        $(".lnb li").removeClass();
        $(".lnb li").eq(1).addClass('on')
    })
</script>
<div class="sub1-2 none">
    <h4>로그인 정보를 찾을 수 없습니다.</h4>
    <p>본 페이지는 로그인 후 이용 가능합니다.</p>
</div>
<?php
include_once(G5_PATH.'/tail1.php');
?>