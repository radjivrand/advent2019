<?
ini_set('memory_limit', '-1');
$test_input = file_get_contents('./3.txt', FILE_USE_INCLUDE_PATH);
$tests_input = "R8,U5,L5,D3";

$example_a = "R8,U5,L5,D3";
$example_b = "U7,R6,D4,L4";


//sisend on vaja teha pooleks peale reavahet, siis alles sisemiselt tükkideks
$test_input  = explode("\n", $test_input);
$example_a  = explode("\n", $example_a);
$example_b  = explode("\n", $example_b);


// $arr_0 = preg_split("/,/", $test_input[0]);
// $arr_1 = preg_split("/,/", $test_input[1]);

$arr_0 = preg_split("/,/", $example_a[0]);
$arr_1 = preg_split("/,/", $example_b[0]);


function splitter($input){
  $direction = $input[0];
  $amount = (int)substr($input, 1);
  return $amount;
}

function cursor ($startsquare, $loc_string){
  $direction = $loc_string[0];
  $amount = (int)substr($loc_string, 1);
  switch ($direction) {
    case 'R':
    $startsquare['x'] += $amount;
    break;
    case 'L':
    $startsquare['x'] -= $amount;
    break;
    case 'U':
    $startsquare['y'] += $amount;
    break;
    case 'D':
    $startsquare['y'] -= $amount;
    break;
  }
  return $startsquare;
}

echo("<br>");
$lines = array();

function sticks($input_array){
  $sticks = array();
  $location['x'] = 0;
  $location['y'] = 0;
  $travel = 0;
  // echo gettype($input_array);
  foreach ($input_array as $key => $value) {
    $prev_location = $location;
    $location = cursor($location, $value);
    if ($prev_location['x'] == $location['x']) {
      $travel += abs($prev_location['y']-$location['y']);
    }
    else {
      $travel += abs($prev_location['x']-$location['x']);
    }


    array_push($sticks, array('x1' => $prev_location['x'], 'x2' => $location['x'], 'y1' => $prev_location['y'], 'y2' => $location['y'], 'travel' => $travel));
  }
  return $sticks;
}


$lines_0 = sticks($arr_0);
$lines_1 = sticks($arr_1);

function arrangeValues ($input_array){
  foreach ($input_array as &$value) {
    if ($value['x1'] > $value['x2']) {
      $temp = $value['x2'];
      $value['x2'] = $value['x1'];
      $value['x1'] = $temp;
    }
    if ($value['y1'] > $value['y2']) {
      $temp = $value['y2'];
      $value['y2'] = $value['y1'];
      $value['y1'] = $temp;
    }
  }
  return $input_array;
}


$lines_0 = arrangeValues($lines_0);
$lines_1 = arrangeValues($lines_1);



foreach ($lines_0 as $key_0 => $value_0) {
  if ($value_0['x1'] == $value_0['x2']) {
    foreach ($lines_1 as $key_1 => $value_1) {
      if ( ($value_1['x1'] <= $value_0['x1'] && $value_0['x1'] <= $value_1['x2']) && ($value_0['y1'] <= $value_1['y1'] && $value_1['y1'] <= $value_0['y2']) ) {
        $first = abs($value_0['x1']) + abs($value_1['y2']);

        print_r ($value_0);
        echo ("</br>");
        print_r ($value_1);

//arvutab kokku kogu teekonna. koguteekonnast on vaja maha lahutada need jupid, mis ulatuvad üle ristumiskoha.


        $journey = abs($value_1['travel']) + abs($value_0['travel']) - $shift_x - $shift_y;
        echo ("jep: ".$value_0['x1']." ja ".$value_1['y2']." => ".$first." ja travel = ".$journey);
        echo("<br>");
      }
    }
  }
  elseif ($value_0['y1'] == $value_0['y2']) {

    foreach ($lines_1 as $key_1 => $value_1) {
      if ( ($value_0['x1'] <= $value_1['x1'] && $value_1['x1'] <= $value_0['x2']) && ($value_1['y1'] <= $value_0['y1'] && $value_0['y1'] <= $value_1['y2']) ) {
        $second = abs($value_1['x1']) + abs($value_0['y2']);
        $journey = abs($value_1['travel']) + abs($value_0['travel']);
        echo ("jap: ".$value_1['x1']." ja ".$value_0['y2']." => ".$second." ja travel = ".$journey);
        echo("<br>");
      }
    }
  }
}


echo("____________________________________</br>");

foreach ($lines_0 as $key => $value) {
  print_r($value);
  echo("</br>");
}












?>
