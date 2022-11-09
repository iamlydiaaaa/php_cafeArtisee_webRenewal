<?php
include_once('./_common.php');

$g5['title'] = 'CONTACT US';
include_once('../head6.php');
?>

<link rel="stylesheet" href="../css/formmail.css">
<script>
    $(function() {
        $(".lnb li").removeClass();
        $(".lnb li").eq(1).addClass('on')
    })
</script>
<!-- CONTACT -->
<div>

    <div class="form-tit">
        <h2 class="sub-tit"><strong>Voice of the Customer</strong></h2>
        <p>본 고객의 소리는 이메일을 통한 상담으로만 진행됩니다.<br>보다 나은 서비스로 보답 하겠습니다.<br>문의가 집중되거나 주말의 경우답변이 지연될 수 있으니 양해 부탁 드립니다.</p>
        <a>고객의 소리 운영시간 : 월 ~ 금 : 09:00 ~ 17:00 (토/일요일, 공휴일 휴무)
        </a>
    </div>

    <form name="contactForm" id="contactForm" action="php/contact.php" method="POST" autocomplete="off">

        <section id="contactForm_term">
            <h2>개인정보 수집 및 이용에 관한 동의</h2>
            <textarea class="agree_text" readonly>1. 수집하는 개인정보의 항목
회사는 이용자에게 본인확인, 포인트 적립 및 결제 서비스, 다양하고 편리한 인터넷 서비스를 제공하기 위해야 아래의 방법을 통해 개인정보를 수집하고 있습니다.

가. 개인정보 수집항목
- 성명, 아이디, 비밀번호, 생년월일, 주소, 전화번호, E-Mail
- 서비스 이용과정 및 사업 처리과정에서 수집될 수 있는 개인정보의 범위 : 서비스 이용기록, 접속 로그, 쿠키, 접속IP정보, 결제기록, 이용정지 기록
나. 개인정보의 수집방법
회사는 이용자가 개인정보보호정책과 이용약관의 각각의 내용에 대해 ‘동의’ 또는 ‘동의하지 않는다’버튼을 클릭할 수 있는 절차를 마련하여, ‘동의’버튼을 클릭한 경우 개인정보 수집에 대해 동의한 것으로 봅니다.

다. 허위 정보 입력 시 회사의 조치
고객은 자신의 정보에 대해 정확성 및 적법성을 보장해야 한다. 만약 이를 위반하여 타인의 정보를 도용하는 등 각종 방법으로 허위 정보를 입력할 경우 회사는 해당 고객을 관계법령에 따라 신고 할 수 있으며 강제 탈퇴를 시킬 수도 있습니다.

2. 개인정보의 수집 및 이용목적
회사는 수집한 개인정보를 다음의 목적을 위해 활용합니다. 회사가 처리하는 개인정보는 이하의 목적에 필요한 최소한으로만 수집 처리합니다. 회사가 처리하는 개인정보는 이하의 목적에 필요한 최소한으로만 수집 처리합니다.

가. 서비스 제공에 관한 계약 이행 및 서비스 제공에 따른 요금정산, 콘텐츠 제공, 물품배송 또는 청구지 등 발송
나. 회원 관리 : 회원제 서비스 이용에 따른 본인확인, 개인 식별, 불량회원의 부정 이용 방지와 비인가 사용 방지, 가입 의사 확인, 연령확인, 불만처리 등 민원처리, 고지사항 전달
다. 마케팅 및 광고에 활용 : 신규 서비스(제품) 개발 및 특화, 이벤트 등 광고성 정보 전달, 인구통계학적 특성에 따른 서비스 제공 및 광고 게재, 접속 빈도 파악 또는 회원의 서비스 이용에 대한 통계
라. 기타 : 각종 서비스 공지 및 이벤트 홍보 안내를 위한 문자메시지 및 이메일 전달
3. 개인정보의 보유 및 이용기간
회사는 회원가입일로부터 서비스를 제공하는 기간 동안에 한하여 이용자의 개인정보를 보유 및 이용하게 됩니다. 회원 탈퇴를 요청하거나 개인정보의 수집 및 이용에 대한 동의를 철회하는 경우, 수집 및 이용목적이 달성되거나 보유 및 이용기간이 종료한 경우 해당 개인정보를 지체없이 파기합니다. 단, 다음의 정보에 대해서는 아래의 이유로 명시한 기간 동안 보존합니다.

가. 보존 항목 : 이름, 생년월일, 성별, 로그인ID(이메일), 휴대전화번호
나. 보존 근거 : 서비스 이용의 혼선 방지, 불법적 사용자에 대한 관련 기관 수사협조
다. 보존 기간 : 1년
그리고 관계법령의 규정에 의하여 보존할 필요가 있는 경우 회사는 아래와 같이 관계법령에서 정한 일정한 기간 동안 회원정보를 보관합니다.

