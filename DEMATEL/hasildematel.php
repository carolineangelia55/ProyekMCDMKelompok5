<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: sans-serif;
      background-image: url('https://1.bp.blogspot.com/-T0gyhbYfCp8/XVYON45tcVI/AAAAAAAAEzs/bSPpjCqIggsu5ARPAiTGZurmlxn0xuotACEwYBhgL/s1600/background%2Bkuning-03.jpg');
      background-repeat: repeat;
    }

    .container {
      display: flex;
      align-items: flex-end;
    }

    .podium__item {
      width: 200px;
    }

    .podium__rank {
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 35px;
      color: #fff;
    }

    .podium__city {
      text-align: center;
      padding: 0 0.5rem;
    }

    .podium__number {
      width: 27px;
      height: 75px;
    }

    .podium .first {
      min-height: 300px;
      background: rgb(255, 172, 37);
      background: linear-gradient(
        333deg,
        rgba(255, 172, 37, 1) 0%,
        rgba(254, 207, 51, 1) 13%,
        rgba(254, 224, 51, 1) 53%,
        rgba(255, 172, 37, 1) 100%
      );
    }

    .podium .second {
      min-height: 200px;
      background: blue;
    }

    .podium .third {
      min-height: 100px;
      background: green;
    }

    .podium .fourth {
      min-height: 50px;
      background: orange;
    }

    #urutan {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 50%;
    margin-left: 400px;
    }

    #urutan td, #urutan th {
    border: 1px solid #ddd;
    padding: 8px;
    }

#urutan tr:nth-child(even){background-color: #f2f2f2;}

#urutan tr:hover {background-color: #ddd;}

    #urutan th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
   }

   table, th, td {
    width : 40%;
  border: 2px solid;
  margin-left:450px;
}
  </style>
</head>
<body>
  <p style="font-size: 27px; margin: right 100px; text-align:center;">
    <b> == Urutan Pengaruh Kriteria == <b>
  </p>
  <div class="container podium" style="margin-left: 400px;">
    <div class="podium__item">
      <p class="podium__city">Softskill</p>
      <div class="podium__rank second" style="color:black;">2</div>
    </div>
    <div class="podium__item">
      <p class="podium__city">Hardskill</p>
      <div class="podium__rank first">
        <svg class="podium__number" viewBox="0 0 27.476 75.03" xmlns="http://www.w3.org/2000/svg">
          <g transform="matrix(1, 0, 0, 1, 214.957736, -43.117417)">
            <path class="st8" d="M -198.928 43.419 C -200.528 47.919 -203.528 51.819 -207.828 55.219 C -210.528 57.319 -213.028 58.819 -215.428 60.019 L -215.428 72.819 C -210.328 70.619 -205.628 67.819 -201.628 64.119 L -201.628 117.219 L -187.528 117.219 L -187.528 43.419 L -198.928 43.419 L -198.928 43.419 Z" style="fill: #000;" />
          </g>
        </svg>
      </div>
    </div>
    <div class="podium__item">
      <p class="podium__city">Nilai Ujian</p>
      <div class="podium__rank third"style="color:black;">3</div>
    </div>
    <div class="podium__item">
      <p class="podium__city">Hasil tes</p>
      <div class="podium__rank fourth"style="color:black;">4</div>
    </div>
  </div>
   <br>
  <p style="font-size: 27px; margin: right 100px; text-align:center;">
    <b> == Identitas Setiap Kriteria == <b>
  </p>
  <table id="urutan">
  <tr>
    <th>Kriteria</th>
    <th>Identitas</th>
  </tr>
  <tr>
    <td>Hardskill</td>
    <td>Cause</td>
  </tr>
  <tr>
    <td>Softskill</td>
    <td>Effect</td>
  </tr>
  <tr>
    <td>Nilai Ujian</td>
    <td>Cause</td>
  </tr>
  <tr>
    <td>Hasil Tes</td>
    <td>Effect</td>
  </tr>
</table>
<p style="font-size: 27px; margin: right 130px; text-align:center;">
    <b> == Relasi yang memiliki pengaruh signifikan  == <b>
  </p>
  <table >
  <tr>
    <th>Kriteria</th>
    <th>Relasi</th>
    <th>Total Pengaruh</th>
  </tr>
  <tr>
    <td style="text-align:center;"><b>Hardskill</b> -> <b>Softskill</b></td>
    <td style="text-align:center;">YA</td>
    <td style="text-align:center;">3,8362728</td>
  </tr>
  <tr>
    <td style="text-align:center;"><b>Softskill</b> -> <b>Nilai Ujian</b></td>
    <td style="text-align:center;">YA</td>
    <td style="text-align:center;">2,7383735</td>
  </tr>
  <tr>
    <td style="text-align:center;"><b>Nilai Ujian</b> -> <b>Nilai Tes</b></td>
    <td style="text-align:center;">YA</td>
    <td style="text-align:center;">1,6758357</td>
  </tr>
</body>
</html>