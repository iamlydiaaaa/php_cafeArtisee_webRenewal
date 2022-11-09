<?php
include_once('./_common.php');

$g5['title'] = 'CONTACT US';
include_once('./_head6.php');
?>

<link href="css/style.css" rel="stylesheet" type="text/css" />

<!-- CONTACT -->
<div>

	<div class="container">
		<h1>CONTACT <span>US</span></h1>
		<p>홈페이지를 이용하시다가 궁금하신 점이 있으시면 언제든지 문의를 해주시기 바랍니다.</p>
	</div>

    <form name="contactForm" id="contactForm" action="php/contact.php" method="POST" autocomplete="off">

    <section id="contactForm_term">
        <h2>개인정보 수집 및 이용에 관한 동의</h2>
        <textarea class="agree_text" readonly>개인정보처리방침안내내용...</textarea>
        <!--fieldset class="contactForm_agree1">
            <label for="agree">개인정보처리방침안내의 내용에 동의합니다.</label>
            <input type="checkbox" name="agree" value="1" id="agree">
        </fieldset-->
    </section>

	<div id="contactForm_form"  class="form_01">
		<div class="tbl_frm01 tbl_wrap">
			<ul>
				<li>
					<label for="contact_name" class="sound_only">이름 *</label>
					<input type="text" class="frm_input email full_input required" id="contact_name" name="contact_name" title="Name" placeholder="Name">
				</li>
				<li>
					<label for="contact_email" class="sound_only">이메일 *</label>
					<input type="email" class="frm_input email full_input required" id="contact_email" name="contact_email" title="Email" placeholder="Email">
				</li>
				<li>
					<label for="contact_phone" class="sound_only">연락처</label>
					<input type="email" class="frm_input email full_input required" id="contact_phone" name="contact_phone" title="Phone" placeholder="Phone">
				</li>
				<li>
					<label for="contact_subject" class="sound_only">제목 *</label>
					<input type="email" class="frm_input email full_input required" id="contact_subject" name="contact_subject" title="Subject" placeholder="Subject">
				</li>
				<li>
					<label for="contact_message" class="sound_only">내용 *</label>
					<textarea id="contact_message" name="contact_message" rows="10" title="Message" placeholder="Message"></textarea>
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
		<span id="alertErrResponse"><!-- php output --><strong>Not Sent!</strong> Please complete all fields.</span>
	</div>
	<!-- MESSAGE NOT SENT -->

    <div class="btn_confirm">
        <input id="contact_submit" type="submit" class="btn_submit" value="SEND MESSAGE">
    </div>

    </form>
</div>
<!-- CONTACT -->

<script type="text/javascript" src="js/contact.js"></script>


<?php
include_once('./_tail.php');
?>