<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

include_once(G5_PLUGIN_PATH.'/counsel/config.php');
include_once(G5_PLUGIN_PATH.'/counsel/function.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

$vi_1_temp = explode("|", $view[wr_1]);
$data[zip]			= $vi_1_temp[0];
$data[addre1]		= $vi_1_temp[1];
$data[addre2]		= $vi_1_temp[2];
$data[addre3]		= $vi_1_temp[3];
$data[addr_jibeon]	= $vi_1_temp[4];

$vi_2_temp = explode("|", $view[wr_2]);
$data[ozip]		= $vi_2_temp[0];
$data[oaddre1]		= $vi_2_temp[1];
$data[oaddre2]		= $vi_2_temp[2];
$data[oaddre3]		= $vi_2_temp[3];
$data[oaddr_jibeon]	= $vi_2_temp[4];

$vi_3_temp = explode("」「", $view[wr_3]);
$tel_temp = explode("-", $vi_3_temp[0]);
$data[tel1]	= $tel_temp[0];
$data[tel2]	= $tel_temp[1];
$data[tel3]	= $tel_temp[2];

$hphone_temp = explode("-", $vi_3_temp[1]);
$data[hphone1]	= $hphone_temp[0];
$data[hphone2]	= $hphone_temp[1];
$data[hphone3]	= $hphone_temp[2];

$otel_temp = explode("-", $vi_3_temp[2]);
$data[otel1]	= $otel_temp[0];
$data[otel2]	= $otel_temp[1];
$data[otel3]	= $otel_temp[2];

$vi_4_temp = explode("」「", $view[wr_4]);
$data[sex]	= $vi_4_temp[0];
$data[rcid]	= $vi_4_temp[1];
$data[ename]	= $vi_4_temp[2];

$ymd_temp = explode("-", $vi_4_temp[3]);
$data[year]	= $ymd_temp[0];
$data[month]	= $ymd_temp[1];
$data[day]	= $ymd_temp[2];

$data[merry]	= $vi_4_temp[4];
$data[grade]	= $vi_4_temp[5];
$data[bizno]	= $vi_4_temp[6];
$data[emailok]	= $vi_4_temp[7];

$vi_5_temp = explode("」「", $view[wr_5]);
$data[job]	= $vi_5_temp[0];
$data[duty]	= $vi_5_temp[1];
$data[likes]	= $vi_5_temp[2];

$vi_6_temp = explode("」「", $view[wr_6]);
$data[input1]	= $vi_6_temp[0];
$data[input2]	= $vi_6_temp[1];
$data[input3]	= $vi_6_temp[2];
$data[input4]	= $vi_6_temp[3];
$data[input5]	= $vi_6_temp[4];
$data[input6]	= $vi_6_temp[5];

$vi_7_temp = explode("」「", $view[wr_7]);
$data[select1]	= $vi_7_temp[0];
$data[select2]	= $vi_7_temp[1];
$data[select3]	= $vi_7_temp[2];
$data[select4]	= $vi_7_temp[3];
$data[select5]	= $vi_7_temp[4];
$data[select6]	= $vi_7_temp[5];

$vi_8_temp = explode("」「", $view[wr_8]);
$data[radio1]	= $vi_8_temp[0];
$data[radio2]	= $vi_8_temp[1];
$data[radio3]	= $vi_8_temp[2];
$data[radio4]	= $vi_8_temp[3];
$data[radio5]	= $vi_8_temp[4];
$data[radio6]	= $vi_8_temp[5];

$vi_9_temp = explode("」「", $view[wr_9]);
$data[check1]	= explode("|", $vi_9_temp[0]);
$data[check2]	= explode("|", $vi_9_temp[1]);
$data[check3]	= explode("|", $vi_9_temp[2]);
$data[check4]	= explode("|", $vi_9_temp[3]);
$data[check5]	= explode("|", $vi_9_temp[4]);
$data[check6]	= explode("|", $vi_9_temp[5]);

$data[txt1]	= $view[wr_10];
$data[txt2]	= $view[wr_11];
$data[txt3]	= $view[wr_12];
$data[txt4]	= $view[wr_13];

$sql = " select * from {$g5['counsel_item_table']} order by mno ";
$result = sql_query($sql);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<!-- 게시물 읽기 시작 { -->
<div id="bo_v_table"><?php echo $board['bo_subject']; ?></div>

<article id="bo_v" style="width:<?php echo $width; ?>">
    <header>
        <h1 id="bo_v_title">
            <?php
            if ($category_name) echo $view['ca_name'].' | '; // 분류 출력 끝
            echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
            ?>
        </h1>
    </header>

    <section id="bo_v_info">
        <h2>페이지 정보</h2>
        작성자 <strong><?php echo $view['name'] ?><?php if ($is_ip_view) { echo "&nbsp;($ip)"; } ?></strong>
        <span class="sound_only">작성일</span><strong><?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?></strong>
        조회<strong><?php echo number_format($view['wr_hit']) ?>회</strong>
        댓글<strong><?php echo number_format($view['wr_comment']) ?>건</strong>
    </section>

	<?php
    if ($view['file']['count']) {
        $cnt = 0;
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view'])
                $cnt++;
        }
    }
     ?>

    <?php if($cnt) { ?>
    <!-- 첨부파일 시작 { -->
    <section id="bo_v_file">
        <h2>첨부파일</h2>
        <ul>
        <?php
        // 가변 파일
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
         ?>
            <li>
                <a href="<?php echo $view['file'][$i]['href'];  ?>" class="view_file_download">
                    <img src="<?php echo $board_skin_url ?>/img/icon_file.gif" alt="첨부">
                    <strong><?php echo $view['file'][$i]['source'] ?></strong>
                    <?php echo $view['file'][$i]['content'] ?> (<?php echo $view['file'][$i]['size'] ?>)
                </a>
                <span class="bo_v_file_cnt"><?php echo $view['file'][$i]['download'] ?>회 다운로드</span>
                <span>DATE : <?php echo $view['file'][$i]['datetime'] ?></span>
            </li>
        <?php
            }
        }
         ?>
        </ul>
    </section>
    <!-- } 첨부파일 끝 -->
    <?php } ?>

    <?php
    if ($view['link']) {
    ?>
     <!-- 관련링크 시작 { -->
    <section id="bo_v_link">
        <h2>관련링크</h2>
        <ul>
        <?php
        // 링크
        $cnt = 0;
        for ($i=1; $i<=count($view['link']); $i++) {
            if ($view['link'][$i]) {
                $cnt++;
                $link = cut_str($view['link'][$i], 70);
         ?>
            <li>
                <a href="<?php echo $view['link_href'][$i] ?>" target="_blank">
                    <img src="<?php echo $board_skin_url ?>/img/icon_link.gif" alt="관련링크">
                    <strong><?php echo $link ?></strong>
                </a>
                <span class="bo_v_link_cnt"><?php echo $view['link_hit'][$i] ?>회 연결</span>
            </li>
        <?php
            }
        }
         ?>
        </ul>
    </section>
    <!-- } 관련링크 끝 -->
    <?php } ?>

    <!-- 게시물 상단 버튼 시작 { -->
    <div id="bo_v_top">
        <?php
        ob_start();
         ?>
        <?php if ($prev_href || $next_href) { ?>
        <ul class="bo_v_nb">
            <?php if ($prev_href) { ?><li><a href="<?php echo $prev_href ?>" class="btn_b01">이전글</a></li><?php } ?>
            <?php if ($next_href) { ?><li><a href="<?php echo $next_href ?>" class="btn_b01">다음글</a></li><?php } ?>
        </ul>
        <?php } ?>

        <ul class="bo_v_com">
            <?php if ($update_href) { ?><li><a href="<?php echo $update_href ?>" class="btn_b01">수정</a></li><?php } ?>
            <?php if ($delete_href) { ?><li><a href="<?php echo $delete_href ?>" class="btn_b01" onclick="del(this.href); return false;">삭제</a></li><?php } ?>
            <?php if ($copy_href) { ?><li><a href="<?php echo $copy_href ?>" class="btn_admin" onclick="board_move(this.href); return false;">복사</a></li><?php } ?>
            <?php if ($move_href) { ?><li><a href="<?php echo $move_href ?>" class="btn_admin" onclick="board_move(this.href); return false;">이동</a></li><?php } ?>
            <?php if ($search_href) { ?><li><a href="<?php echo $search_href ?>" class="btn_b01">검색</a></li><?php } ?>
            <li><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></li>
            <?php if ($reply_href) { ?><li><a href="<?php echo $reply_href ?>" class="btn_b01">답변</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><?php } ?>
        </ul>
        <?php
        $link_buttons = ob_get_contents();
        ob_end_flush();
         ?>
    </div>
    <!-- } 게시물 상단 버튼 끝 -->

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <tbody>
		<?
		$mdatas = Array() ;
		for ($i=0; $row=sql_fetch_array($result); $i++) {

			$fvs=$row[icode];

			$mdatas[$fvs][icode]=trim($row[icode]);
			$mdatas[$fvs][iname]=trim(stripslashes($row[iname]));
			$mdatas[$fvs][size]=trim($row[size]);
			$mdatas[$fvs][size2]=trim($row[size2]);
			$mdatas[$fvs][editor]=trim($row[editor]);
			$mdatas[$fvs][bigo]=trim(stripslashes($row[bigo]));
			$mdatas[$fvs][type]=$row[type];
			$mdatas[$fvs][1]=trim(stripslashes($row[it1]));
			$mdatas[$fvs][2]=trim(stripslashes($row[it2]));
			$mdatas[$fvs][3]=trim(stripslashes($row[it3]));
			$mdatas[$fvs][4]=trim(stripslashes($row[it4]));
			$mdatas[$fvs][5]=trim(stripslashes($row[it5]));
			$mdatas[$fvs][6]=trim(stripslashes($row[it6]));
			$mdatas[$fvs][7]=trim(stripslashes($row[it7]));
			$mdatas[$fvs][8]=trim(stripslashes($row[it8]));
			$mdatas[$fvs][9]=trim(stripslashes($row[it9]));
			$mdatas[$fvs][10]=trim(stripslashes($row[it10]));
			$mdatas[$fvs][11]=trim(stripslashes($row[it11]));
			$mdatas[$fvs][12]=trim(stripslashes($row[it12]));
			$mdatas[$fvs][13]=trim(stripslashes($row[it13]));
			$mdatas[$fvs][14]=trim(stripslashes($row[it14]));
			$mdatas[$fvs][15]=trim(stripslashes($row[it15]));
			$mdatas[$fvs][16]=trim(stripslashes($row[it16]));
			$mdatas[$fvs][17]=trim(stripslashes($row[it17]));
			$mdatas[$fvs][18]=trim(stripslashes($row[it18]));
			$mdatas[$fvs][19]=trim(stripslashes($row[it19]));
			$mdatas[$fvs][20]=trim(stripslashes($row[it20]));
			$mdatas[$fvs][21]=trim(stripslashes($row[it21]));
			$mdatas[$fvs][22]=trim(stripslashes($row[it22]));
			$mdatas[$fvs][23]=trim(stripslashes($row[it23]));
			$mdatas[$fvs][24]=trim(stripslashes($row[it24]));
			$mdatas[$fvs][25]=trim(stripslashes($row[it25]));
			$mdatas[$fvs][26]=trim(stripslashes($row[it26]));
			$mdatas[$fvs][27]=trim(stripslashes($row[it27]));
			$mdatas[$fvs][28]=trim(stripslashes($row[it28]));
			$mdatas[$fvs][29]=trim(stripslashes($row[it29]));
			$mdatas[$fvs][30]=trim(stripslashes($row[it30]));

			switch($row[type]){
				case '0': //영문이름
					if($csconfig[$fvs]!='0'){
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>'.$data[$fvs].'</td>
					</tr>';
				} break;

				case '1': //셀렉트박스
					if($csconfig[$fvs]!='0'){
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>'.$data[$fvs].'</td>
					</tr>';
				} break;

				case '2': //텍스트
					if($csconfig[$fvs]!='0'){
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>'.$data[$fvs].'</td>
					</tr>';
				} break;

				case '3': //라디오
					if($csconfig[$fvs]!='0'){
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>'.$data[$fvs].'</td>
					</tr>';
				} break;

				case '4'://체크박스
					if($csconfig[$fvs]!='0'){

					$Arrays=DArray($fvs,$mdatas);
					$check_item = "";
					for( $i = 0; $i < count( $Arrays ); $i++ ){
						if ( $Arrays[ $i ] == $data[$fvs][$i] ){
						$check_item .= '<font color=red>' . $Arrays[ $i ] ."</font>&nbsp;&nbsp;";
						} else {
						$check_item .= $Arrays[ $i ]."</font>&nbsp;&nbsp;";
						}
					}
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>'.$check_item.'</td>
					</tr>';
				} break;

				case '5': //긴분장
					if($csconfig[$fvs]!='0'){

					$data[$fvs] = conv_content($data[$fvs], 2);

					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>'.get_view_thumbnail($data[$fvs]).'</td>
					</tr>';
				} break;

				case '21': //주소
					if($csconfig[$fvs]!='0'){
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>['.$data[zip].'] '.$data[addre1].''.$data[addre2].''.$data[addre3].'</td>
					</tr>';
				} break;

				case '22': //직장주소
					if($csconfig[$fvs]!='0'){
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>['.$data[ozip].'] '.$data[oaddre1].''.$data[oaddre2].''.$data[oaddre3].'</td>
					</tr>';
				} break;

				case '31': // 전화번호
					if($csconfig[$fvs]!='0'){
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>'.$data[tel1].' - '.$data[tel2].' - '.$data[tel3].'</td>
					</tr>';
				} break;

				case '32': // 직장전화번호
					if($csconfig[$fvs]!='0'){
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>'.$data[otel1].' - '.$data[otel2].' - '.$data[otel3].'</td>
					</tr>';
				} break;

				case '33': // 휴대폰번호
					if($csconfig[$fvs]!='0'){
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>'.$data[hphone1].' - '.$data[hphone2].' - '.$data[hphone3].'</td>
					</tr>';
				} break;

				case '41': //생년월일
					if($csconfig[$fvs]!='0'){
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>'.$data[year].'년 '.$data[month].'월 '.$data[day].'일</td>
					</tr>';
				} break;

				case '50'://추천인
					if($csconfig[$fvs]!='0'){
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>'.$data[$fvs].'</td>
					</tr>';
				} break;

				case '60': //메일수신여부
					if($csconfig[$fvs]!='0'){
					if($data[$fvs]=='1'){ $emailcheck='메일수신동의'; }else{ $emailcheck='메일수신동의하지 않음';}

					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>'.$emailcheck.'</td>
					</tr>';
				} break;

				case '70': //성별
					if($csconfig[$fvs]!='0'){
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>'.$data[$fvs].'</td>
					</tr>';
				} break;

				case '80': //사업자번호
					if($csconfig[$fvs]!='0'){
					echo '<tr>
						<th scope="row"><label for="wr_name">'.$mdatas[$fvs][iname].'</label></th>
						<td>'.$data[$fvs].'</td>
					</tr>';
				} break;

			}// end switch
			unset($needstr);
	    }
		?>
        </tbody>
        </table>
    </div>

    <section id="bo_v_atc">
        <h2 id="bo_v_atc_title">본문</h2>

        <?php
        // 파일 출력
        $v_img_count = count($view['file']);
        if($v_img_count) {
            echo "<div id=\"bo_v_img\">\n";

            for ($i=0; $i<=count($view['file']); $i++) {
                if ($view['file'][$i]['view']) {
                    //echo $view['file'][$i]['view'];
                    echo get_view_thumbnail($view['file'][$i]['view']);
                }
            }

            echo "</div>\n";
        }
         ?>

        <!-- 본문 내용 시작 { -->
        <div id="bo_v_con"><?php echo get_view_thumbnail($view['content']); ?></div>
        <?php//echo $view['rich_content']; // {이미지:0} 과 같은 코드를 사용할 경우 ?>
        <!-- } 본문 내용 끝 -->

        <?php if ($is_signature) { ?><p><?php echo $signature ?></p><?php } ?>

        <!-- 스크랩 추천 비추천 시작 { -->
        <?php if ($scrap_href || $good_href || $nogood_href) { ?>
        <div id="bo_v_act">
            <?php if ($scrap_href) { ?><a href="<?php echo $scrap_href;  ?>" target="_blank" class="btn_b01" onclick="win_scrap(this.href); return false;">스크랩</a><?php } ?>
            <?php if ($good_href) { ?>
            <span class="bo_v_act_gng">
                <a href="<?php echo $good_href.'&amp;'.$qstr ?>" id="good_button" class="btn_b01">추천 <strong><?php echo number_format($view['wr_good']) ?></strong></a>
                <b id="bo_v_act_good"></b>
            </span>
            <?php } ?>
            <?php if ($nogood_href) { ?>
            <span class="bo_v_act_gng">
                <a href="<?php echo $nogood_href.'&amp;'.$qstr ?>" id="nogood_button" class="btn_b01">비추천  <strong><?php echo number_format($view['wr_nogood']) ?></strong></a>
                <b id="bo_v_act_nogood"></b>
            </span>
            <?php } ?>
        </div>
        <?php } else {
            if($board['bo_use_good'] || $board['bo_use_nogood']) {
        ?>
        <div id="bo_v_act">
            <?php if($board['bo_use_good']) { ?><span>추천 <strong><?php echo number_format($view['wr_good']) ?></strong></span><?php } ?>
            <?php if($board['bo_use_nogood']) { ?><span>비추천 <strong><?php echo number_format($view['wr_nogood']) ?></strong></span><?php } ?>
        </div>
        <?php
            }
        }
        ?>
        <!-- } 스크랩 추천 비추천 끝 -->
    </section>

    <?php
    include_once(G5_SNS_PATH."/view.sns.skin.php");
    ?>

    <?php
    // 코멘트 입출력
    include_once(G5_BBS_PATH.'/view_comment.php');
     ?>

    <!-- 링크 버튼 시작 { -->
    <div id="bo_v_bot">
        <?php echo $link_buttons ?>
    </div>
    <!-- } 링크 버튼 끝 -->

</article>
<!-- } 게시판 읽기 끝 -->

<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
        var $tx;
        if(this.id == "good_button")
            $tx = $("#bo_v_act_good");
        else
            $tx = $("#bo_v_act_nogood");

        excute_good(this.href, $(this), $tx);
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();
});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}
</script>
<!-- } 게시글 읽기 끝 -->