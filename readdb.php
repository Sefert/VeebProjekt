<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 30/04/2017
 * Time: 18:10
 */
    require_once('db/Database.php');
    $inquiry=new Database();
    $data=$inquiry->_getData();
    //var_dump($inquiry);
//    print("<pre>");
//    print_r($data);
//    print("</pre>");
    create_table($data);
//
function create_table(array $dataArr) {
    $html = '<table style="color: white">';
    $html .= '<tr>';
    foreach($dataArr[0] as $key=>$value){
        $html .= '<th>' . htmlspecialchars($key) . '</th>';
    }
    $html .= '</tr>';
    foreach($dataArr as $key=>$value){
        $html .= '<tr>';
        foreach($value as $key2=>$value2){
            $html .= '<td>' . htmlspecialchars($value2) . '</td>';
        }
        $html .= '</tr>';
    }
    $html .= '</table>';
    echo "<div class='center mid lisa'>" . $html . "</div>";
//    return $html;
//    foreach ($dataArr as $row)
//    {
//        foreach ($row as $key=>$value){
//           echo "<p style='color: white;'>" . $key . "=>" . $value . "</p>";
//        }
//    }
}

