<html>
 <center>
  <h2>XSS IT!</h2>
   Rules :<br>
   No user interaction allowed<br>
   Callinag extranal .js files are forbidden<br>
   Show alert with challenge page full url<br>
   Using automated scanners is prohibited<br>
   Only modern browsers payloads accepted<br><br>
   <form action="" method="GET">
   <input style='width:210px' type="text" name="text" />
   <input type="submit" value="XSS IT!"/>
  </form>
<?php
error_reporting(0);
header("X-XSS-Protection: 0");
if($_GET["text"] ) {
	if (strlen($_GET["text"]) > 40) {
		echo "too long string!";
	}else{	
	    $blacklist = array("document.URL","document.documentURI","document.baseURI","window.location","document.domain","<script","<svg","<img","<a","<link","<video","<body","<iframe","<body","<style","<embed","<object","<details","<isindex","onload=","onerror=","onresize=","alert(","prompt(","confirm(","eval(","javascript:",".js");
	    echo "<input style='width:55px;border:none;' type='text' value='".str_replace($blacklist," [REMOVED] ",htmlspecialchars(strtolower($_GET["text"])))."'/> has sent by you.";}
	}
?>
 </center>
</html>
