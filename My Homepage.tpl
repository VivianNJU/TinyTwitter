
</html>
<!DOCTYPE html>
<html lang="en">
<head>

	<link rel="stylesheet" type="text/css" href="css/MyHomepage.css"></link>
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
		<img id="pic5" src="TwitterBorder2.png" />
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
				<td><p name="time" id="time">{$blog[blogNum].time}</p><p>{$blog[blogNum].content}</p></td>
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
<script type="text/javascript">
				    window.onload=function(){
    				var height=document.getElementById("content").offsetHeight;
    				document.getElementById("pic5").height=height-25;
    				document.getElementById("pic5").width="1195";
    				document.getElementById("pic6").top=height;
    			}
			</script>
			<img id="pic6" src="TwitterBorder3.png"/>
<!--<div class = 'content'>
    <img src="" height="100%" width="100%"/>
</div>
-->


</body>
</html>
<!--<!DOCTYPE html>
<html lang="en">
<head>
	
	<link rel="stylesheet" type="text/css" href="My Homepage.css"></link>
	<meta charset="UTF-8">
	<title>MY HOMEPAGE</title>
</head>
<body>
	<img id="pic1" src="My Tiny Twitter.png"/>
	<img id="pic2" src="paper plane2.png"/>
	<img id="pic3" src="portait.png"/>
	<img id="pic4" src="TwitterBorder1.png"/>
	<div class = 'link'><span><a href="TinyTwitter.html">SEND TWITTER</a></span>&nbsp;<span><a href="Log in.html">Log out</a></span>
	 	<hr></hr>
	</div>
    <div class="twitter">
    	<div class="content" id="content">
    		
    		<img id="pic5" src="TwitterBorder2.png" />
    			<table class="table" border="0" width="1075">
					<tr>
  						<td><p name="time" id="time">2016-4-16 20:40</p><p id="TwitterContent">Today is a nice day :) <br></p></td>
					</tr>
					<tr>
  						<td><p name="time" id="time">2016-4-16 20:40</p><p>WOW~!Delicious FOOOOOOOOD!</p></td>
					</tr>
					<tr>
  						<td><p name="time" id="time">2016-4-16 20:40</p><p>That movie is amazing~~!!!!</p></td>
					</tr>
					<tr>
  						<td><p name="time" id="time">2016-4-16 20:40</p><p>Try to talk more?</p></td>
					</tr>
					<tr>
  						<td><p name="time" id="time">2016-4-16 20:40</p><p>Try to talk more?</p></td>
					</tr>
					<tr>
  						<td><p name="time" id="time">2016-4-16 20:40</p><p>Try to talk more?</p></td>
					</tr>
				</table>
		</div>
	</div>
	<script type="text/javascript">
				    window.onload=function(){
    				var height=document.getElementById("content").offsetHeight;
    				document.getElementById("pic5").height=height-25;
    				document.getElementById("pic5").width="1195";
    				document.getElementById("pic6").top=height;
    			}
			</script>
	<img id="pic6" src="TwitterBorder3.png"/>
	 <div class = 'content'>
	 	<img src="" height="100%" width="100%"/>
	 </div>
	


</body>
	-->