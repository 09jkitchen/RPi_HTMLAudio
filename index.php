<!DOCTYPE html>
<html>
<head>
<title>TestTunes</title>
</head>
<body>

<audio id="myAudio" onended="randSong()" controls>
  <source src="" type="audio/mpeg">
</audio>
<button type="button" onclick="randSong()">Shuffle</button>
<br>
Now Playing:<span id="songTitle">SONG TITLE</span>
<div style="height:700px;overflow:auto">
<table border=1>
<?php

$songs = glob("usbdrv/Music/*.mp3");
$nums = sizeof($songs);
echo "Number of songs:<span id=\"numSongs\">$nums<span>";
$count = 0;
foreach ($songs as $song) {
   $count += 1;
   echo '<tr><td><span id="'.$count.'" onclick="loadSong(\''.$song.'\')">'.$song.'</span></td></tr>';
   }
?>
</table>
</div>
<script>
  var aud = document.getElementById("myAudio"); 
  function loadSong(name) {
    aud.src = name;
    aud.load();
    aud.play();
    document.getElementById("songTitle").innerText = name;
  }
  function randSong () {
    var max = document.getElementById("numSongs").innerText;
    var rndm = Math.floor(Math.random() * max) + 1;
    aud.src = document.getElementById(rndm).innerText;
    aud.load();
    aud.play();
    document.getElementById("songTitle").innerText = document.getElementById(rndm).innerText;
  }
</script>

</body>
</html>
