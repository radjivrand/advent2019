<?
$input = file_get_contents('./2.txt', FILE_USE_INCLUDE_PATH);

$test_input_0 = "1,0,0,0,99";
$test_input_1 = "2,3,0,3,99";
$test_input_2 = "2,4,4,5,99,0";
$test_input_3 = "1,1,1,4,99,5,6,0,99";

$arr = preg_split("/,/", $input);

// faking manuaalteraapia :S
$arr[1] = 60;
$arr[2] = 86;

// foreach ($arr as $key => $value) {
//   echo $value;
//   echo "<br>";
// }


// echo ($arr[0] + $arr[3]);

for ($i=0; $i < 160; $i += 4) {
  // echo($arr[$i].", ");
  switch ($arr[$i]) {
    case 1:
      $arr[$arr[$i + 3]] = $arr[$arr[$i + 1]] + $arr[$arr[$i + 2]];
    break;
    case 2:
      $arr[$arr[$i + 3]] = $arr[$arr[$i + 1]] * $arr[$arr[$i + 2]];
    break;
    case 99:
      echo("result: ".$arr[0]."</br>");


      // foreach ($arr as $key => $value) {
      //   echo($value.", ");
      //   // code...
      // }

    break;
  }
}

echo "______________";
echo "<br>";
echo 60*100+86;

// foreach ($arr as $key => $value) {
//   echo $value;
//   echo "<br>";
// }





?>
