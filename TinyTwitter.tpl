
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/TinyTwitter.css"></link>
    <meta charset="UTF-8">
    <title>MY TINY TWITTER</title>
</head>
<body onload="PageInit()">
     <script>
      function countChar(textareaID,spanID,maxNum){
     var NowNum = document.getElementById(textareaID).value.length;
     if(NowNum>maxNum){
         document.getElementById(textareaID).value = document.getElementById(textareaID).value.substring(0,maxNum);
     }else{
         document.getElementById(spanID).innerHTML = NowNum;
         }
     }
     function SetLength(textareaID,spanID){
         var NowNum = document.getElementById(textareaID).value.length;
         document.getElementById(spanID).innerHTML = NowNum;
     }

     function PageInit(){
         SetLength('txtF_Content','counter');
     }
     </script>
<div class="sendTwitter">
    <div class = 'linkArea'>
        <div class="link">
            <span><a href="Register.html">Register</a></span>
            <span><a href="Log in.html">Log in</a></span>
            <span><a href="/myProject/TinyTwitter/MyHomepage.php">MY HOMEPAGE</a></span>
        </div>
        <hr></hr>
    </div>

    <img id="pic1" src="/myProject/TinyTwitter/graphics/Share.png"/>
    <form name = "textarea" action="/myProject/TinyTwitter/TinyTwitter.php" method="post">
        <div class='textarea'><br>
           <textarea z-index="4" type="text" class="text" name="textfield" cols="65" rows="8" spellcheck="false" placeholder="Hey, what happened today?Share with us!" autofocus tabindex="1" x-webkit-speech id="txtF_Content" runat="server" MaxLength="300" onkeydown="countChar('txtF_Content','counter',300);"onkeyup="countChar('txtF_Content','counter',500);"></textarea>
               <p>At most 300 characters, already <span SPAN id="counter" style="COLOR:red;FONT-WEIGHT:bold">0</span> characters<p>
            <!--placeholder="XXX" autofocus tabindex="1" x-webkit-speech用于悬浮
            -->
        </div>
        <div class='button'><p>{$articleErr}</p>
            <input id="send" type="submit" name="Submit" value="SEND" >
        </div>
    </form>
    <img id="pic2" src="/myProject/TinyTwitter/graphics/paper plane.png"/>
    <img id="pic3" src="/myProject/TinyTwitter/graphics/TwitterTextArea.png"/>
</div>

</body>
</html>