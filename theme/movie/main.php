<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.php');
/***
 * 테이블 정보
 * 
 * g5_write_free -> 이달의 영화
 * g5_write_gallery -> 개봉 예정작
 * g5_write_notice -> 메인 배너
 */
    $domain = $_SERVER['SERVER_NAME'];
    $host = "localhost";
    $user = "root";
    $pw = "root";
    $dbName = "movie";

	$regTime = date('Y-m'); // 2021-10

    $dbConnect = new mysqli($host, $user, $pw, $dbName);
    $dbConnect->set_charset("utf-8");

    $sql = "SELECT * FROM g5_write_notice";
    $sql .= " ORDER BY wr_id DESC";
    $result = $dbConnect->query($sql);

    $sql2 = "SELECT * FROM g5_write_gallery";
    $sql2 .= " ORDER BY wr_id DESC";
    $result2 = $dbConnect->query($sql2);

    $sql3 = "SELECT * FROM g5_write_free WHERE wr_2 = '{$regTime}' AND ca_name = '{$member['mb_id']}'";
    $sql3 .= " ORDER BY wr_1 DESC LIMIT 10;";
    $result3 = $dbConnect->query($sql3);
?>

<style>
    .dim_box {position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 10; background: rgb(0,0,0,0.5);}
    .dim_box p > span {color:#fff;}
    .section ul li {position: relative;}
</style>

    <!-- visual visual은 웹 페이지 가장 먼저 보여지는 부분입니다. -->
    <div class="visual">
        <!-- 이부분은 슬라이드 입니다. -->
        <div class="slide_area">
            <ul class="slide_ul">
                <?php foreach($result as $row): ?>
                <li>
                    <a href=""><img src="<?=G5_IMG_URL?>/<?=$row['wr_name']?>.png" alt=""></a>
                    <div class="visual_text">
                        <p><?=$row['wr_subject']?></p>
                        <p><?=$row['wr_content']?></p>
                        <a href="<?=$row['wr_link1']?>" target="_blank">바로가기</a>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- 이부분은 슬라이드 입니다. end -->
    </div>
    <!-- visual end -->

    <!-- section1 -->
    <div class="section section1">
        <div class="container">
            <div class="title">
                <p>Mr 이달의 영화</p>
            </div>
            <div class="content" data-aos="fade-up"
            data-aos-anchor-placement="top-bottom">
                <ul class="content_slide1 content_slide_pc">
                <?php foreach($result3 as $row): ?>
                    <li>
                        <a href="view.php?id=<?=$row['wr_id']?>">
                            <div class="img_box">
                                <img src="<?=G5_IMG_URL?>/<?=$row['wr_name']?>.png" alt="<?=$row['wr_subject']?>">
                            </div>
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
                <ul class="content_slide1 content_slide_mo">
                <?php foreach($result3 as $row): ?>
                    <li>
                        <a href="view.php?id=<?=$row['wr_id']?>">
                        <div class="img_box">
                            <img src="<?=G5_IMG_URL?>/<?=$row['wr_name']?>.png" alt="<?=$row['wr_subject']?>">
                        </div>
                    </a>
                </li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div> 
    <!-- section1 end -->

    <!-- section2 -->
    <div class="section section2">
        <div class="container">
            <div class="title">
                <p>개봉예정작</p>
            </div>
            <div class="content" data-aos="fade-up"
            data-aos-anchor-placement="top-bottom">
                <ul class="content_slide1 content_slide_pc">
                <?php foreach($result2 as $row): ?>
                <li>
                    <a href="<?=$row['wr_link1']?>" target="_blank">
                        <div class="img_box">
                            <img src="<?=G5_IMG_URL?>/<?=$row['wr_name']?>.png" alt="<?=$row['wr_subject']?>">
                        </div>
                        <div class="dim_box">
                            <p>
                                <span><?=$row['wr_subject']?></span>
                                <span><?=$row['wr_content']?></span>
                            </p>
                        </div>
                    </a>
                </li>
                <?php endforeach; ?>
                </ul>
                <!--  -->
                <ul class="content_slide1 content_slide_mo">
                <?php foreach($result2 as $row): ?>
                <li>
                    <a href="<?=$row['wr_link1']?>" target="_blank">
                        <div class="img_box">
                            <img src="<?=G5_IMG_URL?>/<?=$row['wr_name']?>.png" alt="<?=$row['wr_subject']?>">
                        </div>
                        <div class="dim_box">
                            <p>
                                <span><?=$row['wr_subject']?></span>
                                <span><?=$row['wr_content']?></span>
                            </p>
                        </div>
                    </a>
                </li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
     </div>
    <!-- section2 end -->



<?php
include_once(G5_THEME_PATH.'/tail.php');