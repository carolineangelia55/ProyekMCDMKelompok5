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

        echo '<form method="POST" action="arraytoexcel.php">';
        echo '<div id="tableContainer">';
        echo '<table>';
        echo '<tr>';
        echo '<th></th>';

        for ($i = 0; $i < $jumlahKriteria; $i++) {
            $kriteriaName = $kriteria[$i];
            echo "<th>$kriteriaName</th>";
            echo '<input type="hidden" name="kriteriaNames[]" class="textInput" value="'.$kriteriaName.'" required>';
        }

        echo '</tr>';

        for ($j = 0; $j < $jumlahAlternatif; $j++) {
            $alternatifName = $alternatif[$j];

            echo '<tr>';
            echo "<th>$alternatifName</th>";
            echo '<input type="hidden" name="alternatifNames[]" class="textInput" value="'.$alternatifName.'" required>';

            for ($k = 0; $k < $jumlahKriteria; $k++) {
                echo '<td><input type="text" name="nilaiValues[]" class="textInput" required></td>';
            }
            echo '</tr>';
        }

        echo '</table>';
        echo '</div>';

        // Input weight
        echo '<div id="weightContainer">';
        echo '<table>';
        echo "<th>Weight</th>";
        echo '<tr>';

        for ($l = 0; $l < $jumlahKriteria; $l++) {
            $kriteriaName = $kriteria[$l];
            echo '<td>
                    <input type="hidden" name="kriteriaWeights[]" class="textInput" required style="text-align:center" placeholder="'.$kriteriaName.'">;
                </td>';
        }

        echo '</tr>';
        echo '</table>';
        echo '</div>';

        echo '<button type="submit" value="Submit">Submit</button>';
        echo '</form>';
    }
?>


        </div>
    </body>
</html>