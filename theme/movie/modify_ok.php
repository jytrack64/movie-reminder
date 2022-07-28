<?php
include_once('./_common.php');
// $password = get_encrypt_string($_POST['mb_password']);
$title = (!empty($_POST['title'])) ? $_POST['title'] : "";
$date = (!empty($_POST['date'])) ? $_POST['date'] : "";
$review = (!empty($_POST['review'])) ? $_POST['review'] : "";
$rating = (!empty($_POST['rating'])) ? $_POST['rating'] : "";
$wr_id = (!empty($_POST['h_wr_id'])) ? $_POST['h_wr_id'] : "";
$list = explode('-', $date);
$month = $list[0].'-'.$list[1];

if(!empty($_FILES['file']['tmp_name'])):
    $ftmp = (!empty($_FILES['file']['tmp_name'])) ? $_FILES['file']['tmp_name'] : "";
    $regTime = date('Y-m-d H:i:s');
    $regTime2 = date('Y-m-d');
    $regTime3 = date('Y-m');
    $rand = rand(1111111,9999999);
    $file_name = $regTime2.$rand;
    $myFile = "./img/{$file_name}.png";
    move_uploaded_file($ftmp,$myFile);

    $sql = "UPDATE g5_write_free SET wr_subject = '{$title}', wr_content = '{$review}', wr_name = '{$file_name}', wr_last = '{$date}', wr_1 = '{$rating}', wr_2 = '{$month}'  WHERE wr_id = {$wr_id}";
else:
    $sql = "UPDATE g5_write_free SET wr_subject = '{$title}', wr_content = '{$review}', wr_last = '{$date}', wr_1 = '{$rating}', wr_2 = '{$month}'  WHERE wr_id = {$wr_id}";
endif;
// sql_query($sql);

if(sql_query($sql)){
    echo "<script>alert('수정이 완료되었습니다.');location.href='./view.php?id=$wr_id';</script>";
}else{
    echo "fail";
}
?>