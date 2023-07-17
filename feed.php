<?
// echo "keyword is: " . $_POST['keyword'];
// $out = array();
// $out['html'] = "keyword is: " . $_POST['keyword'];
// $out['status'] = 5;



require_once('main.php');
$db = Db::getInstance();
$w = $_POST['keyword'];
$records = $db->doquery("select * from dic_word where word like '%$w%'");
$out['html'] = "";

foreach ($records as $record) {
    $out['html'] .= $record['word'] . "<br>";
}
echo json_encode($out);
