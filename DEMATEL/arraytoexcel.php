<?php
    require_once "../SimpleXLSXGen.php";
    $allKriteria = $_POST['kriteriaNames'];
    $jum = count($allKriteria);
    $arr = [];
    $temp = [];
    array_push($temp, "");
    foreach ($allKriteria as $k) {
        array_push($temp, $k);
    }
    for ($i = 0; $i < $jum*$jum; $i++) {
        if ($i%$jum==0) {
            array_push($arr, $temp);
            $temp = [];
            array_push($temp, $allKriteria[$i/$jum]);
        }
        array_push($temp, $_POST['nilaiValues'][$i]);
    }
    array_push($arr, $temp);
    $xlsx = Shuchkin\SimpleXLSXGen::fromArray($arr);
    $xlsx->saveAs('data.xlsx');
    header("Location: hasildematel.php");
?>