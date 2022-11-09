<?php
/**************************************************************/
/* selectbox */
/**************************************************************/
function single_selectbox($opt_name, $opt_array, $opt_values, $opt_value, $required, $sel_ok=0 )  {

    $select_item = '';
    $select_item .= '<SELECT NAME="' . $opt_name . '"'.$required.' class="frm_input">';
	if($sel_ok) $select_item .= '<OPTION VALUE="">선택하세요.';
    for( $i = 0; $i < count( $opt_array ); $i++ ){
		if ( $opt_values[ $i ] == $opt_value ){
			$select_item .= '<OPTION VALUE="' . $opt_values[ $i ] . '" SELECTED>' . $opt_array[ $i ];
		} else {
			$select_item .= '<OPTION VALUE="' . $opt_values[ $i ] . '">' . $opt_array[ $i ];
		}
    }
    $select_item .= '</SELECT>';

	return $select_item;

}

/**************************************************************/
/* radiobox */
/**************************************************************/
function single_radiobox($opt_name, $opt_array, $opt_values, $opt_value, $spaces )  {

	$radio_item = '';
	for( $i = 0; $i < count( $opt_array ); $i++ ){
		if ( $opt_values[ $i ] == $opt_value ){
			$radio_item .= ' <input type=radio class=i_check NAME="'.$opt_name.'" VALUE="' . $opt_values[ $i ] . '" checked style="border:0;">' . $opt_array[ $i ];
		} else {
			$radio_item .= ' <input type=radio class=i_check NAME="'.$opt_name.'" VALUE="' . $opt_values[ $i ] . '" style="border:0;">' . $opt_array[ $i ];
		}
		if (($i+1)<count($opt_array)){ $radio_item .= $spaces; }
    }

	return $radio_item;
}


/**************************************************************/
/* checkbox */
/**************************************************************/
function single_checkbox($opt_name, $opt_array, $opt_values, $opt_value, $spaces )  {

	$check_item = '';
	for( $i = 0; $i < count( $opt_array ); $i++ ){
		if ( $opt_values[ $i ] == $opt_value[$i] ){
			$check_item .= ' <input type=checkbox class=i_check NAME="'.$opt_name.'['.$i.']" VALUE="' . $opt_values[ $i ] . '" checked style="border:0;">' . $opt_array[ $i ];
		} else {
			$check_item .= ' <input type=checkbox class=i_check NAME="'.$opt_name.'['.$i.']" VALUE="' . $opt_values[ $i ] . '" style="border:0;">' . $opt_array[ $i ];
		}
		if (($i+1)<count($opt_array)){ $check_item .= $spaces; }
	}

	return $check_item;
}

function DArray($code,$mdatas){
	$i=1;
	while($i<=30){
  		if(strlen($mdatas[$code][$i])>0){ $vars[$i-1]=$mdatas[$code][$i]; }
		else{ Break; }
  		$i++;
	}
	return $vars;
}

// 게시판을 SELECT 형식으로 얻음
function get_board_id_select($name, $selected="", $event="")
{
    global $g5;

    $sql = " select bo_table from {$g5['board_table']}";
    $result = sql_query($sql);
    $str = '<select id="'.$name.'" name="'.$name.'" '.$event.'><option value="">선택안함</option>';
    for ($i=0; $row=sql_fetch_array($result); $i++)
    {
        $str .= '<option value="'.$row['bo_table'].'"';
        if ($row['bo_table'] == $selected) $str .= ' selected';
        $str .= '>'.$row['bo_table'].'</option>';
    }
    $str .= '</select>';
    return $str;
}
?>
