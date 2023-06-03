<?php
    require_once "../SimpleXLSXGen.php";
    $allKriteria = $_POST['kriteriaNames'];
    $allAlternatif = $_POST['alternatifNames'];

    $jum = count($allKriteria);
    $jum2 = count($allAlternatif);

    $arr = [];

    // Add the header row with criteria names starting from column 1
    $headerRow = [''];
    foreach ($allKriteria as $k) {
        array_push($headerRow, $k);
    }
    array_push($arr, $headerRow);

    // Loop through the alternatif and kriteria to populate the array
    for ($i = 0; $i < $jum2; $i++) {
        $tempArr = [];
        array_push($tempArr, $allAlternatif[$i]);

        for ($j = 0; $j < $jum; $j++) {
            $nilai = $_POST['nilaiValues'][$i * $jum + $j];
            array_push($tempArr, $nilai);
        }

        array_push($arr, $tempArr);
    }

    // Generate the Excel file
    $xlsx = Shuchkin\SimpleXLSXGen::fromArray($arr);
    $xlsx->saveAs('data.xlsx');
    header("Location: hasiltopsis.php");
?>
