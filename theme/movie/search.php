<?php
    if (!defined('_INDEX_')) define('_INDEX_', true);
    if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

    include_once(G5_THEME_PATH.'/head.php');

    $domain = $_SERVER['SERVER_NAME'];
    $host = "localhost";
    $user = "root";
    $pw = "root";
    $dbName = "movie";

    $dbConnect = new mysqli($host, $user, $pw, $dbName);
    $dbConnect->set_charset("utf-8");

    $title = (!empty($_GET['title'])) ? $_GET['title'] : "";
    if(!empty($title)):
        $sql3 = "SELECT * FROM g5_write_free WHERE wr_subject LIKE '%{$title}%' AND ca_name = '{$member['mb_id']}'";
        $sql3 .= " ORDER BY wr_1 DESC";
        $result3 = $dbConnect->query($sql3);
        $count = mysqli_num_rows($result3);
        $wr_id = "";
        foreach($result3 as $row):
            $wr_id = (!empty($row['wr_id'])) ? $row['wr_id'] : "";
        endforeach;
    else:
        echo "<script>alert('검색어를 입력해주세요.'); history.back();</script>";
        $result3 = array();
    endif;
?>

    <!-- section1 -->
    <div class="section section1 section_new">
        <div class="container">
            <div class="title title_new">
                <?php if(!empty($wr_id)): ?>
                <p>'<?=$title?>' 검색결과 <?=$count?>개</p>
                <?php else: ?>
                <p class="search_none" style="margin-top: 15px;">'<?=$title?>' 검색결과가 없습니다.</p>
                <?php endif; ?>
            </div>
            <div class="reviw_content">
                <ul>
                    <?php foreach($result3 as $row): ?>
                    <li>
                        <a href="./view.php?id=<?=$row['wr_id']?>">
                            <img src="<?=G5_IMG_URL?>/<?=$row['wr_name']?>.png" alt="<?=$row['wr_subject']?>">
                            <div class="dim_box">
                            <p>
                                <span><?=$row['wr_subject']?></span>
                                <span><?=$row['wr_1']?>점</span>
                            </p>
                            </div>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php
include_once(G5_THEME_PATH.'/tail.php');