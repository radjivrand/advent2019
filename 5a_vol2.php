<?
$instr = file_get_contents('./5.txt', FILE_USE_INCLUDE_PATH);

$arr = preg_split("/,/", $instr);


// foreach ($arr as $key => $value) {
//   echo "key: ".$key." => ".$value."<br>";
// }

$pointer = 0;

// while ($pointer <= 10) {
//   // code...
// }

$input = 1;

for ($i=0; $i < 40; $i++) {

  switch ($arr[$pointer]) {

    // liitmine: number kohal A + number kohal B; summa kirjutatakse kohale C
    case 1:
      echo "case 1<br>";
      echo "arr[pointer]: ".$arr[$arr[$pointer + 3]]."<br>";
      echo "string".$arr[225];
      $arr[$arr[$pointer + 3]] = $arr[$arr[$pointer + 1]] + $arr[$arr[$pointer + 2]];
      $pointer +=4;

    break;

    // korrutamine: number kohal A + number kohal B; summa kirjutatakse kohale C
    case 2:
      echo "case 2<br>";
      $arr[$arr[$pointer + 3]] = $arr[$arr[$pointer + 1]] * $arr[$arr[$pointer + 2]];

      $pointer +=4;
    break;

    //võtab sisendist ühe integeri ja paneb selle kohta, mille ütleb parameeter
    case 3:
    echo "case 3<br>";
      $arr[$arr[$pointer+1]] = $input;
      $pointer +=2;
    break;

    //annab väljundisse väärtuse parameetri öeldud aadressilt
    case 4:
    echo "case 4<br>";
      $output = $arr[$pointer+1];
      $pointer +=2;
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


?>
