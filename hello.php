<?
$input = file_get_contents('./1a.txt', FILE_USE_INCLUDE_PATH);

$test_input = 100756;

function getMass($module){
  $mass = floor($module / 3) - 2;
  return $mass;
}


// esimene osa
// foreach ($arr as $key => $value) {
//   // echo ($value);
//   $numValue = (int)$value;
//   echo $numValue." => ".getMass($numValue);
//   echo("</br>");
//   $result += getMass($numValue);
// }
//

$arr = preg_split("/\n/", $input);


function getFinalMass($value){
  do {
    $result = getMass($value);
    $final += $result;
    $value = $result;
  } while (getMass($value) >= 0);
return $final;
}

foreach ($arr as $key => $value) {
  // echo ($value);
  $numValue = (int)$value;
  echo $numValue." => ".getFinalMass($numValue);
  echo("</br>");
  $vastus += getFinalMass($numValue);

// $vastus =  getFinalMass($rest);
}


echo ("vastus: ".$vastus);

?>
