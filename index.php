<!DOCTYPE html>
<html>
<head>
<title>HTML Tunes</title>
<style>
span {
	color: blue;
}
</style>
</head>
<body>

<table style="vertical-align:middle">
<tr>
<td>
<audio id="myAudio" onended="randSong()" controls>
  <source src="" type="audio/mpeg">
</audio>
</td><td>
<button type="button" onclick="randSong()">Shuffle</button>
</td></tr></table>
Now Playing:<span id="songTitle" style="color:black">SONG TITLE</span>
<br>
<div style="height:700px;overflow:auto">
<table border=1>
<?php

$mp3s = glob("usbdrv/Music/*.mp3");
$m4as = glob("usbdrv/Music/*.m4a");
$songs = array_merge($mp3s, $m4as);
sort($songs);
$nums = sizeof($songs);
echo "Number of songs:<span id=\"numSongs\" style=\"color:black\">$nums<span>";
$count = 0;
foreach ($songs as $song) {
   $count += 1;
   $song = addslashes($song);
// echo '<tr><td><span id="'.$count.'" onclick="loadSong(\''.$song.'\')">'.$song.'</span></td></tr>';
   echo '<tr onclick="loadSong('.$count.',\''.$song.'\')"><td><span id="'.$count.'">'.$song.'</span></td></tr>'; 
}
?>
</table>
</div>
<script>
  var aud = document.getElementById("myAudio"); 
  function loadSong(id, name) {
    aud.src = name;
    aud.load();
    aud.play();
    document.getElementById("songTitle").innerText = name;
    document.getElementById(id).style.color = "purple";
  }
  function randSong () {
    var max = document.getElementById("numSongs").innerText;
    var rndm = Math.floor(Math.random() * max) + 1;
    aud.src = document.getElementById(rndm).innerText;
    aud.load();
    aud.play();
    document.getElementById("songTitle").innerText = document.getElementById(rndm).innerText;
    document.getElementById(rndm).style.color = "purple";
  }
</script>

</body>
</html>
