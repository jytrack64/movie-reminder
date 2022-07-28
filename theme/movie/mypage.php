<?php
    include_once(G5_THEME_PATH.'/head.php');
?>
<!-- my page -->
<div class="my_page">
    <div class="my_mb_area">
        <div class="container">
            <div class="mb_name">
                <p><?php echo $member['mb_id'] ?></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="title title2">
            <div class="mb_name2">
                <p>정보수정</p>
            </div>
        </div>
        <div class="my_content">
            <div class="tap_menu_area">
                <ul>
                    <li class="on"><a href="./mypage.php">정보수정</a></li>
                    <li class=""><a href="./m_f_movie.php">이달의 영화</a></li>
                    <li class=""><a href="./mypage_review.php">나의 리뷰</a></li>
                    <li><a href="./calendar.php">캘린더</a></li>
                </ul>
            </div>
            <div class="form_change">
                <form id="fregisterform" name="fregisterform" action="mypage_pw.php" method="post">
                    <input type="text" name="name" placeholder="이름" value="<?php echo $member['mb_name'] ?>">
                    <input type="text" name="nick" placeholder="닉네임" value="<?php echo $member['mb_nick'] ?>">
                    <input type="password" name="mb_password" placeholder="비밀번호">
                    <input type="password" name="mb_password_re" placeholder="비밀번호 확인">
                    <button type="submit">수정하기</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- my page end -->
<?php
include_once(G5_THEME_PATH.'/tail.php');