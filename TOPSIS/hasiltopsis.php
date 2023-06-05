<?php
    $command = escapeshellcmd('C:/Users/user/anaconda3-2022/python topsis.py');
    $output = shell_exec($command);
    $arr = json_decode($output);
    $arr = get_object_vars($arr);
?>

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
      background: purple;
    }

    .podium .third {
      min-height: 100px;
      background: pink;
    }


    #urutan {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 50%;

    }


    #urutan tr:nth-child(even){background-color: yellow;}

    #urutan tr:hover {background-color: white;}

        #urutan th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: grey;
        color: white;
      }
      
    table, th, td {
      width : 40%;
      border: 2px solid;
    }
  
    button {
    background: transparent;
    padding:10px 40px;
    size: 50px;
    font-weight: bold;
    border-radius: 5px;
    }
    button:hover {
      background-color: black;
      color: white;
    }
  </style>
</head>
<body>
  <p style="font-size: 27px; margin: right 100px; text-align:center;">
    <b> == Podium Hasil Penilaian == <b>
  </p>
  <h3 style="text-align:center">Tujuan: <?php echo $_GET['tujuan'];?></h3>
  <div class="container podium" style="justify-content: center;">
    <div class="podium__item">
      <p class="podium__city"><b><?php echo $arr['sorted_alternatives'][1]; ?></b> <br>Pref Value: <?php echo $arr['sorted_preference'][1]; ?></p>
      <div class="podium__rank second" style="color:black;">2</div>
    </div>
    <div class="podium__item">
      <p class="podium__city"><b><?php echo $arr['sorted_alternatives'][0]; ?> </b> <br>Pref Value: <?php echo $arr['sorted_preference'][0]; ?></p>
      <div class="podium__rank first">
        <svg class="podium__number" viewBox="0 0 27.476 75.03" xmlns="http://www.w3.org/2000/svg">
          <g transform="matrix(1, 0, 0, 1, 214.957736, -43.117417)">
            <path class="st8" d="M -198.928 43.419 C -200.528 47.919 -203.528 51.819 -207.828 55.219 C -210.528 57.319 -213.028 58.819 -215.428 60.019 L -215.428 72.819 C -210.328 70.619 -205.628 67.819 -201.628 64.119 L -201.628 117.219 L -187.528 117.219 L -187.528 43.419 L -198.928 43.419 L -198.928 43.419 Z" style="fill: #000;" />
          </g>
        </svg>
      </div>
    </div>

  <div class="podium__item">
      <p class="podium__city"><b> <?php if (isset($arr['sorted_alternatives'][2])) { echo $arr['sorted_alternatives'][2] .'</b> <br>Pref Value: '. $arr['sorted_preference'][2];} else { echo "None"; }; ?></p>
      <div class="podium__rank third"style="color:black;">3</div>
    </div>
  </div>


   <br>
  <div style="display: flex; align-items: center; justify-content: center;">
  <table id="urutan">
  <?php if (count($arr['sorted_alternatives']) > 3) {
    for ($x=3; $x<count($arr['sorted_alternatives']); $x++) { ?>
  <tr>
    <td style="text-align:center"><?php echo ($x+1)?></td>
    <td style="text-align:center"><?php echo $arr['sorted_alternatives'][$x] ?></td>
    <td style="text-align:center">Pref Value : <?php echo $arr['sorted_preference'][$x] ?></td>
  </tr>
  <?php } } ?>
</table>
    </div>

<br>
  <div style="display: flex; align-items: center; justify-content: center;">
    <button onclick="window.location = 'form.php'">Back</button>
  </div>

</body>
</html>