가. 보존 항목 : 서비스 이용기록, 접속 로그, 접속 IP 정보
나. 보존 근거 : 통신비밀보호법
다. 보존 기간 : 3개월
라. 표시/광고에 관한 기록 : 6개월 (전자상거래등에서의 소비자보호에 관한 법률)
마. 계약 또는 청약철회 등에 관한 기록 : 5년 (전자상거래등에서의 소비자보호에 관한 법률)
바. 대금결제 및 재화 등의 공급에 관한 기록 : 5년 (전자상거래등에서의 소비자보호에 관한 법률)
사. 소비자의 불만 또는 분쟁처리에 관한 기록 : 3년(전자상거래등에서의 소비자보호에 관한 법률)
회사는 개인정보의 수집목적 또는 제공받은 목적이 달성된 때에는 고객의 개인 정보를 지체 없이 파기합니다. 구체적인 파기 시점은 다음과 같습니다.

가. 회원 가입 정보 : 회원가입을 탈퇴하거나 회원에서 제명된 때
나. 배송 정보 : 물품 또는 서비스가 인도되거나 제공된 때
다. 설문조사 이벤트 등을 위하여 수집한 정보: 당해 설문조사, 이벤트 등이 종료된 때
라. 본인 확인 정보 : 본인임을 확인한 때
단, 상법 등 관련 법령의 규정 및 내부 방침에 의하여 다음과 같이 거래 관련 권리 의무 관계의 확인 등을 이유로 일정기간 보유하여야 할 필요가 있는 경우에는 다음과 같이 일정기간 보유합니다.

가. 계약 또는 청약 철회 등에 관한 기록 : 5년
나. 대금결제 및 재화 등의 공급에 관한 기록 : 5년
다. 소비자의 불만 또는 분쟁 처리에 관한 기록 : 3년
라. 회원 탈퇴 시 : 탈퇴 요청으로부터 30일간 개인정보 삭제의 절차적 사유로 보관
4. 개인정보의 파기절차 및 방법
회사는 원칙적으로 개인정보 수집 및 이용목적이 달성된 후에는 해당 정보를 지체 없이 파기합니다.

가. 파기절차
회원님이 회원가입 등을 위해 입력하신 정보는 목적이 달성된 후 별도의 DB로 옮겨져(종이의 경우 별도의 서류함) 내부 방침 및 기타 관련 법령에 의한 정보보호 사유에 따라(보유 및 이용기간 참조) 일정 기간 저장된 후 파기 되어집니다. 별도 DB로 옮겨진 개인정보는 법률에 의한 경우가 아니고서는 보유 되어지는 이외의 다른 목적으로 이용되지 않습니다.

나. 파기방법
전자적 파일형태로 저장된 개인정보는 기록을 재생할 수 없는 기술적 방법을 사용하여 삭제합니다. 종이에 출력된 개인정보는 분쇄기로 분쇄하거나 소각을 통하여 파기합니다.

5. 수집한 개인정보의 위탁
회사는 클럽아티제 서비스 제공을 위해 아래와 같이 개인정보를 위탁하고 있으며, 위탁계약 시 개인정보가 안전하게 관리될 수 있도록 필요한 사항을 규정하고 있습니다. 회사의 개인정보 위탁처리 기관 및 위탁업무 내용은 아래와 같습니다.

가. 수탁업체 및 위탁업무 내용
수탁업체	위탁업무 내용
㈜엔에이치엔페이코	개인정보의 보관 및 유지
㈜보나비의 요청에 의한 공지사항/마케팅정보전송
(Push / LMS / SMS / E-mail)
시스템 장애 관련 민원 대응 및 처리
카카오톡 비즈메세지 발송 대행
엔에이치엔한국사이버결제㈜	본인확인
NHN KCP Corp.	전자지불서비스
나. 개인정보의 보유 및 이용기간 : 회원 탈퇴시 또는 위탁계약 종료시제1항에 의해 고객의 정정 요청을 받은 날로부터 2주 이내에 해당 거래내역을 검토하여 고객에게 그 결과를 통보하여 드립니다.
6. 회원 및 법정대리인의 권리와 그 행사 방법
회원 및 법정 대리인은 언제든지 등록되어 있는 자신 혹은 당해 만 14세 미만 아동의 개인정보를 조회하거나 수정할 수 있으며 가입해지를 요청할 수도 있습니다. 회원 혹은 만 14세 미만 아동의 개인정보 조회, 수정을 위해서는 ‘개인정보확인 및 변경’을, 가입해지(동의철회)를 위해서는 “회원탈퇴”를 클릭하여 본인 확인 절차를 거치신 후 직접 열람, 정정 또는 탈퇴가 가능합니다. 혹은 개인정보관리책임자에게 서면, 전화 또는 이메일로 연락하시면 본인 확인 후 조치하겠습니다. 귀하가 개인정보의 오류에 대한 정정을 요청하신 경우에는 정정을 완료하기 전까지 당해 개인정보를 이용 또는 제공하지 않습니다. 또한 잘못된 개인정보를 제 3자에게 이미 제공한 경우에는 정정 처리결과를 제 3자에게 지체 없이 통지하여 정정이 이루어지도록 합니다. 회사는 이용자 혹은 법정 대리인의 요청에 의해 해지 또는 삭제된 개인정보는 “개인정보의 보유 및 이용기간”에 명시된 바에 따라 처리하고 그 외의 용도로 열람 또는 이용할 수 없도록 처리합니다.

