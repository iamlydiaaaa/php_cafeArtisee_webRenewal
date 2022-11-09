<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PATH.'/head3.php');
?>
<script>
    $(function() {
        $(".lnb li").removeClass();
        $(".lnb li").eq(1).addClass('on')
    })
</script>
<div class="sub3-2">

</div>
<?php
include_once(G5_PATH.'/tail1.php');
?>