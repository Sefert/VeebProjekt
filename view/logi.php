<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 27/05/2017
 * Time: 23:20
 */
require_once('obj/ReadWrite.php');
$read = new ReadWrite();
$read->_setReadFile('log.txt');
$data=$read->_getFile();
//var_dump($data);
$used=array();
$user=array();
$ips=array();
$ip=array();
$count=count($data);
$counter=0;
echo '<div class="center mid autoheight lisa ">';
foreach ($data as $line_num => $line) {
    if (preg_match('/[|]*/', $line)) {
        if (isset($line)) {
            $split_line = explode("|", $line);
            if (isset($split_line[1])) {
                $used[$counter]=$split_line[0];
                $ips[$counter]=$split_line[1];
                echo '<p class="txt">E-post:' . $split_line[0] . '    IP:' . $split_line[1] . '    Kuupäev:' . $split_line[2] . '</p>';
            }
        }
    }
    $counter++;
}
for ($i = 0; $i< count($used); $i++) {
    if(!isset($user[$used[$i]]))
        $user[$used[$i]]=1;
    else
        $user[$used[$i]]++;
    if(!isset($ip[$ips[$i]]))
        $ip[$ips[$i]]=1;
    else
        $ip[$ips[$i]]++;
}
foreach ($user as $key => $value)
    echo '<p class="txt">Kasutaja ' . $key. '  logid: '. $value. '</p>';
foreach ($ip as $key => $value)
    echo '<p class="txt">IP ' . $key. '  logid: '. $value. '</p>';
echo '</div>';