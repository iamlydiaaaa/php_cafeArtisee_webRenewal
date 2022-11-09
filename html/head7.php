<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
<link rel="stylesheet" href="/css/sub6.css">
<link rel="stylesheet" href="/css/sub.css">
<script src="/js/main.js"></script>
<!-- 상단 시작 { -->
<div id="header" class="clearfix">
    <!--100%-->
    <div class="header-wrap">
        <!--1200가운데-->
        <h1 class="logo"><a href="http://iamlydia2.dothome.co.kr/">cafe artisee</a></h1>
        <h2 class="hidden">메인메뉴</h2>
        <div id="gnb">
            <ul>
                <li><a href="#">club artisée</a>
                    <ul>
                        <li><a href="/sub/sub1-1.php?&han2=0">멤버십 안내</a></li>
                        <li><a href="/sub/sub1-2.php?&han2=1">마이 아티제</a></li>
                        <li><a href="/sub/sub1-3.php?&han2=2">마이 페이지</a></li>
                        <li><a href="/bbs/board.php?bo_table=qna&han2=3">자주 묻는 질문</a></li>
                    </ul>
                </li>
                <li><a href="#">the story</a>
                    <ul>
                        <li><a href="/sub/sub2-1.php?&han2=0">브랜드 스토리</a></li>
                        <li><a href="/sub/sub2-2.php?&han2=1">커피 스토리</a></li>
                    </ul>
                </li>
                <li><a href="#">menu</a>
                    <ul>
                        <li><a href="/bbs/board.php?bo_table=menu&han2=0">베이커리</a></li>
                        <li><a href="/sub/sub3-2.php?&han2=1">음료</a></li>
                        <li><a href="#">디저트</a></li>
                        <li><a href="#">푸드</a></li>
                    </ul>
                </li>
                <li><a href="#">news</a>
                    <ul>
                        <li><a href="/bbs/board.php?bo_table=new_menu&han2=0">새 메뉴</a></li>
                        <li><a href="/bbs/board.php?bo_table=event&han2=1">이벤트</a></li>
                        <li><a href="/bbs/board.php?bo_table=notice&han2=2">공지사항</a></li>
                    </ul>
                </li>
                <li><a href="#">store</a>
                    <ul>
                        <li><a href="/bbs/board.php?bo_table=branch&han2=0">매장 찾기</a></li>
                        <li><a href="/sub/sub5-2.php?&han2=1">단체 구매</a></li>
                    </ul>
                </li>
                <li><a href="#">contact</a>
                    <ul>
                        <li><a href="/sub/sub6-1.php?&han2=0">신규 입점 제의</a></li>
                        <li><a href="/sub/sub6-2.php?&han2=1">고객의 소리</a></li>
                        <li><a href="#">카카오톡 상담톡</a></li>
                    </ul>
                </li>
            </ul>
            <p></p>
        </div>
        <ul class="tnb">
            <?php if ($is_member) {  ?>
            <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
            <?php if ($is_admin) {  ?>
            <li class="tnb_admin"><a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>">관리자</a></li>
            <?php }  ?>
            <?php } else {  ?>
            <li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/login.php">로그인</a></li>
            <?php }  ?>
            <li><a href="#">FAQ</a></li>
        </ul>
    </div>
    <p class="gnb-bg"></p>
</div>
<!-- } 상단 끝 -->

<!--비주얼-->
<div id="visual">
    <div>
        <p>Register</p>
        <p>회원가입을 하시면 아티제의 다양한 혜택을 받으실 수 있습니다.</p>
    </div>
</div>

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div class="container clearfix">
