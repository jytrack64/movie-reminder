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
        <p>리뷰작성</p>
    </div>
    <div class="Writing_content">
        <div class="left_right_box_area">
            <form action="modify_ok.php" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="left_right_box">
                        <div class="left_box">
                            <div class="img_box">
                                <img src="<?=G5_IMG_URL?>/<?=$row['wr_name']?>.png" alt="<?=$row['wr_subject']?>" id="preview">
                            </div>
                        </div>
                        <div class="right_box">
                            <div class="form">
                                <input type="text" name="title" placeholder="영화제목을 입력해주세요" value="<?=$row['wr_subject']?>">
                                <dl>
                                    <dt>날짜</dt>
                                    <input type="hidden" name="h_wr_id" value="<?=$no?>">
                                    <dd><input type="date" id="start" name="date" value="<?=$row['wr_last']?>"></dd>
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
                        <textarea name="review" id="" placeholder="리뷰를 작성해주세요."><?=$row['wr_content']?></textarea>
                    </div>
                    <div class="Completion_button">
                    <button type="submit">완료</button>
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

    $(".rating").val("<?=$row['wr_1']?>").prop("selected", true); //option 선택

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