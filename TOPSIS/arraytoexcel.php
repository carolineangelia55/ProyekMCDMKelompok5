<?php
    require_once "../SimpleXLSXGen.php";
    $allKriteria = $_POST['kriteriaNames'];
    $allAlternatif = $_POST['alternatifNames'];
    $allWeights = $_POST['kriteriaWeights'];

    $jum = count($allKriteria);
    $jum2 = count($allAlternatif);

    $arr = [];       
    // Header row dari kolom 1
    $headerRow = [''];
    foreach ($allKriteria as $k) {
        array_push($headerRow, $k);
    }
    array_push($arr, $headerRow);

    // Loop alternatif dan kriteria utk isi array
    for ($i = 0; $i < $jum2; $i++) {
        $tempArr = [];
        array_push($tempArr, $allAlternatif[$i]);

        for ($j = 0; $j < $jum; $j++) {
            $nilai = $_POST['nilaiValues'][$i * $jum + $j];
            array_push($tempArr, $nilai);
        }

        array_push($arr, $tempArr);
    }

    // Add weights di last row 
    $weightRow = [''];
    foreach ($allWeights as $w) {
        array_push($weightRow, $w);
    }
    array_push($arr, $weightRow);

    $xlsx = Shuchkin\SimpleXLSXGen::fromArray($arr);
    $xlsx->saveAs('data.xlsx');
    header("Location: hasiltopsis.php?tujuan=".$_GET['tujuan']);
?>
