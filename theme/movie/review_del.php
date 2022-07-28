<?php
include_once('./_common.php');
// $password = get_encrypt_string($_POST['mb_password']);
$id = (!empty($_GET['id'])) ? $_GET['id'] : "";

$sql = "DELETE FROM g5_write_free WHERE wr_id = {$id}";

// sql_query($sql);

if(sql_query($sql)){
    echo "<script>alert('삭제되었습니다.');location.href='./calendar.php';</script>";
}else{
    echo "fail";
}
?>