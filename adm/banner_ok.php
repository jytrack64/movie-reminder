<?php
    include_once('./_common.php');
    header('Content-Type: text/html; charset=utf-8');
    
    $domain = $_SERVER['SERVER_NAME'];
    $host = "localhost";
    $user = "root";
    $pw = "root";
    $dbName = "movie";

        $dbConnect = new mysqli($host, $user, $pw, $dbName);
        $dbConnect->set_charset("utf-8");

        $title = (!empty($_POST['title'])) ? $_POST['title'] : "";
        $contents = (!empty($_POST['text'])) ? $_POST['text'] : "";
        $link = (!empty($_POST['link'])) ? $_POST['link'] : "";

        $ftmp = (!empty($_FILES['file']['tmp_name'])) ? $_FILES['file']['tmp_name'] : "";
        $regTime = date('Y-m-d H:i:s');
        $regTime2 = date('Y-m-d');
        $rand = rand(1111111,9999999);
        $file_name = $regTime2.$rand;
        $myFile = "../img/{$file_name}.png";
        move_uploaded_file($ftmp,$myFile);
        

        if(empty($ftmp)):
            echo "<script>alert('파일을 선택해주세요.');history.back();</script>";
        elseif(empty($title)):
            echo "<script>alert('영화 제목을 입력해주세요.');history.back();</script>";
        elseif(empty($contents)):
            echo "<script>alert('파일 내용을 입력해주세요.');history.back();</script>";
        elseif(empty($link)):
            echo "<script>alert('파일 링크을 입력해주세요.');history.back();</script>";
        else:
            $sql = "INSERT INTO g5_write_notice(ca_name, wr_subject, wr_content, wr_link1, wr_name, wr_datetime)";
            $sql .= " VALUES('관리자', '{$title}', '{$contents}', '{$link}', '{$file_name}','{$regTime}');";
            
            $result = $dbConnect->query($sql);
            print_r($result);
            if($result){
                echo "<script>alert('등록이 완료되었습니다.');location.href='./main_banner.php';</script>";
            }else{
                echo "fail";
            }
        endif;
?>