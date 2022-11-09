<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PATH.'/head.php');
?>

<h2 class="sound_only">최신글</h2>
<div id="main">
    <div class="cake">
        <div class="cake-wrap"><!--1200-->
            <div>
                <h3 class="tit">CAKE</h3>
                <h4 class="desc">정성이 필요한 순간, 아티제와 함께 하세요.</h4>
                <p class="explain">아티제 케이크는 <strong>엄선된 최고의 재료만</strong>을 사용합니다. <br>특히 신선한 <strong>1등급 우유</strong>로 만든 생크림을 사용하여 <br>훨씬 <strong>부드럽고 깔끔한 맛</strong>을 느낄 수 있습니다.</p>
                <a class="more" href="/bbs/board.php?bo_table=menu"> 케이크 전체 보기</a>
            </div>
            <video src="/img/artisee.mp4" autoplay="autoplay" muted="muted" loop></video>
        </div>
    </div>
    <div class="coffee">
        <!--100%-->
        <div class="coffee-wrap">
            <!--1200-->
            <h3 class="tit">COFFEE</h3>
            <h4 class="desc">아티제 블렌드는 모두가 스페셜티입니다.</h4>
            <p class="explain">파나마 에스메랄다, 과테말라 엘 소코로, 엘 살바도르 핀카 <br>미라마르 농장에서 직접 선택한 <strong>깊이 있는 고소함과 부드러움</strong>이 <br>더해진 아티제 블렌드 에스메랄다를 만나보세요.</p>
            <a class="more" href="/sub/sub3-2.php">> 음료 전체 보기</a>
            <a class="more" href="/sub/sub2-2.php">> 커피스토리 바로가기</a>
        </div>
    </div>
    <div class="notice">
        <!--1200-->
        <div class="store">
            <h4 class="desc">아티제를 가까이에서 경험해보세요.</h4>
            <p class="explain">고객님과 가장 가까운 곳에 있는 <br>카페아티제 매장을확인해보세요.</p>
            <a href="/bbs/board.php?bo_table=branch">매장 찾기</a>
        </div>
        <div class="notice-r">
            <div class="news">
                <?php
                       echo latest('basic', 'notice', 4, 23);
                   ?>
            </div>
            <div class="contact">
                <h4 class="desc">도움이 필요하신가요?</h4>
                <p>카카오 상담톡으로 빠른 답변을 받으실 수 있습니다.</p>
                <a href="#">카카오톡 상담톡 바로가기 ></a>
            </div>
        </div>
    </div>
    <div class="sns clearfix">
        <!--100%-->
        <div class="sns-wrap">
            <h3 class="tit">CAFE ARTISEE SNS</h3>
            <h4 class="desc">카페 아티제의 최신 소식과 소중한 순간들을 SNS를 통해 함께 나눠 보세요.</h4>
            <ul>
                <li><a href="#">sns</a></li>
                <li><a href="#">sns</a></li>
                <li><a href="#">sns</a></li>
                <li><a href="#">sns</a></li>
            </ul>
            <div class="sns-more">
                <p>더 많은 소식을 sns로 만나보세요.</p>
                <div>
                    <a href="https://www.instagram.com/cafeartisee/">인스타그램</a>
                    <a href="https://www.facebook.com/cafeartisee/">페이스북</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once(G5_PATH.'/tail.php');
?>
