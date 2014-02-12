<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=euc-kr" />
	<meta name="author" content="byGood" />

	<title>포트 매핑 프로그램</title>
</head>

<body>
입력된 절대 정보는 저장되지 않습니다.
<ol start="1">
	<li>입력된 정보는 <b><font color="red">절대</font></b> 저장되지 않습니다.</li>
	<li>사용해 보시고, 피드백 부탁드립니다. <a href="http://blog.netchk.com/?p=186">링크</a></li>
</ol>


<form action="proc.php" method="POST">
<table width="100%" border="1">
<tr>
	<td rowspan="2">L3장비</td>
	<td>IP Address</td>
    <td>snmp community</td>
</tr>
<tr>
	<td><input type="text" name="l3_ip" /></td>
	<td><input type="text" name="l3_comm" /></td>
</tr>
<br /><br />
<tr>
	<td rowspan="2">L2장비</td>
	<td>IP Address</td>
    <td>snmp community</td>
</tr>
<tr>
	<td><input type="text" name="l2_ip" /></td>
	<td><input type="text" name="l2_comm" /></td>
</tr>

<tr><td colspan="3" align="center">
<input type="submit" />
<input type="reset" />
</td></tr>



</table>
</form>


</body>
</html>