7. 개인정보 자동수집 장치의 설치, 운영 및 그 거부에 관한 사항
회사는 귀하의 정보를 수시로 저장하고 찾아내는 ‘쿠키(cookie)’ 등을 운용합니다. 쿠키란 회사의 웹사이트를 운영하는데 이용되는 서버가 귀하의 브라우저에 보내는 아주 작은 텍스트 파일로서 귀하의 컴퓨터 하드디스크에 저장됩니다. 회사는 다음과 같은 목적을 위해 쿠키를 사용합니다.

가. 쿠키 등 사용 목적
회원과 비회원의 접속 빈도나 방문 시간 등을 분석, 이용자의 취향과 관심분야를 파악 및 자취 추적, 각종 이벤트 참여 정도 및 방문 회수 파악 등을 통한 타겟 마케팅 및 개인 맞춤 서비스 제공

나. 쿠키 설정 거부 방법
회원은 쿠키 설치에 대한 선택권을 가지고 있습니다. 따라서, 회원은 웹브라우저에서 옵션을 설정함으로써 모든 쿠키를 허용하거나, 쿠키가 저장될 때마다 확인을 거치거나, 아니면 모든 쿠키의 저장을 거부할 수도 있습니다.

다. 설정방법
- 인터넷 익스플로러의 경우 : 웹 브라우저 상단의 도구 > 인터넷 옵션 > 개인정보

(각 브라우저 별 쿠키 설정 메뉴는 각 브라우저의 도움말을 참조할 수 있습니다.)
단, 회원이 쿠키 설치를 거부하였을 경우 서비스 제공에 어려움이 있을 수 있습니다.
8. 개인 정보의 기술적, 관리적 보호대책
① 기술적 대책
회사는 고객의 개인정보를 취급함에 있어 개인정보가 분실, 도난, 누출, 변도 또는 훼손되지 않도록 안정성 확보를 위하여 다음과 같은 기술적 대책을 강구하고 있습니다.

가. 고객의 개인정보는 비밀번호에 의해 보호되며, 파일 및 전송 데이터를 암호화하거나 파일 잠금기능(Lock)을 사용하여 중요한 데이터는 별도의 보안기능을 통해 보호되고 있습니다.
나. 회사는 백신프로그램을 이용하여 컴퓨터 바이러스에 의해 피해를 방지하기 위한 조치를 취하고 있습니다. 백신프로그램은 주기적으로 업데이트되며 갑작스런 바이러스가 출현할 경우 백신이 나오는 즉시 이를 제공함으로써 개인정보가 침해되는 것을 방지하고 있습니다.
다. 회사는 암호알고리즘을 이용하여 네트워크 상의 개인정보를 안전하게 전송할 수 있는 보안장치(SSL 또는 SET)를 채택하고 있습니다.
라. 해킹 등 외부 침입에 대비하여 각 서버마다 침입차단시스템 및 취약점 분석 시스템 등을 이용하여 보안에 만전을 기하고 있습니다.
② 관리적 대책
회사는 고객의 개인정보에 대한 접근권한을 최소한의 인원으로 제한하고 있습니다. 그 최소한의 인원에 해당하는 자는 다음과 같습니다.

- 이용자를 직접 상대로 하여 마케팅 업무를 수행하는 자
- 개인정보보호책임자 및 담당자 등 개인정보관리업무를 수행하는 자
- 기타 업무상 개인정보의 취급이 불가피한 자
- 개인정보를 취급하는 직원을 대상으로 새로운 보안 기술 습득 및 개인정보 보호 의무 등에 관해 정기적인 사내 교육 및 외부 위탁교육을 실시하고 있습니다.
- 입사 시 개인정보 관련 취급자의 보안서약서를 통하여 사람에 의한 정보유출을 사전에 방지하고 개인정보보호 정책에 대한 이행사항 및 직원의 준수여부를 감시하기 위한 내부절차를 마련하고 있습니다.
- 개인정보 관련 취급자의 업무 인수인계는 보안이 유지된 상태에서 철저하게 이뤄지고 있으며 입사 및 퇴사 후 개인정보 사고에 대한 책임을 명확화하고 있습니다.
- 개인정보와 일반 데이터를 혼합하여 보관하지 않고 별도로 분리하여 보관하고 있습니다.
9. 개인정보에 관한 민원 서비스
회사는 고객의 개인정보를 보호하고 개인정보와 관련한 불만을 처리하기 위하여 아래와 같이 관련 부서 및 개인정보관리책임자를 지정하고 있습니다.

