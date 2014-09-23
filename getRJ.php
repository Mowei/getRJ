<?php
ini_set("display_errors", "OFF");

$rjname=$_GET['rjname'];
$nameflag=preg_match("/RJ\d{6}/", $rjname, $rjname);

if($nameflag){
$url = "http://www.dlsite.com/maniax/work/=/product_id/".$rjname[0];
} else{
$url = "http://www.dlsite.com/";
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="./js/jquery.min.js"></script>
</head>
<body>
	RJName:
	<input type="text" id="rjname" name="rjname"/>
	<input type="button" id="btnSend" value="送出"/>
	<br />
<?php

if($nameflag)
{
$lines_array = file($url);
$lines_string = implode('', $lines_array);

preg_match("/<span itemprop=\"brand\">(.*)<\/span><\/a>/", $lines_string, $group);
preg_match("/\">(.*)<\/a><\/td><\/tr>/", $lines_string, $date);
preg_match("/http:\/\/www.dlsite.com\/maniax\/work\/=\/product_id\/(.*).html\"/", $lines_string, $rjname);
preg_match("/id=\"work_name\">(.*)<\/h1>/", $lines_string, $name);

echo "	[$group[1]]";
echo "[".$date[1][2].$date[1][3].$date[1][7].$date[1][8].$date[1][12].$date[1][13]."]";
echo "[$rjname[1]]";
echo "$name[1]";
echo "</br>\n";
}
echo "	$url";
echo "</br>\n";
?>
	<iframe src="<?php echo $url; ?>" width="100%" height="90%" scrolling="yes" align="center" frameborder="no"></iframe>
</body>
<script type="text/javascript">
	$(document).ready(function()
	{
		$("#btnSend").click(onSendMessage);
	});
		
	function onSendMessage(e)
	{
		e.preventDefault();
		var $urlrj="?rjname="+$("#rjname").val();
		parent.window.location.replace($urlrj);
	}
</script>
</html>
