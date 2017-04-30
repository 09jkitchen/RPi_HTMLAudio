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
<button type="button" id="reload" onclick="reload()">Reload</button>
<button type="button" id="shuffle" onclick="randSong()">Shuffle</button>
</td></tr></table>
<progress id="myProgress" value="0" max="100"></progress> <br>
Now Playing:<span id="songTitle" style="color:black">SONG TITLE</span>   <span id="buffer" style="color:black">Buffering</span>
<br>
<div style="height:700px;overflow:auto">
<table border=1>
<?php

$mp3s = glob("Music/*.mp3");
$m4as = glob("Music/*.m4a");
$songs = array_merge($mp3s, $m4as);
sort($songs);
$nums = sizeof($songs);
echo "Number of songs:<span id=\"numSongs\" style=\"color:black\">$nums<span>";
$count = 0;
foreach ($songs as $song) {
   $count += 1;
   $songO = $song;
   $song = addslashes($song);
   echo '<tr onclick="loadSong('.$count.',\''.$song.'\')"><td><span id="'.$count.'">'.$songO.'</span></td></tr>';
}
?>
</table>
</div>
<script>
  var aud = document.getElementById("myAudio");
  var prog = document.getElementById("myProgress");
  aud.addEventListener("canplaythrough", bufferThrough)
  aud.addEventListener("progress",progEvent);

  function bufferThrough()
  {
	  document.getElementById("buffer").innerText = "Should Buffer";
	  aud.play();
  }

  function progEvent()
  {
	  var duration = aud.duration;
	  var z = aud.buffered.end(aud.buffered.length-1);
	  var loaded = ((z / duration)*100).toFixed(0);
	  prog.value = loaded;
	  if (z == duration)
	  {
		  document.getElementById("buffer").innerText = "Finished Buffering";
	  }
  }

  function loadSong(id, name)
  {
	  aud.src = name;
	  aud.load();
	  document.getElementById("songTitle").innerText = name;
	  document.getElementById(id).style.color = "purple";
	  document.getElementById("buffer").innerText="Buffering";
  }
  function randSong () {
	  var max = document.getElementById("numSongs").innerText;
	  var rndm = Math.floor(Math.random() * max) + 1;
	  aud.src = document.getElementById(rndm).innerText;
	  aud.load();
	  document.getElementById("songTitle").innerText = document.getElementById(rndm).innerText;
	  document.getElementById(rndm).style.color = "purple";
	  document.getElementById("buffer").innerText = "Buffering";
  }

  function reload() {
    var currSrc = aud.currentSrc;
    aud.src = currSrc;
    aud.load();
    document.getElementById("buffer").innerText = "Buffering";
  }
</script>

</body>
</html>
