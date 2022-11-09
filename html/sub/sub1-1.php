<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PATH.'/head1.php');
?>
<script>
    $(function() {
        $(".lnb li").removeClass();
        $(".lnb li").eq(0).addClass('on')
    })
</script>
<div class="sub1-1">
    <div class="to-mem clearfix">
        <h2 class="sub-tit">클럽 아티제 <strong>회원이 되려면?</strong></h2>
        <dl>
            <dt>회원가입</dt>
            <dd>아티제 홈페이지 또는 모바일 앱에서<br>회원가입을 합니다.</dd>
        </dl>
        <dl>
            <dt>카드등록</dt>
            <dd>아티제 전 매장에서 발급 받은 충전식 선불카드를<br>홈페이지 또는 모바일 앱 로그인 후 등록합니다.</dd>
            <dd>(모바일 앱에서 회원가입 시 카드가 생성되며,<br>매장에서 발급받은 카드를 추가 등록할 수 있습니다.)</dd>
        </dl>
        <dl>
            <dt>포인트</dt>
            <dd>등록된 카드를 사용하실 때마다 포인트가 적립되며,<br>적립된 포인트는 현금과 같이 사용하실 수 있습니다.</dd>
        </dl>
    </div>
    <div class="be-mem">
        <h2 class="sub-tit">클럽 아티제 <strong>회원이 되시면?</strong></h2>
        <dl>
            <dt>Add extra or Size upgrade</dt>
            <dd>클럽아티제 충전금액 결제 시, 커피 음료에 한해 <strong>add extra</strong> 또는 <strong>size upgrade</strong>를 하실 수 있습니다.</dd>
            <dd>(충전금액 외 타 결제수단 혼용 시 제외 /세트메뉴 구매 시 제외)</dd>
            <dd></dd>
        </dl>
        <dl>
            <dt>MD products 20% off</dt>
            <dd>클럽아티제 충전금액 또는 포인트 결제 시, 아티제 <strong>MD 상품 상시 20% 할인</strong> 받으실 수 있습니다.</dd>
            <dd>(충전금액과 포인트 혼용 가능 /일부상품 제외)</dd>
            <dd></dd>
        </dl>
    </div>
    <div class="benefit clearfix">
        <h2 class="sub-tit">클럽 아티제 <strong>등급별 혜택</strong></h2>
        <ul>
            <li>
                <p><em>Bunnie</em>카드 신규 등록시</p>
                <ul>
                    <li>생일 무료음료 쿠폰 <span>(연 1회)</span></li>
                    <li>구매 시 마다 최종 결제금액의 3% 적립</li>
                </ul>
            </li>
            <li>
                <p><em>Bonnie</em>최근 12개월 누적 적립 포인트가<br><strong>2,000p</strong>이상시</p>
                <ul>
                    <li>생일 무료음료 쿠폰 <span>(연 1회)</span></li>
                    <li>시즌음료 1+1 쿠폰 <span>(수시)</span></li>
                    <li>구매 시 마다 최종 결제금액의 3% 적립</li>
                </ul>
            </li>
            <li>
                <p><em>Artisienne</em>최근 12개월 누적 적립 포인트가<br><strong>40,000p</strong>이상시</p>
                <ul>
                    <li>생일 홀케이크 쿠폰 <span>(연 1회 / 스페셜 케이크 제외)</span></li>
                    <li>커피 1+1 쿠폰 <span>(연 4회 : 1, 4, 7, 10월)</span></li>
                    <li>시즌음료 1+1 쿠폰 <span>수시</span></li>
                    <li>아티지엔 승급 축하 쿠폰/<br>아티지엔 테디베어 키링&아티지엔 카드<br><span>(회원 ID 당 1회)</span></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="usecard">
        <h2 class="sub-tit">클럽 아티제 <strong>충전식 선불카드 사용방법</strong></h2>
        <div>
            <p><strong>충전방법</strong>매장, 모바일 APP에서 충전 가능합니다.</p>
            <p><strong>충전금액</strong>매장 충전의 경우 만원 단위로 1만원부터 50만원까지 충전이 가능합니다. 1회 최대 충전가능 금액은 10만원입니다.</p>
            <p><strong>결제수단</strong>신용카드, 현금, 휴대폰 소액결제(모바일앱)로 가능합니다.</p>
            <p><strong>유효기간</strong>최종 충전일로부터 5년입니다.</p>
            <p><strong>잔액환불</strong>최종 충전 금액의 40% 이하인 경우 매장에서 환불 가능합니다.</p>
            <p><strong>문의전화</strong>02-2155-5738</p>
        </div>
    </div>
    <div class="notice">
        <p>확인해주세요!</p>
        <div>
            <a>승급 후 혜택은 익일부터 적용됩니다.</a>
            <a>생일 무료음료 쿠폰은 가입 시 등록하신 생일 1주일 전에 발송됩니다.</a>
            <a>포인트 적립은 당일에 한하며, 추후 적립은 불가합니다.</a>
        </div>
    </div>
</div>
<?php
include_once(G5_PATH.'/tail1.php');
?>