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
                0: Tidak Ada Pengaruh<br>
                1: Pengaruh Sedikit <br>
                2: Pengaruh Sedang <br>
                3: Pengaruh Banyak <br>
                4: Pengaruh Sangat Banyak
            </p>
            <br>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $kriteria = $_POST['inputFieldKriteria'];
                    $jumlahKriteria = count($kriteria);

                    echo '<form method="POST" action="arraytoexcel.php">';
                    echo '<div id="tableContainer">';
                    echo '<table>';

                    echo '<tr>';
                    echo '<th></th>';

                    for ($k = 0; $k < $jumlahKriteria; $k++) {
                        $kriteriaName = $kriteria[$k];
                        echo "<th>$kriteriaName</th>";
                    }

                    echo '</tr>';

                    for ($i = 0; $i < $jumlahKriteria; $i++) {
                        $kriteriaName = $kriteria[$i];
                        echo '<tr>';
                        echo "<th>$kriteriaName</th>";
                        echo '<input type="hidden" name="kriteriaNames[]" class="textInput" value="'.$kriteriaName.'" required>';
                        for ($j = 0; $j < $jumlahKriteria; $j++) {
                            echo '<td><input type="text" name="nilaiValues[]" class="textInput" required></td>';
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