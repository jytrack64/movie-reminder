<?php
include_once('./_common.php');
// $password = get_encrypt_string($_POST['mb_password']);
$title = (!empty($_POST['title'])) ? $_POST['title'] : "";
$date = (!empty($_POST['date'])) ? $_POST['date'] : "";
$review = (!empty($_POST['review'])) ? $_POST['review'] : "";
$rating = (!empty($_POST['rating'])) ? $_POST['rating'] : "";

$ftmp = (!empty($_FILES['file']['tmp_name'])) ? $_FILES['file']['tmp_name'] : "";
$regTime = date('Y-m-d H:i:s');
$regTime2 = date('Y-m-d');
$list = explode('-', $date);
$month = $list[0].'-'.$list[1];
$rand = rand(1111111,9999999);
$file_name = $regTime2.$rand;
$myFile = "./img/{$file_name}.png";
move_uploaded_file($ftmp,$myFile);

if(empty($title)):
    echo "<script>alert('제목을 입력하세요.');history.back();</script>";
elseif(empty($date)):
    echo "<script>alert('날짜를 입력하세요.');history.back();</script>";
elseif(empty($review)):
    echo "<script>alert('리뷰를 작성해주세요.');history.back();</script>";
elseif(empty($ftmp)):
    echo "<script>alert('파일을 선택해주세요.');history.back();</script>";
else:

    $sql = "INSERT INTO g5_write_free(ca_name, wr_subject, wr_content, wr_name, wr_datetime, wr_last, wr_1, wr_2)";
    $sql .= " VALUES('{$member['mb_id']}', '{$title}', '{$review}', '{$file_name}','{$regTime}', '{$date}', '{$rating}', '{$month}');";
    
    // sql_query($sql);

    if(sql_query($sql)){
        echo "<script>alert('등록이 완료되었습니다.');location.href='./calendar.php';</script>";
    }else{
        echo "fail";
    }

endif;
?>