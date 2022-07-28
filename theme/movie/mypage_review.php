<?php
    include_once(G5_THEME_PATH.'/head.php');

    $domain = $_SERVER['SERVER_NAME'];
    $host = "localhost";
    $user = "root";
    $pw = "root";
    $dbName = "movie";

    $dbConnect = new mysqli($host, $user, $pw, $dbName);
    $dbConnect->set_charset("utf-8");

    $sql = "SELECT * FROM g5_write_free WHERE ca_name = '{$member['mb_id']}'";
    $sql .= " ORDER BY wr_id DESC";
    $result = $dbConnect->query($sql);
?>
<!-- my page -->
<div class="my_page">
    <div class="container">
        <div class="title title2">
            <div class="mb_name2">
                <p>My review</p>
            </div>
        </div>
        <div class="my_content">
            <div class="tap_menu_area">
                <ul>
                    <li><a href="./mypage.php">정보수정</a></li>
                    <li class=""><a href="./m_f_movie.php">이달의 영화</a></li>
                    <li class="on"><a href="./mypage_review.php">나의 리뷰</a></li>
                    <li><a href="./calendar.php">캘린더</a></li>
                </ul>
            </div>
            <div class="reviw_content">
                <ul>
                    <?php foreach($result as $row): ?>
                    <li>
                        <a href="./view.php?id=<?=$row['wr_id']?>">
                            <img src="<?=G5_IMG_URL?>/<?=$row['wr_name']?>.png" alt="<?=$row['wr_subject']?>">
                            <div class="dim_box">
                            <p>
                                <span><?=$row['wr_subject']?></span>
                                <span><?=$row['wr_1']?>점</span>
                                <span><?=$row['wr_content']?></span>
                            </p>
                            </div>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <a href="review_write.php" class="review_link">리뷰쓰기</a>
    </div>
</div>
<!-- my page end -->
<?php
include_once(G5_THEME_PATH.'/tail.php');