- 관리책임자 : 임연희 파트장
- 소속 : 마케팅팀
- 주요업무 : 개인정보보호정책, 인터넷 회원, 서비스, 정보관리 총괄
- 이메일 : artisee@bonavie.co.kr (개인정보보호 담당부서로 연결됩니다.)
- 팩스 : 02-2155-5771
회원은 회사의 서비스를 이용하며 발생하는 모든 개인정보보호 관련 민원을 개인정보관리책임자 혹은 담당부서로 신고하실 수 있습니다. 회사는 이용자들의 신고사항에 대해 신속하게 충분한 답변을 드릴 것입니다.

현 개인정보취급방침은 2014년 4월 1일부터 적용되며, 법령, 정책 또는 보안기술의 변경에 따라 내용 추가, 삭제 및 수정이 있을 시에는 개정 최소 7일전부터 홈페이지의 ‘공지사항’을 통해 고지할 것입니다.

- 변경일자 : 2019년 1월 1일
- 시행일자 : 2019년 1월 1일</textarea>
            <!--fieldset class="contactForm_agree1">
            <label for="agree">개인정보처리방침안내의 내용에 동의합니다.</label>
            <input type="checkbox" name="agree" value="1" id="agree">
        </fieldset-->
        </section>

        <div id="contactForm_form" class="form_01">
            <div class="tbl_frm01 tbl_wrap">
                <ul>
                    <li>
                        <label for="contact_store" class="sound_only">방문매장 *</label>
                        <input type="text" class="frm_input email full_input required" id="contact_store" name="contact_store" title="Store" placeholder="방문매장">
                    </li>
<!--
                    <li>
                        <select name="con-type" id="con-type">
                            <option value="문의유형">문의유형</option>
                            <option value="서비스">서비스</option>
                            <option value="멤버십">멤버십</option>
                            <option value="제품">제품</option>
                            <option value="위생">위생</option>
                            <option value="기타">기타</option>
                        </select>
                    </li>
-->
                    <li>
                        <label for="contact_date" class="sound_only">날짜 *</label>
                        <input type="text" class="frm_input email full_input required" id="contact_date" name="contact_date" title="Date" placeholder="날짜">
                    </li>
                    <li>
                        <label for="contact_name" class="sound_only">이름 *</label>
                        <input type="text" class="frm_input email full_input required" id="contact_name" name="contact_name" title="Name" placeholder="이름">
                    </li>
                    <li>
                        <label for="contact_email" class="sound_only">이메일 *</label>
                        <input type="email" class="frm_input email full_input required" id="contact_email" name="contact_email" title="Email" placeholder="이메일">
                    </li>
                    <li>
                        <label for="contact_phone" class="sound_only">연락처</label>
                        <input type="email" class="frm_input email full_input required" id="contact_phone" name="contact_phone" title="Phone" placeholder="전화번호">
                    </li>
                    <li>
                        <label for="contact_subject" class="sound_only">제목 *</label>
                        <input type="email" class="frm_input email full_input required" id="contact_subject" name="contact_subject" title="Subject" placeholder="제목">
                    </li>
                    <li>
                        <label for="contact_message" class="sound_only">내용 *</label>
                        <textarea id="contact_message" name="contact_message" rows="10" title="Message" placeholder="내용을 입력하세요."></textarea>
                    </li>
                </ul>
                <fieldset class="contactForm_agree2">
                    <label for="agree">개인정보처리방침안내의 내용에 동의합니다.</label>
                    <input type="checkbox" name="agree" value="1" id="agree">
                </fieldset>
            </div>
        </div>

        <!-- MESSAGE SENT -->
        <div id="alertOk" class="alert alert-success fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <span id="alertOkResponse"><strong>Thank You!</strong> Message sent!.</span>
        </div>
        <!-- /MESSAGE SENT -->

        <!-- MESSAGE NOT SENT -->
        <div id="alertErr" class="alert alert-danger fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <span id="alertErrResponse">
                <!-- php output --><strong>Not Sent!</strong> Please complete all fields.</span>
        </div>
        <!-- MESSAGE NOT SENT -->

        <div class="btn_confirm">
            <input id="contact_submit" type="submit" class="btn_submit" value="접수하기">
        </div>

    </form>
</div>
<!-- CONTACT -->

<script type="text/javascript" src="../js/contact.js"></script>


<?php
include_once('../tail1.php');
?>
