<?php
    $command = escapeshellcmd('C:/Users/user/anaconda3-2022/python dematel.py');
    $output = shell_exec($command);
    $arr = json_decode($output);
    $arr = get_object_vars($arr);
?>
<!DOCTYPE html>
<html>
<head>
<script src="//d3js.org/d3.v3.min.js"></script>
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
    margin-left: auto;
    margin-right: auto;
  }
  th {
    background-color: black;
    color: white;
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
  .link {
  fill: none;
  stroke: #666;
  stroke-width: 1.5px;
  }

  #licensing {
    fill: green;
  }

  .link.licensing {
    stroke: green;
  }

  .link.resolved {
    stroke-dasharray: 0,2 1;
  }

  circle {
    fill: #ccc;
    stroke: #333;
    stroke-width: 1.5px;
  }

  text {
    font: 10px sans-serif;
    pointer-events: none;
    text-shadow: 0 1px 0 #fff, 1px 0 0 #fff, 0 -1px 0 #fff, -1px 0 0 #fff;
  }
  </style>
</head>
<body>
  <script>
      var links = [
    <?php $count = 0;
    foreach ($arr['relasi'] as $data) { 
      if ($count!=0) {
        echo ", ";
      }
      echo '{source: "'.$data[0].'", target: "'.$data[1].'", type: "suit"}';
      $count = $count + 1;
    }
    ?>
  ];

  var nodes = {};

  // Compute the distinct nodes from the links.
  links.forEach(function(link) {
    link.source = nodes[link.source] || (nodes[link.source] = {name: link.source});
    link.target = nodes[link.target] || (nodes[link.target] = {name: link.target});
  });

  var width = 1280,
      height = 250;

  var force = d3.layout.force()
      .nodes(d3.values(nodes))
      .links(links)
      .size([width, height])
      .linkDistance(120)
      .charge(-300)
      .on("tick", tick)
      .start();

  var svg = d3.select("body").append("svg")
      .attr("width", width)
      .attr("height", height);

  // Per-type markers, as they don't inherit styles.
  svg.append("defs").selectAll("marker")
      .data(["suit", "licensing", "resolved"])
    .enter().append("marker")
      .attr("id", function(d) { return d; })
      .attr("viewBox", "0 -5 10 10")
      .attr("refX", 18)
      .attr("refY", -0.5)
      .attr("markerWidth", 12)
      .attr("markerHeight", 12)
      .attr("orient", "auto")
    .append("path")
      .attr("d", "M0,-5L10,0L0,5");

  var path = svg.append("g").selectAll("path")
      .data(force.links())
    .enter().append("path")
      .attr("class", function(d) { return "link " + d.type; })
      .attr("marker-end", function(d) { return "url(#" + d.type + ")"; });

  var circle = svg.append("g").selectAll("circle")
      .data(force.nodes())
    .enter().append("circle")
      .attr("r", 15)
      .call(force.drag);

  var text = svg.append("g").selectAll("text")
      .data(force.nodes())
    .enter().append("text")
      .attr("x", 8)
      .attr("y", ".31em")
      .text(function(d) { return d.name; });

  // Use elliptical arc path segments to doubly-encode directionality.
  function tick() {
    path.attr("d", linkArc);
    circle.attr("transform", transform);
    text.attr("transform", transform);
  }

  function linkArc(d) {
    var dx = d.target.x - d.source.x,
        dy = d.target.y - d.source.y,
        dr = Math.sqrt(dx * dx + dy * dy);
    return "M" + d.source.x + "," + d.source.y + "A" + dr + "," + dr + " 0 0,1 " + d.target.x + "," + d.target.y;
  }

  function transform(d) {
    return "translate(" + d.x + "," + d.y + ")";
  }
  </script>
  <p style="font-size: 27px; margin: right 100px; text-align:center;">
    <b> == Urutan Pengaruh Kriteria == <b>
  </p>
  <div class="container podium" style="justify-content: center;">
    <div class="podium__item">
      <p class="podium__city"><?php echo $arr['urutan'][1]; ?></p>
      <div class="podium__rank second" style="color:black;">2</div>
    </div>
    <div class="podium__item">
      <p class="podium__city"><?php echo $arr['urutan'][0]; ?></p>
      <div class="podium__rank first">
        <svg class="podium__number" viewBox="0 0 27.476 75.03" xmlns="http://www.w3.org/2000/svg">
          <g transform="matrix(1, 0, 0, 1, 214.957736, -43.117417)">
            <path class="st8" d="M -198.928 43.419 C -200.528 47.919 -203.528 51.819 -207.828 55.219 C -210.528 57.319 -213.028 58.819 -215.428 60.019 L -215.428 72.819 C -210.328 70.619 -205.628 67.819 -201.628 64.119 L -201.628 117.219 L -187.528 117.219 L -187.528 43.419 L -198.928 43.419 L -198.928 43.419 Z" style="fill: #000;" />
          </g>
        </svg>
      </div>
    </div>
    <div class="podium__item">
      <p class="podium__city"><?php if (isset($arr['urutan'][2])) { echo $arr['urutan'][2]; } else { echo "None"; }; ?></p>
      <div class="podium__rank third"style="color:black;">3</div>
    </div>
  </div>
  <?php if (count($arr['urutan']) > 3) { 
    for ($x=3; $x<count($arr['urutan']); $x++) { ?>
    <h3 style="font-size: 20px; margin-left: 30%;"><?php echo ($x+1).'. '.$arr['urutan'][$x]; ?></h3>
  <?php } } ?>
   <br>
  <p style="font-size: 27px;  text-align:center;">
    <b> == Identitas Setiap Kriteria == <b>
  </p>
  <table id="urutan">
  <tr>
    <th>Kriteria</th>
    <th>Identitas</th>
  </tr>
  <?php foreach ($arr['identitas'] as $data) { ?>
  <tr>
    <td><?php echo $data[0]; ?></td>
    <td><?php echo $data[1]; ?></td>
  </tr>
  <?php } ?>
</table>
<br>
<p style="font-size: 27px; margin: right 130px; text-align:center;">
    <b> == Relasi yang Memiliki Pengaruh Signifikan  == <b>
  </p>
  <table>
  <tr>
    <th>Hubungan Kriteria</th>
    <th>Perhitungan</th>
  </tr>
  <?php foreach ($arr['relasi'] as $data) { ?>
  <tr>
    <td style="text-align:center;"><b><?php echo $data[0]; ?></b> -> <b><?php echo $data[1]; ?></b></td>
    <td style="text-align:center;"><?php echo $data[2]; ?></td>
  </tr>
  <?php } ?>
  </table>
  <br>
  <div style="display: flex; align-items: center; justify-content: center;">
    <button onclick="window.location = 'form.php'">Back</button>
  </div>
</body>
</html>