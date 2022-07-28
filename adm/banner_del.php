<?php
    header('Content-Type: text/html; charset=utf-8');
    $sub_menu = "100320";
    include_once('./_common.php');

    $domain = $_SERVER['SERVER_NAME'];
    $host = "localhost";
    $user = "root";
    $pw = "root";
    $dbName = "movie";

    $dbConnect = new mysqli($host, $user, $pw, $dbName);
    $dbConnect->set_charset("utf-8");
    $val = $_GET['id'];

    $sql = "DELETE FROM g5_write_notice WHERE wr_id = {$val}";

    $result = $dbConnect->query($sql);

    if($result){
        echo "<script>alert('삭제되었습니다.');location.href='main_banner.php';</script>";
    }
    
?>