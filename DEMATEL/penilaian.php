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
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $alternatif = $_POST['inputFieldAlternatif'];
                    $kriteria = $_POST['inputFieldKriteria'];

                    $jumlahAlternatif = count($alternatif);
                    $jumlahKriteria = count($kriteria);

                    echo '<form method="POST" action="penilaian.php">';
                    echo '<div id="tableContainer">';
                    echo '<table>';

                    echo '<tr>';
                    echo '<th></th>';
                    for ($k = 0; $k < $jumlahKriteria; $k++) {
                        $kriteriaName = $kriteria[$k];
                        echo "<th>$kriteriaName</th>";
                    }
                    echo '</tr>';

                    for ($i = 0; $i < $jumlahAlternatif; $i++) {
                        $alternatifName = $alternatif[$i];
                        echo '<tr>';
                        echo "<th>$alternatifName</th>";
                        for ($j = 0; $j < $jumlahKriteria; $j++) {
                            $nilaiName = "nilai[$i][$j]";
                            echo '<td><input type="text" name="'.$nilaiName.'" class="textInput" required></td>';
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