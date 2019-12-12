<?
ini_set('memory_limit', '-1');

$input = file_get_contents('./3.txt', FILE_USE_INCLUDE_PATH);

$test_input = "1,1,1,4,99,5,6,0,99";

//sisend on vaja teha pooleks peale reavahet, siis alles sisemiselt tükkideks
$arr = preg_split("/,/", $input);

$input  = explode("\n", $input);
foreach ($input as &$row) {
  $row = explode(',',$row);
}

// print_r($input);

// print_r($arr);
$resultX = 0;
$resultY = 0;
$pointerX = 0;
$pointerY = 0;
$map = array();

foreach ($input[0] as $key => $value) {
  // echo ("</br>");
  switch ($value[0]) {
    case 'R':
    $arr_R = str_split($value);
    array_shift($arr_R);
    $arr_R = implode($arr_R);
    $map[$pointerY] = array_fill($pointerX, $arr_R, '1');
    $pointerX += $arr_R;
    break;
    case 'L':
    $arr_L = str_split($value);
    array_shift($arr_L);
    $arr_L = implode($arr_L);
    $map[$pointerY] = array_fill($pointerX-$arr_L, $pointerX, '1');
    $pointerY -= $arr_L;
    break;
    case 'U':
    $arr_U = str_split($value);
    array_shift($arr_U);
    $arr_U = implode($arr_U);
    $map[$pointerX] = array_fill($pointerY, $arr_U, '1');
    $pointerY += $arr_U;
    break;
    $arr_D = str_split($value);
    array_shift($arr_D);
    $arr_D = implode($arr_D);
    $map[$pointerY] = array_fill($pointerY-$arr_D, $pointerY, '1');
    $pointerY -= $arr_D;
    break;

  }
  // echo ($resultY);
  // echo ("</br>");

}

// foreach ($map as $key => $row) {
//   foreach ($row as $rowkey => $value) {
//
//   }
// }

$asi = array(
  array(1,2),
  array(3,4)
);

// test

foreach ($map as $row) {
  foreach ($row as $col) {
    if ($col==1) {
      echo(".");
    }
    else {
      echo("#");
    }
    // echo $col."_";
  }
  echo("</br>");// code...
}
?>
