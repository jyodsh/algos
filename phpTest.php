<?php
 
// These are the tests we use to determine if the solution is correct.
// You can add your own at the bottom.

function myAtoi($s) {

  // Your actual logic goes here.

  // return value.

}

function printInteger($n) {
  echo "[". $n ."]";
}
function printIntegerList($arr) {
  $len = is_array($arr) ? count($arr) : strlen($arr);
  echo "[";
  for($i = 0; $i < $len; $i++){
    if($i !=0){
      echo ', ';
    }
    echo is_array($arr) ?  $arr[$i] :  $arr;
  }
  echo "]";

}

$test_case_number = 1;

function check($expected, $output) {
  global $test_case_number;
  $result = true;
  if($expected != $output) {
    $result = false;
  }
  $rightTick = '\u2713';
  $wrongTick = '\u2717';
  if ($result)  {
    echo json_decode('"'.$rightTick.'"');
    echo " Test #".$test_case_number ;
    echo "\n";
  }
  else {
    echo json_decode('"'.$wrongTick.'"');
    echo " Test #".$test_case_number. ": Expected ";
    printIntegerList($expected);
    echo " Your Output : ";
    printIntegerList($output);
    echo "\n";
  }
  $test_case_number += 1; 
}

$test_1 = "  -0K4";
$expected_1 = 0;
echo $output_1 = myAtoi($test_1);
check($expected_1, $output_1);


?>