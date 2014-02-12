<?php
include_once ('lib.php');
include_once ('config.php');


$switch_host=$_POST['l2_ip'];
$switch_community = $_POST['l2_comm'];
$route_host =  $_POST['l3_ip'];
$route_community = $_POST['l3_comm'];

if(!$switch_host){echo '<script type="text/javascript">alert("L2장비 주소가 없습니다.");history.back(-1);</script>';exit;}
if(!$switch_community){echo '<script type="text/javascript">alert("L2장비 snmp 커뮤니티가 없습니다..");history.back(-1);</script>';exit;}
if(!$route_host){echo '<script type="text/javascript">alert("L3장비 주소가 없습니다.");history.back(-1);</script>';exit;}
if(!$route_community){echo '<script type="text/javascript">alert("L3장비 snmp community가 없습니다..");history.back(-1);</script>';exit;}



$ifTable_arr = getTable($switch_host, $switch_community, $ifTable, 8); 
$atTable_arr = getTable($route_host, $route_community, $atTable, 3); //1.ifIndex 2.맥어드레스, 3.IP
$bTable_arr = getTable($switch_host, $switch_community, $bTable, 3);  //1맥어드레스,2포트,3status
$bTablePort_arr = getTable($switch_host, $switch_community, $bTablePort, 2); //1.basePort 2.ifIndex 포트


//3learned만 추출
for($i=0;$i<count($bTable_arr[2]);$i++)
{
    if($bTable_arr[2][$i]==3)//learned 만 실행
    {
        $bTableOnlyLearned[0][]=$bTable_arr[0][$i];
        $bTableOnlyLearned[1][]=$bTable_arr[1][$i];
        
    }
}

//포트 치환
for($i=0;$i<=count($bTableOnlyLearned[0]);$i++)
{
    for($j=0;$j<=count($bTablePort_arr[0]);$j++)
    {
        if($bTableOnlyLearned[1][$i]==$bTablePort_arr[0][$j])
        {
            $bTableOnlyLearned[1][$i]=$bTablePort_arr[1][$j];
            
        }
    }
}



for($i=0;$i<=count($atTable_arr[1]);$i++)
{
    for($j=0;$j<=count($bTableOnlyLearned[0]);$j++)
    {
        if($atTable_arr[1][$i]==$bTableOnlyLearned[0][$j])
        {

            //echo '<br />';
            $result[0][]=$bTableOnlyLearned[1][$j]; #포트넘버()ifIndex)
            $result[1][]=$atTable_arr[1][$i];   #MAC
            $result[2][]=hex2ip($atTable_arr[2][$i]); #IP
        }
    }
    
}

    
 ?>
    





<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=euc-kr" />
	<meta name="author" content="byGood" />

	<title>포트 매핑 프로그램</title>
</head>

<body>
<table border="1" width="100%">
<tr>
	<td>Interface Description</td>	<td>Status</td>	<td>Port Speed</td><td>MACs</td>	<td>IP</td>
</tr>

    
<?php


for($i=0;$i<=count($ifTable_arr[0]);$i++)
{

$desc=$ifTable_arr[1][$i];
$speed=$ifTable_arr[4][$i]/1000/1000;
    //링크 UP 체크
    if(($ifTable_arr[6][$i]=='up') and ($ifTable_arr[7][$i]=='up'))
	{
        $status='<font color="green">ON</font>';
	$count_on=$count_on+1;
	}
    else{
        $status='<font color="red">OFF</font>';
	}

?>
<tr>
	<td><?=$desc?></td>
	<td><?=$status?></td>
	<td><?=$speed?>M</td>
    <td>
    <?php
    
    //포트확인
    for($j=0;$j<=count($result[0]);$j++)
    {
        if($ifTable_arr[0][$i]==$result[0][$j])
        {
            echo $result[1][$j];
            echo '<br />';
                
        }
        
    }
    ?>
    </td>
    <td>
    <?php
    //포트확인
    for($j=0;$j<=count($result[0]);$j++)
    {
        if($ifTable_arr[0][$i]==$result[0][$j])
        {
            echo $result[2][$j];
            echo '<br />';
                
        }
    }    
    ?>
    </td>    
    
</tr>
    
<? }

#echo 'ON 포트: '.$count_on;
 ?>

</table>
</body>
</html>
