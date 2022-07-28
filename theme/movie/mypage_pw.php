<?php
include_once('./_common.php');
// $password = get_encrypt_string($_POST['mb_password']);
$password = (!empty($_POST['mb_password'])) ? $_POST['mb_password'] : "";
$password2 = (!empty($_POST['mb_password_re'])) ? $_POST['mb_password_re'] : "";
$name = (!empty($_POST['name'])) ? $_POST['name'] : "";
$nick = (!empty($_POST['nick'])) ? $_POST['nick'] : "";
if(empty($password)):
    echo "<script>alert('비밀번호를 입력하세요.');history.back();</script>";
elseif(empty($password2)):
    echo "<script>alert('비밀번호 확인을 입력하세요.');history.back();</script>";
elseif(empty($name)):
    echo "<script>alert('이름을 입력하세요.');history.back();</script>";
elseif(empty($nick)):
    echo "<script>alert('닉네임을 입력하세요.');history.back();</script>";
elseif($password != $password2):
    echo "<script>alert('비밀번호가 틀립니다.');history.back();</script>";
else:
    $password = get_encrypt_string($password);
    $sql = " update g5_member set mb_password = '{$password}', mb_name = '{$name}', mb_nick = '{$nick}' where mb_id = '{$member['mb_id']}' ";
    
    sql_query($sql);
    echo "<script>alert('수정되었습니다.');history.back();</script>";
endif;
?>