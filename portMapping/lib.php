<?php
 //2���� �迭 �ѷ��ֱ�
function array2($array2)
{
    $i=1;
    foreach($array2 as $val)
    {
        echo $i.'��° �迭';
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

//16�����ּҸ� ip �ּҷ�
function hex2ip($hex)
{ 
  return long2ip(base_convert($hex,16,10)); 
}

//���� ����
function emptyDel($str)
{
return preg_replace("/\s+/","",$str);    
} 

//snmp ��������
function getTable($host, $comm, $oid, $numCols) 
{
    
	for ($j=1;$j<=$numCols;$j++)
    {
		$ret[$j-1] = snmp2_walk($host, $comm, "$oid.1.$j");
    }
    
    return $ret;

}


?>