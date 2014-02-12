<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=euc-kr" />
	<meta name="author" content="byGood" />

	<title>Port Mapping</title>
</head>

<body>


<form action="proc.php" method="POST">
<table width="100%" border="1">
<tr>
	<td rowspan="2">L3 Device(Router)</td>
	<td>IP Address</td>
    <td>snmp community</td>
</tr>
<tr>
	<td><input type="text" name="l3_ip" /></td>
	<td><input type="text" name="l3_comm" /></td>
</tr>
<br /><br />
<tr>
	<td rowspan="2">L2 Device(Switch)</td>
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