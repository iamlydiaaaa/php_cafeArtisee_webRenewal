<?php
$sub_menu = '790100';
include_once('./_common.php');
include_once(G5_PLUGIN_PATH.'/counsel/config.php');
include_once(G5_PLUGIN_PATH.'/counsel/function.lib.php');

auth_check($auth[$sub_menu], "w");

if($mode=="999"){

    $sql="delete from {$g5['counsel_item_table']} where num='$mnum'";
    if(sql_query($sql)) goto_url("./counsel_sort.php", false);
    else alert('삭제하는 데 문제가 발생했습니다. 다시 시도해 주세요.','./counsel_sort.php');

}

if($mode=="820"){

    $sql = " select num,mno from {$g5['counsel_item_table']} where num='$mnum' ";
    $row = sql_fetch($sql);
    $mnoA = $row[mno];


    $sql = " select min(mno) as mno from {$g5['counsel_item_table']} where mno > '$mnoA' ";
    $row = sql_fetch($sql);
    $mnoB = $row[mno];
    if(strlen($mnoB) < 1 ){ alert("이동 범위를 초과 했습니다."); }


    $sql = " select num,mno from {$g5['counsel_item_table']} where mno='$mnoB' ";
    $row = sql_fetch($sql);
    $mnumB = $row[num];
    $mnoB = $row[mno];


    $sql1="update {$g5['counsel_item_table']} set mno='$mnoB' where num='$mnum' ";
    $sql2="update {$g5['counsel_item_table']} set mno='$mnoA' where num='$mnumB' ";
    if(sql_query($sql1) && sql_query($sql2)) goto_url("./counsel_sort.php", false);
    else alert('문제가 발생했습니다. 다시 시도해 주세요.','./counsel_sort.php');

}

if($mode=="810"){

    $sql = " select num,mno from {$g5['counsel_item_table']} where num='$mnum' ";
    $row = sql_fetch($sql);
    $mnoA = $row[mno];

    $sql = " select max(mno) as mno from {$g5['counsel_item_table']} where mno < '$mnoA' ";
    $row = sql_fetch($sql);
    $mnoB = $row[mno];
    if(strlen($mnoB) < 1 ){ alert("이동 범위를 초과 했습니다."); }

    $sql = " select num,mno from {$g5['counsel_item_table']} where mno='$mnoB' ";
    $row = sql_fetch($sql);
    $mnumB = $row[num];
    $mnoB = $row[mno];

    $sql1="update {$g5['counsel_item_table']} set mno='$mnoB' where num='$mnum' ";
    $sql2="update {$g5['counsel_item_table']} set mno='$mnoA' where num='$mnumB' ";
    if(sql_query($sql1) && sql_query($sql2)) goto_url("./counsel_sort.php", false);
    else alert('문제가 발생했습니다. 다시 시도해 주세요.','./counsel_sort.php');

}

$sql = " select num,mno,icode,iname from {$g5['counsel_item_table']} order by mno ";
$result = sql_query($sql);

$g5['title'] = '항목순서관리';
include_once ('./admin.head.php');

$colspan = 4;

?>
<form name="frm" id="frm" method="post" action="./counsel_sort.php">

<div class="btn_add01 btn_add">
    <a href="./counsel_config.php" id="bo_add">항목관리</a>
</div>

<div class="tbl_head01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?> 목록</caption>
    <thead>
    <tr>
        <th scope="col">순서</th>
        <th scope="col">항목이름</th>
        <th scope="col">이동</th>
        <th scope="col">관리</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++) {

        $bg  = 'bg'.($i%2);
		$k=$i+1 ;
    ?>

    <tr class="<?php echo $bg; ?>">
        <td class="td_mngsmall" style="text-align:center;"><?php echo $k; ?></td>
        <td><?php echo $row['iname']; ?></td>
        <td class="td_mngsmall">
			<a href="?mode=810&mnum=<?php echo $row['num']; ?>"><img src=img/up.gif border=0></a> | <a href="?mode=820&mnum=<?php echo $row['num']; ?>"><img src=img/down.gif border=0></a>
		</td>
        <td class="td_mngsmall">
            <a href="?mode=999&mnum=<?php echo $row['num']; ?>" onclick="return delete_confirm();">삭제</a>
        </td>
    </tr>

    <?php
    }

    if ($i == 0)
        echo '<tr><td colspan="'.$colspan.'" class="empty_table">자료가 없습니다.</td></tr>';
    ?>
    </tbody>
    </table>
</div>

</form>

<?php
include_once ('./admin.tail.php');
?>