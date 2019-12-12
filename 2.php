<?
$input = file_get_contents('./2.txt', FILE_USE_INCLUDE_PATH);

$test_input = "1,1,1,4,99,5,6,0,99";

$arr = preg_split("/,/", $input);

//faking manuaalteraapia :S
$arr[1] = 60;
$arr[2] = 86;

// echo count($arr);

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
      echo($m." | ".$n." = ".$arr[0]."</br>");


      // foreach ($arr as $key => $value) {
      //   echo($value.", ");
      //   // code...
      // }

    break;
  }
}








function add($pointer, $first, $second, $destination) {
  $result = $first + $second;

}




?>
