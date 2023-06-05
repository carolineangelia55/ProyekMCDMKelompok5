<!DOCTYPE html>
<html>
    <head>
        <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            
            function removeInputAlternatif(button) {
            var inputRow = button.parentNode.parentNode;
            var inputContainer = inputRow.parentNode;
            var inputRows = inputContainer.getElementsByClassName("inputRow");

            // Pastikan minimal dua input fields tersisa
            if (inputRows.length > 2) {
               inputContainer.removeChild(inputRow);
            } else {
                alert("Minimal dua kolom untuk input alternatif harus tersisa!");
            }
        }

            function removeInputKriteria(button) {
            var inputRow = button.parentNode.parentNode;
            var inputContainer = inputRow.parentNode;
            var inputRows = inputContainer.getElementsByClassName("inputRow");

            // Pastikan minimal dua input fields tersisa
            if (inputRows.length > 2) {
                inputContainer.removeChild(inputRow);
            } else {
                alert("Minimal dua kolom untuk input kriteria harus tersisa!");
            }
        }

            function addInputAlternatif() {
            var inputContainer = document.getElementById("inputContainerAlternatif");
            var inputRow = document.createElement("div");
            inputRow.className = "inputRow";
            inputRow.innerHTML = `
            <div style="position: relative; display: inline-block;">
                <input type="text" name="inputFieldAlternatif[]" class="textInput" placeholder="Input Alternatif" required style="padding-right: 37px;">
                <span style="position: absolute; top: 0; right: 0; padding-left: 18px; padding-top: 5px; font-size: 20px; color: black; cursor: pointer;" class="removeButton" onclick="removeInputAlternatif(this)">x</span>
            </div>
            `;
            inputContainer.appendChild(inputRow);
            }

            function addInputKriteria() {
            var inputContainer = document.getElementById("inputContainerKriteria");
            var inputRow = document.createElement("div");
            inputRow.className = "inputRow";
            inputRow.innerHTML = `
            <div style="position: relative; display: inline-block;">
                <input type="text" name="inputFieldKriteria[]" class="textInput" placeholder="Input Kriteria" required style="padding-right: 37px;">
                <span style="position: absolute; top: 0; right: 0; padding-left: 18px; padding-top: 5px; font-size: 20px; color: black; cursor: pointer;" class="removeButton" onclick="removeInputKriteria(this)">x</span>
            </div>
            `;
            inputContainer.appendChild(inputRow);
            }
        </script>
    </head>
    <body style="background-repeat: inherit">
    
        <div class="contact-us">
        <?php include_once "../navbar.php";?>
        <br><br>
            <p style="font-size: 20px; margin: right 40px;">
               <b> == Silahkan Isi Form dibawah ini : == <b>
            </p>
            <br>
            <br>
            <form method="POST" action="penilaian.php">
            <div>
                <div style="position: relative; display: inline-block;">
                <input type="text" id="inputtujuan" name="inputtujuan" placeholder="Tujuan" style="padding-right: 37px;">
            </div>
                <div id="inputContainerAlternatif">
                <!-- ALTERNATIF -->
                <div class="inputRow">
                <div style="position: relative; display: inline-block;">
                    <input type="text" name="inputFieldAlternatif[]" class="textInput" placeholder="Input Alternatif" required style="padding-right: 37px;">
                    <span style="position: absolute; top: 0; right: 0; padding-left: 18px; padding-top: 5px; font-size: 20px; color: black; cursor: pointer;" class="removeButton" onclick="removeInputAlternatif(this)">x</span>
                </div>
                </div>
                <div class="inputRow">
                <div style="position: relative; display: inline-block;">
                    <input type="text" name="inputFieldAlternatif[]" class="textInput" placeholder="Input Alternatif" required style="padding-right: 37px;">
                    <span style="position: absolute; top: 0; right: 0; padding-left: 18px; padding-top: 5px; font-size: 20px; color: black; cursor: pointer;" class="removeButton" onclick="removeInputAlternatif(this)">x</span>
                </div>
                </div>
                <div class="inputRow">
                <div style="position: relative; display: inline-block;">
                    <input type="text" name="inputFieldAlternatif[]" class="textInput" placeholder="Input Alternatif" required style="padding-right: 37px;">
                    <span style="position: absolute; top: 0; right: 0; padding-left: 18px; padding-top: 5px; font-size: 20px; color: black; cursor: pointer;" class="removeButton" onclick="removeInputAlternatif(this)">x</span>
                </div>
                </div>
                </div>
                <button type="submit" onclick="addInputAlternatif()">Add Alternatif</button><br><br> 

                <div id="inputContainerKriteria">
                <!-- NAMA KRITERIA -->
                <div class="inputRow">
                <div style="position: relative; display: inline-block;">
                    <input type="text" name="inputFieldKriteria[]" class="textInput" placeholder="Input Kriteria" required style="padding-right: 37px;">
                    <span style="position: absolute; top: 0; right: 0; padding-left: 18px; padding-top: 5px; font-size: 20px; color: black; cursor: pointer;" class="removeButton" onclick="removeInputKriteria(this)">x</span>
                </div>
                </div>
                <div class="inputRow">
                <div style="position: relative; display: inline-block;">
                    <input type="text" name="inputFieldKriteria[]" class="textInput" placeholder="Input Kriteria" required style="padding-right: 37px;">
                    <span style="position: absolute; top: 0; right: 0; padding-left: 18px; padding-top: 5px; font-size: 20px; color: black; cursor: pointer;" class="removeButton" onclick="removeInputKriteria(this)">x</span>
                </div>
                </div>
                <div class="inputRow">
                <div style="position: relative; display: inline-block;">
                    <input type="text" name="inputFieldKriteria[]" class="textInput" placeholder="Input Kriteria" required style="padding-right: 37px;">
                    <span style="position: absolute; top: 0; right: 0; padding-left: 18px; padding-top: 5px; font-size: 20px; color: black; cursor: pointer;" class="removeButton" onclick="removeInputKriteria(this)">x</span>
                </div>
                </div>
                </div>
                    <button type="submit" onclick="addInputKriteria()">Add Kriteria</button><br>
                    <div id="tableContainer"></div>
                    <button type="submit" value="Submit">Submit</button>        
                </div>
            </form>
        </div> 
    </body>
</html>