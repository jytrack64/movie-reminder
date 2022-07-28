<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
<div class="header_wrap">
    <!-- 맨 위에 로그인 및 마이페이지 부분입니다. -->
    <div class="small_header">
        <div class="container">
            <ul>
                <!--회원이면 -->
                <?php if ($is_member) {  ?>
                    <li><a href="./mypage.php">마이페이지</a></li>
                    <li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
                    <?php if ($is_admin) {  ?>
                    <li class="tnb_admin"><a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>">관리자</a></li>
                    <?php }  ?>
                <?php } else {  ?>
                <li><a href="<?php echo G5_BBS_URL ?>/login.php">로그인</a></li>
                <li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
                <!--회원이면 end -->
                <?php }  ?>
            </ul>
        </div>
    </div>
    <!-- 맨 위에 로그인 및 마이페이지 부분입니다. end -->

    <!-- header 헤더부분입니다. -->
    <header>
        <!-- 전체 넓이 값을 공통으로 넣어주기 위한 이너값 입니다. container는 보통 웹상에서 여백을 줄때 사용하는 class 입니다. -->
        <div class="container">
            <!-- header area -->
            <div class="header_area">
                <!-- header logo -->
                <!-- <div class="logo"><p>Mr</p></div> -->
                <div class="logo" onclick="javascript:location.href='<?php echo G5_URL ?>'"><p><span>M</span><span class="hover_open">ovie</span><span class="hover_hidden">r</span> <span class="hover_open">Reminder</span></p></div>
                <!-- header logo end -->
                <!-- nav는 header안에 네비게이션을 부모역할로써 자식들을 묶어주는 역할입니다. -->
                <nav>
                    <ul>
                        <li><a href="<?=G5_URL?>/calendar.php">캘린더</a></li>
                        <li><a href="<?=G5_URL?>/m_f_movie.php">이달의 영화</a></li>
                        <!-- <li><a href="">인기순위</a></li> -->
                    </ul>
                </nav>
                <!-- nav end -->
                <!-- serch -->
                <div class="serch">
                    <form action="search.php" method="get">
                        <label for="">
                            <input type="text" name="title" placeholder="검색어를 입력해주세요.">
                            <button type="submit"><img src="<?=G5_THEME_IMG_URL?>/serch.png" alt=""></button>
                        </label>
                    </form>
                </div>
                <!-- serch end -->
            </div>
            <!-- header area end -->
        </div>
        <!-- 전체 넓이 값을 공통으로 넣어주기 위한 이너값 입니다. -->
    </header>
    <!-- header 헤더부분입니다. end -->
    </div>