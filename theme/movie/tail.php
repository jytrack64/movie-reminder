<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

?>
    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="logo"><p>Mr</p></div>
            <!-- <div class="logo"><p><span>M</span><span class="hover_open">ovie</span><span class="hover_hidden">r</span> <span class="hover_open">Reminder</span></p></div> -->
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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- style js -->
    <script src="<?=G5_THEME_JS_URL?>/style.js"></script>
    <!-- style js end -->
    <script>
        AOS.init({ 
    easing: 'ease-out-back', 
    duration: 1000 
  });
    </script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");