<?
ini_set('memory_limit', '-1');
$test_input = file_get_contents('./3.txt', FILE_USE_INCLUDE_PATH);
// $tests_input = "R8,U5,L5,D3";



// $example_a = "R8,U5,L5,D3";
// $example_b = "U7,R6,D4,L4";
//
$example_a = "R75,D30,R83,U83,L12,D49,R71,U7,L72";
$example_b = "U62,R66,U55,R34,D71,R55,D58,R83";
//
// $example_a = "R98,U47,R26,D63,R33,U87,L62,D20,R33,U53,R51";
// $example_b = "U98,R91,D20,R16,D67,R40,U7,R15,U6,R7";
//

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
$count = 0;

function sticks($input_array){
  $sticks = array();
  $location['x'] = 0;
  $location['y'] = 0;
  // echo gettype($input_array);
  foreach ($input_array as $key => $value) {
    $prev_location = $location;
    $location = cursor($location, $value);
    // echo ($location);
    array_push($sticks, array('x1' => $prev_location['x'], 'x2' => $location['x'], 'y1' => $prev_location['y'], 'y2' => $location['y']));
    $count++;
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


function nihe($arr, $steps){
$journey = 0;
  for ($i=0; $i < $steps; $i++) {
    if ($arr[$i]['x1'] == $arr[$i]['x2']) {
      $journey += (abs($arr[$i]['y2'] - $arr[$i]['y1']));
    }
    else {
      $journey += (abs($arr[$i]['x2'] - $arr[$i]['x1']));
    }

  }
  return $journey;
}

echo nihe($lines_0, 4);


// echo $lines_0[1]


echo "string";

echo "</br>";
echo "</br>";
echo "</br>";



$x_counter = 0;
$y_counter = 0;
$z_counter = 0;
$mitmes_joon = 0;

foreach ($lines_0 as $key_0 => $value_0) {
  // kohtumine y-teljel, x-d on samad
  if ($value_0['x1'] == $value_0['x2']) {
    foreach ($lines_1 as $key_1 => $value_1) {
      if ( ($value_1['x1'] <= $value_0['x1'] && $value_0['x1'] <= $value_1['x2']) && ($value_0['y1'] <= $value_1['y1'] && $value_1['y1'] <= $value_0['y2']) ) {
        $first = abs($value_0['x1']) + abs($value_1['y2']);
        echo ("jep: ".$value_0['x1']." ja ".$value_1['y2']." => ".$first);
        echo ("; pulgad ".($z_counter+1)." ja ".($y_counter+1));
        echo ", teekond x: ".nihe($lines_0, $z_counter)." teekond y:".nihe($lines_1, $y_counter)." kokku: ".(nihe($lines_0, $z_counter)+nihe($lines_1, $y_counter));
        echo ", viimane jupp: ".(abs($value_1['x2'] - $value_0['x2'])) . "+" .abs($value_0['y2'] - $value_1['y1']);
        echo ", kokku: ".(nihe($lines_0, $z_counter)+nihe($lines_1, $y_counter) + abs($value_1['x2'] - $value_0['x2'])  + abs($value_0['y2'] - $value_1['y1']));
        echo("<br>");
      }
      $y_counter++;
    }
  }
  // kohtumine x-teljel – y-d on samad
  elseif ($value_0['y1'] == $value_0['y2']) {
    foreach ($lines_1 as $key_1 => $value_1) {
      if ( ($value_0['x1'] <= $value_1['x1'] && $value_1['x1'] <= $value_0['x2']) && ($value_1['y1'] <= $value_0['y1'] && $value_0['y1'] <= $value_1['y2']) ) {
        $second = abs($value_1['x1']) + abs($value_0['y2']);
        echo ("jap: ".$value_1['x1']." ja ".$value_0['y2']." => ".$second);
        echo ("; pulgad ".($z_counter+1)." ja ".($y_counter+1));
        echo ", teekond x: ".nihe($lines_0, $z_counter)." teekond y:".nihe($lines_1, $y_counter)." kokku: ".(nihe($lines_0, $z_counter)+nihe($lines_1, $y_counter));
        echo ", viimane jupp: ".(abs($value_0['x2'] - $value_1['x1']). "+" .abs($value_1['y2'] - $value_0['y2']) );
        echo ", kokku: ".(nihe($lines_0, $z_counter)+nihe($lines_1, $y_counter) + (abs($value_1['x2'] - $value_0['x2'])) + abs($value_0['y2'] - $value_1['y1']));
        echo("<br>");
      }
      $y_counter++;

    }
  }
  $z_counter++;
  $y_counter = 0;


}


echo("____________________________________</br>");


// $im = imagecreatetruecolor(1000, 1000);
// $white = imagecolorallocate($im, 255, 255, 255);
// $red = imagecolorallocate($im, 0, 255, 255);


foreach ($lines_0 as $key => $value) {
  print_r($value);
  // imageline($im, $value['x1'], $value['y1'], $value['x2'], $value['y2'], $white);
  // imagepng($im, 'line.png');

  echo("</br>");
}
echo("</br>");


foreach ($lines_1   as $key => $value) {
  print_r($value);
  // imageline($im, $value['x1'], $value['y1'], $value['x2'], $value['y2'], $red);
  // imagepng($im, 'line.png');

  echo("</br>");
}








// Generate image resource with a width an height of 250 pixels.
// $im = imagecreatetruecolor(500, 500);

// Create a color.
// $white = imagecolorallocate($im, 255, 255, 255);

// Draw a white line from 50x,50y to 200x,150y.

// Write the image resource to a file called line.png.

// Destroy the image resource.
// imagedestroy($im);



?>
