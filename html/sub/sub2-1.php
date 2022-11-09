<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PATH.'/head2.php');
?>
<script>
    $(function() {
        $(".lnb li").removeClass();
        $(".lnb li").eq(0).addClass('on')
    })
</script>
<div class="sub2-1">
    <h2 class="sub-tit"><strong>브랜드 스토리</strong></h2>
    <div class="story clearfix">
        <div>
            <h4>a piece of art, <br>artisée</h4>
            <p>everything at artisée is an art work,<br>made by our artisans</p>
        </div>
        <img src="../img/thestory/thestory-cake2.jpg" alt="artisee">
    </div>
    <div class="story-txt">
        <p>아티제는 <strong>자유로움과 편안함, 삶의 여유</strong>를 추구하는 이들에게 <strong>감성</strong>과 <strong>휴식</strong>을 선사하는 라이프 스타일 카페입니다.<br>스토리가 있는 <strong>일러스트레이션</strong>과 <strong>커뮤널 테이블</strong>, 숙련된 바리스타가 내린 향긋한 <strong>coffee</strong>,<br>시각과 미각 모두를 만족시키는 <strong>cake & pastry까지…</strong></p>
        <a>아티제에서 만나는 모든 것은 <strong>artisan(장인)</strong>이 만든 하나의 작품입니다.</a>
    </div>
    <div class="name">
        <p><strong>아티제(artisée)</strong>는<br>프랑스어로 <strong>장인</strong>을 의미하는 <strong>‘artisan’</strong>과<br><strong>여성적인 이미지</strong>를 강조하는 <strong>‘ée’</strong>를 결합한 이름으로,</p>
        <p><strong>장인정신</strong>을 바탕으로 <strong>부드럽고 섬세한 맛</strong>을 제공하겠다는<br>의지를 담고 있는 공간입니다.</p>
    </div>
    <div class="illust">
        <img src="../img/thestory/thestory-illu1.jpg" alt="illust">
        <div class="btn">
            <a href="#">left</a>
            <a href="#">right</a>
        </div>
        <div class="illu-r">
            <p>Yunmee <br>Kyung</p>
            <a>감성적인 스토리를 담은 일러스트</a>
        </div>
    </div>
    <div class="illust-txt">
        <p>아티제의 일러스트는<br><strong>Ezra Jack Keats New Illustrator’s Award</strong> 수상,<br><strong>평화롭고 따스한 감성</strong>을 담는 경연미 작가의 손끝에서 만들어 졌습니다.</p>
        <p>각각의 일러스트에는 저마다의 감성적인 스토리가 담겨, 고객님들과 소통합니다.<br>위트 있고 따뜻한 일러스트들을 아티제 매장에서 만나보세요.</p>
    </div>
</div>
<?php
include_once(G5_PATH.'/tail1.php');
?>