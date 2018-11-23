<?php
//change input data for test
$input_data = 'S8D3HQS3CQ';
//get lenght of input string
$str_lenght = strlen($input_data);

/*
*Stores the number of appear of each poker card from the input
*$arr_count_value['rank'] => represents a Rank
*$arr_count_value['quantity'] => represents number of appear of each poker card
*/
$arr_count_value = [];

for($i = 0;$i < 10; $i+=2)
{
    if($input_data[$i] != 'S' && $input_data[$i] != 'H' && $input_data[$i] != 'D' && $input_data[$i] != 'C' || $str_lenght > 10){
        echo 'invalid data';
    } else {
        $temp['rank'] = $input_data[$i+1];
        $temp['quantity'] = 1;
        if(empty($arr_count_value)) {
            array_push($arr_count_value, $temp);
        }else{
            $check_exists = false;
            foreach($arr_count_value as $index => $data){
                if($temp['rank'] == $data['rank']){
                    $check_exists = true;
                    $arr_count_value[$index]['quantity'] += 1;
                }
            }
            if($check_exists == false){
                array_push($arr_count_value, $temp);
            }
        }
    }
}
$lenght_arr = count($arr_count_value);
switch($lenght_arr){
    case 5:
        echo '--';
        break;
    case 4:
        echo '1P';
        break;
    case 3:
        if($arr_count_value[0]['quantity'] == 3 || $arr_count_value[1]['quantity'] == 3 || $arr_count_value[2]['quantity'] == 3){
            echo '3C';
        }else{
            echo '2P';
        }
        break;
    case 2:
        if($arr_count_value[0]['quantity'] == 3 || $arr_count_value[1]['quantity'] == 3){
            echo 'FH';
        }else{
            echo '4C';
        }
        break;
    default:
        break;
}

