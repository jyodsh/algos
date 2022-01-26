<?php

// Add any extra import statements you may need here

// Add any helper functions you may need here

 
function rotationalCipher($input, $rotation_factor) {
  $lc =  str_split('abcdefghijklmnopqrstuvwxyz');
  $uc = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
  $num = str_split('0123456789');
  $sarray = str_split($input);
  
   $cipher = '';
   foreach($sarray as $letter) {
     if(in_array($letter, $uc)){
       $index = array_search($letter,$uc);
       $cipher_in = $index + $rotation_factor ;
       $new_in = UpdatedIndex($cipher_in, 'alpha');
       $cipher .= $uc[$new_in];
     } elseif(in_array($letter, $lc)) {
       
       $index = array_search($letter,$lc);
       $cipher_in = $index + $rotation_factor ;
       $new_in = UpdatedIndex($cipher_in, 'alpha');
              $cipher .= $lc[$new_in];
     }
      elseif(in_array($letter, $num)) {
          
       $index = array_search($letter,$num);
       $cipher_in = $index + $rotation_factor ;
       $new_in = UpdatedIndex($cipher_in, 'num');
               $cipher .= $num[$new_in];
      } else {
                $cipher .= $letter;
      }
   }
   
  // Write your code here
  return $cipher;
}  
             
function UpdatedIndex($rotation_factor, $type) {
  
  if($type == 'alpha'){
       if($rotation_factor > 25) {
        $rf = $rotation_factor % 26;

      } else {
        $rf = $rotation_factor;
      }
   }
    if($type == 'num') {
      if($rotation_factor > 9 ) {
        $rf = $rotation_factor % 10;
                echo $rf . '-';
  
      } else {
        $rf = $rotation_factor;
      }
    }
    return $rf;
}        

// These are the tests we use to determine if the solution is correct.
// You can add your own at the bottom.

function printString($str) {
  echo "[\"". $str . "\"]";
}

$test_case_number = 1;

function check($expected, $output) {
  global $test_case_number;
  $result = true;
  if ($expected != $output) {
    $result = false;
  }
  $rightTick = '\u2713';
  $wrongTick = '\u2717';
  if ($result) {
    echo json_decode('"'.$rightTick.'"');
    echo " Test # ".$test_case_number ;
    echo "\n";
  }
  else {
    echo json_decode('"'.$wrongTick.'"');
    echo " Test # ".$test_case_number. ": Expected ";
    printString($expected);
    echo " Your Output : ";
    printString($output);
    echo "\n";
  }
  $test_case_number += 1;
}

$input_1 = "All-convoYs-9-be:Alert1.";
$rotation_factor_1 = 4;
$expected_1 = "Epp-gsrzsCw-3-fi:Epivx5.";
$output_1 = rotationalCipher($input_1, $rotation_factor_1);
check($expected_1, $output_1);

$input_2 = "abcdZXYzxy-999.@";
$rotation_factor_2 = 200;
$expected_2 = "stuvRPQrpq-999.@";
$output_2 = rotationalCipher($input_2, $rotation_factor_2);
check($expected_2, $output_2);
    
// Add your own test cases here

   
?>