<!DOCTYPE html>
<html lang="en">
<head>

	<link rel="stylesheet" type="text/css" href="My Homepage.css"></link>
	<meta charset="UTF-8">
	<title>MY HOMEPAGE</title>
</head>
<body>
<img id="pic1" src="/myProject/TinyTwitter/graphics/My Tiny Twitter.png"/>
<img id="pic2" src="/myProject/TinyTwitter/graphics/paper plane2.png"/>
<img id="pic3" src="/myProject/TinyTwitter/graphics/portait.png"/>

<div class = 'link'><a href="TinyTwitter.html">SEND TWITTER</a>
	<hr></hr>
</div>
<div class="twitter">
	<div class="content">
		<table class="table" border="0" width="1075">
			<!--<script>
                    var x=2;
                    for (var i=0;i<x;i++)
                        {
                    <tr>
                      <td><p name="time" id="time">2016-4-16 20:40</p><p>Today is a nice day :)</p></td>
                    </tr>
                        }
            </script>-->
			{section name=blogNum loop=$blog}
			<tr>
				<td><p{$time[blogNum]}</p><p>{$blog[blogNum]}</p></td>
			</tr>
			{/section}
			<!--<tr>
				<td><p name="time" id="time">2016-4-16 20:40</p><p>WOW~!Delicious FOOOOOOOOD!</p></td>
			</tr>
			<tr>
				<td><p name="time" id="time">2016-4-16 20:40</p><p>That movie is amazing~~!!!!</p></td>
			</tr>
			<tr>
				<td><p name="time" id="time">2016-4-16 20:40</p><p>Try to talk more?</p></td>
			</tr>-->
		</table>
	</div>
</div>
<!--<div class = 'content'>
    <img src="" height="100%" width="100%"/>
</div>
-->


</body>
</html>