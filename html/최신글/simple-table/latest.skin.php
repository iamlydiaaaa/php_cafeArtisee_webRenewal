<?php

if((int)$options < 1){
	$options = 4;
}

?>

<style>
table.latest-skin{
	width: 100%;
	border-collapse: collapse;
}
table.latest-skin > tbody > tr > td{
	width: <?php echo (100 / $options); ?>%;
	padding: 15px;
	border: 1px solid #EBEBEB;
}
table.latest-skin > tbody > tr > td:hover{
	background-color: #FAFAFA;
}
table.latest-skin > tbody > tr > td > a > h1 > span{
	display: inline-block;
	width: 70px;
	border-radius: 5px;
	background-color: #FF6600;
	color: #FFFFFF;
	font-weight: normal;
	line-height: 20px;
	text-align: center;
}
table.latest-skin > tbody > tr > td > a > h2{
	overflow: hidden;
	height: 42px;
	margin-top: 5px;
	font-size: 16px;
	font-weight: normal;
	word-break: break-all;
}
table.latest-skin > tbody > tr > td > a > h3{
	margin-top: 10px;
	font-weight: normal;
}
table.latest-skin > tbody > tr > td > a > h3 > i{
	margin-left: 20px;
}
table.latest-skin > tbody > tr > td > a > h3 > i:first-child{
	margin-left: 0px;
}
</style>

<table class="latest-skin">
	<tbody>
		<tr>
			<?php
			for($key = 0; $key < count($list); $key++){
				if($key > 0 && $key % $options == 0){
					echo '</tr><tr>';
				}
			?>
			<td>
				<a href="<?php echo $list[$key]['href']; ?>">
					<h1>
						<span><?php echo date('m월 d일', strtotime($list[$key]['wr_datetime'])); ?></span>
					</h1>
					<h2><?php echo $list[$key]['wr_subject']; ?></h2>
					<h3>
						<i class="fa fa-user"></i>
						<?php echo $list[$key]['wr_name']; ?>
						<i class="fa fa-comment"></i>
						<?php echo $list[$key]['wr_comment']; ?>
					</h3>
				</a>
			</td>
			<?php
			}
			if($key % $options > 0){
				echo str_repeat('<td>&nbsp;</td>', $options - ($key % $options));
			}
			?>
		</tr>
	</tbody>
</table>
