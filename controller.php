<?php

require_once($_SERVER['DOCUMENT_ROOT'] .'/mongoCon.php');

$model = new Model();
$_POST = json_decode(file_get_contents('php://input'), true);
$res = '';

switch ($_POST['event']) {
    case 'processor':
        foreach ($model->getItemByProcessor($_POST['processor']) as $item) {
            $res .= echoItem($item);
        }
        break;
    case 'software':
        foreach ($model->getItemBySoftware($_POST['software']) as $item) {
            $res .= echoItem($item);
        }
        break;
    case 'expired':
        foreach ($model->getItemByExpired($_POST['expired']) as $item) {
            $res .= echoItem($item);
        }
        break;
}

echo json_encode($res);


function echoItem($item) {
    $res = '<li>Processor: ' . $item['processor'] . 
    ';<br> Number: ' . $item['number'] .
    ';<br> Purchase date: ' . date("d.m.Y", intval($item['purchaseDate'])) .
    ';<br> Warranty expired date: ' . date("d.m.Y", intval($item['warrantyExpiredDate'])) .
    ';<br> RAM: ' . $item['RAM'] .
    ';<br> HDD: ' . $item['HDD'] .
    ';<br> Software: ';
    foreach ($item['software'] as $soft) {
        $res .= $soft . '; ';
    }
    $res .= '</li><br>';
    return $res;
}

?>