<?php
    include_once(G5_THEME_PATH.'/head.php');
?>

<style>
    /* 글쓰기 */
    .go_button {width:100%; margin-top:30px;}
    .go_button > a {display:block; width:100%; height:45px; line-height:43px; box-sizing:border-box; border-radius: 30px; background:#c73c2d; font-size:16px; font-weight:400; color:#fff; text-align:center;}
@media screen and (max-device-width: 768px) {
    /* 글쓰기 */
    .go_button {margin-top:5.208vw;}
    .go_button > a {height: 7.161vw; line-height: 6.901vw; font-size: 3.385vw;}
}
</style>
<div class="Writing_area">
    <div class="title title_2">
        <p>리뷰작성</p>
    </div>
    <div class="Writing_content">
        <div class="left_right_box_area">
            <form action="write_ok.php" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="left_right_box">
                        <div class="left_box">
                            <div class="img_box">
                                <img src="<?=G5_THEME_IMG_URL?>/no_img.png" alt="" id="preview">
                            </div>
                        </div>
                        <div class="right_box">
                            <div class="form">
                                <input type="text" name="title" placeholder="영화제목을 입력해주세요">
                                <dl>
                                    <dt>날짜</dt>
                                    <dd><input type="date" id="start" name="date"></dd>
                                    <input type="file" name="file" id="file" class="file" multiple="">
                                    <span class="rating_text">평점 : </span><select name="rating" class="rating">
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="2.5">2.5</option>
                                        <option value="3">3</option>
                                        <option value="3.5">3.5</option>
                                        <option value="4">4</option>
                                        <option value="4.5">4.5</option>
                                        <option value="5">5</option>
                                    </select>
                                </dl>
                            </div>
                        </div>  
                    </div>                      
                    <div class="text_area_box">
                        <textarea name="review" id="" placeholder="리뷰를 작성해주세요."></textarea>
                    </div>
                    <div class="Completion_button">
                    <button type="submit">완료</button>
                    </div>
                    <div class="go_button">
                        <a href="./calendar.php">취소</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#file').change(function(){
        setImageFromFile(this, '#preview');
    });

function setImageFromFile(input, expression) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(expression).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<?php
include_once(G5_THEME_PATH.'/tail.php');