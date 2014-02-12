<?php
 //2차원 배열 뿌려주기
function array2($array2)
{
    $i=1;
    foreach($array2 as $val)
    {
        echo $i.'번째 배열';
        echo '<br />';
        
        foreach($val as $val2)
        {
            echo preg_replace("/\s+/","",$val2);
            echo '<br />';
        }
        $i++;
        echo '---------------------';
        echo '<br />';
    }

}

//16진수주소를 ip 주소로
function hex2ip($hex)
{ 
  return long2ip(base_convert($hex,16,10)); 
}

//공백 제거
function emptyDel($str)
{
return preg_replace("/\s+/","",$str);    
} 

//snmp 가져오기
function getTable($host, $comm, $oid, $numCols) 
{
    
	for ($j=1;$j<=$numCols;$j++)
    {
		$ret[$j-1] = snmp2_walk($host, $comm, "$oid.1.$j");
    }
    
    return $ret;

}


?>