<?
// echo "keyword is: " . $_POST['keyword'];
$out = array();
$out['html'] = "keyword is: " . $_POST['keyword'];
$out['status'] = 5;

echo json_encode($out);
