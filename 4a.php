<?

$start = 333332;
$stop = 700000;
$numbers = range($start,$stop);

// print_r($numbers);

echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";

// töötab vaid kuuekohalistega
function dowehaveadouble($input){
  for ($i=0; $i < 5; $i++) {
    if (substr($input, $i, 1)==substr($input, $i+1, 1)) {
      return true;
    }
  }
}

function isitincreasing($input){
  for ($i=0; $i < 5; $i++) {
    if ((substr($input, $i+1, 1)-substr($input, $i, 1))<0) {
      return false;
      break;
    }
  }
  return true;
}

function doublesonly($input){
  $res = array();
  for ($r=0; $r < 6; $r++) {
    $asi = substr($input, $r, 1);
    // echo "</br>";
    $res[$asi] += 1;
  }
  // print_r($res);
  // echo "</br>";

  foreach ($res as $key => $value) {
    // echo $value;
    // echo "</br>";

    if ($value == 2) {
      $result = true;
      break;
      return true;
    }
    else {
      $result = false;
    }

  }
  return $result;

}


// if (doublesonly(122233)) {
//   echo "jep";
// }
// else {
//   echo "ei";
// }
//


foreach ($numbers as $key => &$value) {

  if (!dowehaveadouble($value)) {
    unset($numbers[$key]);
  }

  elseif (!isitincreasing($value)) {
    unset($numbers[$key]);
  }

  elseif (!doublesonly($value)) {
    unset($numbers[$key]);
  }

}



// if (isitincreasing(334444)) {
//   echo "jes";
// }

// foreach ($numbers as $key => $value) {
//   echo $value;
//   echo "<br>";
// }

print_r($numbers);

echo count($numbers);

// echo $i;
// echo $numbers[55];

// 445559  445566 445577 445588  445666 445678 445679 445689 445888 445999 446667 446668 446669 446677 446688
?>
