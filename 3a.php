<?
ini_set('memory_limit', '-1');
$test_input = file_get_contents('./3.txt', FILE_USE_INCLUDE_PATH);
$tests_input = "R8,U5,L5,D3";
//sisend on vaja teha pooleks peale reavahet, siis alles sisemiselt tükkideks
$test_input  = explode("\n", $test_input);

$arr = preg_split("/,/", $test_input[1]);

// vana kood
// $test_input  = explode("\n", $test_input);
// foreach ($test_input as &$row) {
//   $row = explode(',',$row);
// }
//

// print_r($test_input);

$location['x'] = 0+25000;
$location['y'] = 0+25000;
$a = array_fill(0, 50000, array_fill(0, 50000, 0));

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

print_r ($location);
echo("<br>");

foreach ($arr as $key => $value) {
  $prev_location = $location;
  $location = cursor($location, $value);
  if ($location['y'] == $prev_location['y'] ) {


    if ($location['x'] > $prev_location['x']) {
      for ($i=$prev_location; $i < $location; $i++) {
        // $a[$i][$location['y']] = 1;
        // echo ("#");
      }
      // print_r ($value);

    }
    else {
      // for ($i=$prev_location; $i < $location; $i--) {
      //   $a[$i][$location['y']] = 1;
      // }
    }




  }
  else {

    // echo ("y -> ");

  }


  echo("<br>");
}




?>
