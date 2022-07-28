<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- aos end -->    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <div class="header_wrap">
        <!-- 맨 위에 로그인 및 마이페이지 부분입니다. -->
        <div class="small_header">
            <div class="container">
                <ul>
                    <!--회원이면 -->
                    <li><a href="<?php echo G5_BBS_URL ?>/login.php">로그인</a></li><!-- = 로그아웃-->
                    <!-- <li>로그아웃</li> -->
                    <!-- <li>마이페이지</li> -->
                    <li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
                    <!--회원이면 end -->
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
                    <div class="logo" onclick="javascript:location.href='../main.php'"><p><span>M</span><span class="hover_open">ovie</span><span class="hover_hidden">r</span> <span class="hover_open">Reminder</span></p></div>
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
                        <form action="../search.php" method="get">
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

        <!-- login content -->
        <div class="login_wrap">
            <div class="login_area"  data-aos="fade"
            data-aos-duration="3000">
                <div class="login_title">
                    <p>Movie Reminder</p>
                </div>
                <div class="form">
                    <form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
                        <input type="hidden" name="url" value="<?php echo $login_url ?>">
                        <input type="text" name="mb_id" placeholder="아이디를 입력해주세요.">
                        <input type="password" name="mb_password" placeholder="패스워드를 입력해주세요.">
                        <button>로그인</button>
                        <div class="join_area">
                            <div class="join_membership_button">
                            <a href="<?php echo G5_BBS_URL ?>/register.php" class="join">회원가입</a>
                            </div>
                            <div class="join_Finding_go">
                                <!-- <a href="">아이디 찾기</a><span>/</span>
                                <a href="">비밀번호 찾기</a>
                                <a href="<?php echo G5_BBS_URL ?>/password_lost.php" target="_blank" id="login_password_lost">정보찾기</a> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- login content end -->

<!-- footer -->
<footer class="footer">
    <div class="container">
        <div class="logo"><p>Mr</p></div>
        <nav>
            <ul>
                <li>Name : Kim Jiyeon</li>
                <li>Address : Gwangmyeong-si, Gyeonggi-do</li>
                <li>Phone : 010-2522-6052</li>
                <li>Copyright Movie Reminder. All rights reserved.</li>
            </ul>
        </nav>
        <div class="go_top">
            <a href="#"><img src="<?=G5_THEME_IMG_URL?>/top_button.png" alt="">TOP</a>
        </div>
    </div>
</footer>
<!-- footer end -->

<script>

function flogin_submit(f)
{
    if( $( document.body ).triggerHandler( 'login_sumit', [f, 'flogin'] ) !== false ){
        return true;
    }
    return false;
}
</script>
<!-- } 로그인 끝 -->

<!-- style js -->
<script src="<?=G5_THEME_JS_URL?>/style.js"></script>
<!-- style js end -->  
<script>
    AOS.init({ 
    easing: 'ease-out-back', 
    duration: 1000 
  });
</script>