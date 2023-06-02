<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function() {
                $("#btnCreateTable").click(function() {
                    var baris = parseInt($("#inputbaris").val());
                    var kolom = parseInt($("#inputkolom").val());

                    var tableHtml = "<table>";

                    for (var i = 0; i < baris; i++) {
                        tableHtml += "<tr>";
                        for (var j = 0; j < kolom; j++) {
                            tableHtml += "<td><input type='text' name='data[" + i + "][" + j + "]' /></td>";
                        }
                        tableHtml += "</tr>";
                    }

                    tableHtml += "</table>";

                    $("#tableContainer").html(tableHtml);
                });
            });
        </script>
    </head>

    <body>
        <div class="contact-us">
            <p>
                == Keterangan == <br>
                1: Sangat Buruk <br>
                2: Buruk <br>
                3: Cukup <br>
                4: Baik <br>
                5: Sangat Baik
            </p>
            <br>
            <!-- <div>
                <label for="inputbaris">Jumlah Baris:</label>
                <input type="number" id="inputbaris" name="inputbaris">
            </div>
            <div>
                <label for="inputkolom">Jumlah Kolom:</label>
                <input type="number" id="inputkolom" name="inputkolom">
            </div>
            <button id="btnCreateTable" type="button">Buat Tabel</button>

            <form method="POST" action="proses.php">
                <div id="tableContainer"></div>
                <br>
                <button type="button" value="Submit">Submit</button>
            </form> -->
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $alternatif = $_POST['inputFieldAlternatif'];
                    $kriteria = $_POST['inputFieldKriteria'];
                
                    $jumlahAlternatif = count($alternatif);
                    $jumlahKriteria = count($kriteria);

                    echo '<form method="POST" action="penilaian.php">';
                    echo '<div id="tableContainer">';
                    echo '<table>';

                    // Header tabel
                    echo '<tr>';
                    echo '<th></th>'; // Kolom kosong pada pojok kiri atas
                    for ($k = 0; $k < $jumlahKriteria; $k++) {
                        $kriteria = $_POST['inputFieldKriteria'][$k];
                        echo "<th>$kriteria</th>";
                    }
                    echo '</tr>';

                    // Isi tabel
                    for ($i = 0; $i < $jumlahAlternatif; $i++) {
                        $alternatifName = $alternatif[$i];
                        echo '<tr>';
                        echo "<th>$alternatifName</th>";
                        for ($j = 0; $j < $jumlahKriteria; $j++) {
                        echo '<td><input type="text" name="nilai['.$i.']['.$j.']" class="textInput" required></td>';
                        }
                        echo '</tr>';
                    }

                    echo '</table>';
                    echo '</div>';
                    echo '<button type="submit" value="Submit">Submit</button>';
                    echo '</form>';
                }
            ?>
        </div>
    </body>
</html>
<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $data = $_POST["data"];

//     // Melakukan operasi atau aksi lain dengan data yang diterima
//     // Misalnya, menyimpan data ke database atau menampilkan hasilnya

//     // Contoh: Menampilkan data yang diterima
//     echo "<h2>Data yang Diterima:</h2>";
//     echo "<table>";
//     foreach ($data as $row) {
//         echo "<tr>";
//         foreach ($row as $cell) {
//             echo "<td>" . $cell . "</td>";
//         }
//     }
// }
?>