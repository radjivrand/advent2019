<?
$instr = file_get_contents('./5.txt', FILE_USE_INCLUDE_PATH);

$test_instr_0 = "1,0,0,0,99";
$test_instr_1 = "2,3,0,3,99";
$test_instr_2 = "2,4,4,5,99,0";
$test_instr_3 = "1,1,1,4,99,5,6,0,99";
$test_instr_4 = "1,9,10,3,2,3,11,0,99,30,40,50";

// $arr = preg_split("/,/", $input);
$arr = preg_split("/,/", $test_instr_3);


// faking manuaalteraapia :S
// $arr[1] = 60;
// $arr[2] = 86;

// foreach ($arr as $key => $value) {
//   echo $value;
//   echo "<br>";
// }

function modeSelector ($input){



}


foreach ($arr as $key => $value) {
  echo "element key: ".$key." => ".$value."<br>";
}

// echo ($arr[0] + $arr[3]);

//iga opcode on neljakohaline, sellest ka += 4
for ($i=0; $i < 160; $i += 4) {
  // echo($arr[$i].", ");
  switch ($arr[$i]) {

    // liitmine: number kohal A + number kohal B; summa kirjutatakse kohale C
    case 1:
      $arr[$arr[$i + 3]] = $arr[$arr[$i + 1]] + $arr[$arr[$i + 2]];
    break;

    // korrutamine: number kohal A + number kohal B; summa kirjutatakse kohale C
    case 2:
      $arr[$arr[$i + 3]] = $arr[$arr[$i + 1]] * $arr[$arr[$i + 2]];
    break;

    //võtab sisendist ühe integeri ja paneb selle kohta, mille ütleb parameeter
    case 3:
      $input = 1;
      $arr[$arr[$i + 3]] = $arr[$arr[$i + 1]] * $arr[$arr[$i + 2]];
    break;

    //annab väljundisse väärtuse parameetri öeldud aadressilt
    case 4:
      $arr[$arr[$i + 3]] = $arr[$arr[$i + 1]] * $arr[$arr[$i + 2]];
    break;


    // 99 tähendab, et kood lõpetab tegevuse. jääk lastakse ekraanile
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
// echo 60*100+86;

foreach ($arr as $key => $value) {
  echo "element key: ".$key." => ".$value."<br>";
}


// foreach ($arr as $key => $value) {
//   echo $value;
//   echo "<br>";
// }





?>
