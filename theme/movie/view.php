<?php
    include_once(G5_THEME_PATH.'/head.php');

    $domain = $_SERVER['SERVER_NAME'];
    $host = "localhost";
    $user = "root";
    $pw = "root";
    $dbName = "movie";

    $dbConnect = new mysqli($host, $user, $pw, $dbName);
    $dbConnect->set_charset("utf-8");

    $no = $_GET['id'];
    $sql = "SELECT * FROM g5_write_free WHERE wr_id = {$no}";
    $sql .= " ORDER BY wr_id DESC";
    $result = $dbConnect->query($sql);
    $row = mysqli_fetch_array($result);
?>
<div class="Writing_area">
    <div class="title title_2">
        <p>Review</p>
        <div class="container">
            <div class="a_wrap">
                <a href="review_modify.php?id=<?=$row['wr_id']?>" class="a_btn">수정</a>
                <a href="review_del.php?id=<?=$row['wr_id']?>" class="a_btn">삭제</a>
            </div>
        </div>
    </div>
    <div class="Writing_content">
        <div class="left_right_box_area">
            <form action="">
                <div class="container">
                    <div class="left_right_box">
                        <div class="left_box">
                            <div class="img_box">
                                <img src="<?=G5_IMG_URL?>/<?=$row['wr_name']?>.png" alt="<?=$row['wr_subject']?>">
                            </div>
                        </div>
                        <div class="right_box">
                            <div class="form">
                                <input type="text" value="<?=$row['wr_subject']?>" readonly>
                                <dl>
                                    <dt>날짜</dt>
                                    <dd><input type="date" id="start" value="<?=$row['wr_last']?>" readonly></dd>
                                    <p class="view_p_f" style="color: #fff;">평점 : <?=$row['wr_1']?> 점</p>
                                </dl>
                            </div>
                        </div>  
                    </div>                      
                    <div class="text_area_box">
                        <textarea name="" id="" readonly><?=$row['wr_content']?></textarea>
                    </div>
                    <div class="Completion_button">
                        <a href="./mypage_review.php">목록</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include_once(G5_THEME_PATH.'/tail.php');