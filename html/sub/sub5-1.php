<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PATH.'/head5.php');
?>
<script>
    $(function() {
        $(".lnb li").removeClass();
        $(".lnb li").eq(0).addClass('on')
    })
</script>
<div class="sub5-1">
    <h2 class="sub-tit"><strong>매장 찾기</strong></h2>
</div>
<?php
include_once(G5_PATH.'/tail1.php');
?>