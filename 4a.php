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

foreach ($numbers as $key => &$value) {

  if (!dowehaveadouble($value)) {
    unset($numbers[$key]);
  }

  elseif (!isitincreasing($value)) {
    unset($numbers[$key]);
  }

}



// if (isitincreasing(334444)) {
//   echo "jes";
// }


print_r($numbers);

// echo count($numbers);

// echo $i;
// echo $numbers[55];

?>
