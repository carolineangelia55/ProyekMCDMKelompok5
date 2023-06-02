<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            function removeInputAlternatif(button) {
            var inputRow = button.parentNode;
            var inputContainer = inputRow.parentNode;
            var inputRows = inputContainer.getElementsByClassName("inputRow");

            // Ensure at least two input fields remain
            if (inputRows.length > 2) {
            inputContainer.removeChild(inputRow);
            }else {
            alert("Minimal dua baris harus tersisa!");
            }
            }

            function removeInputKriteria(button) {
            var inputRoww = button.parentNode;
            var inputContainer = inputRoww.parentNode;
            var inputRowss = inputContainer.getElementsByClassName("inputRoww");

            // Ensure at least two input fields remain
            if (inputRowss.length > 2) {
            inputContainer.removeChild(inputRoww);
            }else {
            alert("Minimal dua baris harus tersisa!");
            }
            }


            var inputCount = 0;

            function addInputAlternatif() {
            inputCount++;
            var inputContainer = document.getElementById("inputContainer");
            var inputRow = document.createElement("tr");
            inputRow.innerHTML = `
            <td>
            <div style="position: relative; display: inline-block;">
                <input type="text" name="inputFieldAlternatif${inputCount}" class="textInput" placeholder="Input Alternatif" required style="padding-right: 37px;"> 
                <span style="position: absolute; top: 0; right: 0; padding-left: 18px; padding-top: 5px; font-size: 20px; color: black; cursor: pointer;" class="removeButton" onclick="removeInputAlternatif(this)">x</span>
            </div>
            </td>
            `;
            inputContainer.insertBefore(inputRow, inputContainer.firstChild);
            }
            
            function addInputKriteria() {
            inputCount++;
            var inputContainer = document.getElementById("inputContainer");
            var inputRoww = document.createElement("tr");
            inputRoww.innerHTML = `
            <td>
            <div style="position: relative; display: inline-block;">
                <input type="text" name="inputFieldKriteria${inputCount}" class="textInput" placeholder="Input Kriteria" required style="padding-right: 37px;"> 
                <span style="position: absolute; top: 0; right: 0; padding-left: 18px; padding-top: 5px; font-size: 20px; color: black; cursor: pointer;" class="removeButton" onclick="removeInputKriteria(this)">x</span>
            </div>
            </td>
            `;
            inputContainer.insertBefore(inputRoww, inputContainer.firstChild);
            }

            </script>
    </head>
    <body>
        <div class="contact-us">
            <p style="font-size: 20px; margin: right 40px;">
               <b> == Silahkan Isi Form dibawah ini : == <b>
            </p>
            <br>
            <br>
            <div>
                <input type="text" id="inputtujuan" name="inputtujuan" placeholder="Tujuan">
            </div>
            <div id="inputContainer">
                <form method="POST" action="penilaian.php">
                    <!-- ALTERNATIF -->
                    <div class="inputRow">
                        <div style="position: relative; display: inline-block;">
                            <input type="text" name="inputFieldAlternatif[]" class="textInput"placeholder="Input Alternatif" required style="padding-right: 37px;">
                            <span style="position: absolute; top: 0; right: 0; padding-left: 18px; padding-top: 5px; font-size: 20px; color: black; cursor: pointer;"  class="removeButton" onclick="removeInputAlternatif(this)">x</span>
                        </div>
                    </div>
                    <div class="inputRow">
                        <div style="position: relative; display: inline-block;">
                            <input type="text" name="inputFieldAlternatif[]" class="textInput"placeholder="Input Alternatif" required style="padding-right: 37px;">
                            <span style="position: absolute; top: 0; right: 0; padding-left: 18px; padding-top: 5px; font-size: 20px; color: black; cursor: pointer;" class="removeButton" onclick="removeInputAlternatif(this)">x</span>
                        </div>
                    </div>
                    <div class="inputRow">
                        <div class="inputRow">
                            <div style="position: relative; display: inline-block;">
                                <input type="text" name="inputFieldAlternatif[]" class="textInput"placeholder="Input Alternatif" required style="padding-right: 37px;">
                                <span style="position: absolute; top: 0; right: 0; padding-left: 18px; padding-top: 5px; font-size: 20px; color: black; cursor: pointer;" class="removeButton" onclick="removeInputAlternatif(this)">x</span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" onclick="addInputAlternatif()">Add Alternatif</button><br><br>
                
                    <!-- NAMA KRITERIA -->
                    <div class="inputRoww">
                        <div style="position: relative; display: inline-block;">
                            <input type="text" name="inputFieldKriteria[]" class="textInput"placeholder="Input Kriteria" required style="padding-right: 37px;">
                            <span style="position: absolute; top: 0; right: 0; padding-left: 18px; padding-top: 5px; font-size: 20px; color: black; cursor: pointer;"  class="removeButton" onclick="removeInputKriteria(this)">x</span>
                        </div>
                    </div>
                    <div class="inputRoww">
                        <div style="position: relative; display: inline-block;">
                            <input type="text" name="inputFieldKriteria[]" class="textInput"placeholder="Input Kriteria" required style="padding-right: 37px;">
                            <span style="position: absolute; top: 0; right: 0; padding-left: 18px; padding-top: 5px; font-size: 20px; color: black; cursor: pointer;" class="removeButton" onclick="removeInputKriteria(this)">x</span>
                        </div>
                    </div>
                    <div class="inputRoww">
                        <div class="inputRoww">
                            <div style="position: relative; display: inline-block;">
                                <input type="text" name="inputFieldKriteria[]" class="textInput"placeholder="Input Kriteria" required style="padding-right: 37px;">
                                <span style="position: absolute; top: 0; right: 0; padding-left: 18px; padding-top: 5px; font-size: 20px; color: black; cursor: pointer;" class="removeButton" onclick="removeInputKriteria(this)">x</span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" onclick="addInputKriteria()">Add Kriteria</button><br>
                    <div id="tableContainer"></div>
                    <button type="submit" value="Submit">Submit</button>
                </form>
            </div>
        </div> 
    </body>
</html>