<?
ini_set('memory_limit', '-1');

$test_input = file_get_contents('./3.txt', FILE_USE_INCLUDE_PATH);

$tests_input = "R8,U5,L5,D3";

//sisend on vaja teha pooleks peale reavahet, siis alles sisemiselt tükkideks
$arr = preg_split("/,/", $test_input);

$test_input  = explode("\n", $test_input);
foreach ($test_input as &$row) {
  $row = explode(',',$row);
}


foreach ($test_input as $key => $value) {
  print_R ($value);
  echo("</br>");

}


foreach ($test_input as &$row) {
  foreach ($row as &$value) {

    $value = str_split($value);

  }
}



foreach ($test_input as $key => $value) {
  foreach ($value as $kkey => $cvalue) {
    echo($cvalue);
  }


  echo("</br>");
}

?>
