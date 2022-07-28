<?php
    include_once(G5_THEME_PATH.'/head.php');

    $domain = $_SERVER['SERVER_NAME'];
    $host = "localhost";
    $user = "root";
    $pw = "root";
    $dbName = "movie";

    $dbConnect = new mysqli($host, $user, $pw, $dbName);
    $dbConnect->set_charset("utf-8");

    $regTime = date('Y-m');
    $year = (!empty($_GET['id'])) ? $_GET['id'] : date('Y');
    $month = (!empty($_GET['m'])) ? $_GET['m'] : date('m');
    $reg_dt = $year.'-'.$month;
    $sql = "SELECT * FROM g5_write_free WHERE ca_name = '{$member['mb_id']}' AND wr_2 = '{$reg_dt}'";
    $sql .= " ORDER BY wr_id DESC";
    $result = $dbConnect->query($sql);
?>
<style>
    .rating {
        color: #fff;
        border: 1px solid #fff;
    }
    .rating > option {
        color: #000;
    }
	.img_wrap {
		/* display: block; */
		width: auto;
		height: 200px;
	}
	.alert {
    font-size: 14px;
    color: #000;
    width: auto;
    background: #fff;
    /* height: 30px; */
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
    height: auto;
    padding: 10px;
    border-radius: 10px;
    display: none;
}
.alert img.img_p {max-width:100%; width:230px; height:330px; cursor: pointer;}
.alert p {
    position: relative;
    height: 100%;
}
.alert p > span {
    position: absolute;
    top: 0;
    right: 0;
    padding: 5px;
    background: #c73c2d;
    color: #fff;
    font-size: 10px;
    border-radius: 5px;
    cursor: pointer;
}

.cal-schedule > span {font-size: 24px;}

.select_box {margin-bottom:20px;}
.select_box select {width:100px; height:50px; box-sizing:border-box; border-radius:10px; font-size:16px;}

/* 글쓰기 */
.go_button {width:100%; margin-top:30px;}
.go_button > a {display:block; width:100%; height:45px; line-height:43px; box-sizing:border-box; border-radius: 30px; background:#c73c2d; font-size:16px; font-weight:400; color:#fff; text-align:center;}

@media screen and (max-device-width: 1024px) {
    .alert img.img_p {max-width: 100%; width: 250px; height: 300px;}
}    

@media screen and (max-device-width: 768px) {
    .alert img.img_p {max-width: 100%; width: 32.5521vw; height: 40.3646vw;}
    .alert p > span {font-size:20px;}
    .cal-schedule > span {font-size: 5.125vw;}
    .select_box select {width: 26.042vw; height: 7.813vw; box-sizing: border-box; border-radius: 10px; font-size: 3.385vw;}

    /* 글쓰기 */
    .go_button {margin-top:5.208vw;}
    .go_button > a {height: 7.161vw; line-height: 6.901vw; font-size: 3.385vw;}
}

@media screen and (max-device-width: 500px) {
    .alert img.img_p {max-width: 100%; width: 350px; height: 500px;}
    .alert p > span {font-size:30px;}
}
</style>
<!-- 달력 -->
<div class="calendar_area">
    <div class="container">
        <div class="title title2">
            <p>Mr Review calendar</p>
        </div>
        <div class="cal_top">
        <div class="select_box">
        <select name="search_year" id="y" class="rating">            
            <option value="2019">2019년</option>
            <option value="2020">2020년</option>
            <option value="2021">2021년</option>
            <option value="2022">2022년</option>
            <option value="2023">2023년</option>
            <option value="2024">2024년</option>
        </select>
        <select name="search_month" id="m" class="rating">
            <option value="01">1월</option>
            <option value="02">2월</option>
            <option value="03">3월</option>
            <option value="04">4월</option>
            <option value="05">5월</option>
            <option value="06">6월</option>
            <option value="07">7월</option>
            <option value="08">8월</option>
            <option value="09">9월</option>
            <option value="10">10월</option>
            <option value="11">11월</option>
            <option value="12">12월</option>
        </select>
        </div>
            <span id="cal_top_year"></span>
            <span id="cal_top_month"></span>
        </div>
        <div id="cal_tab" class="cal">
        </div>                
        <div class="go_button">
            <a href="review_write.php">글쓰기</a>
        </div>
    </div>
</div>
<!-- popup -->
<div class="alert">
    <p>
        <img src="" alt="" class="img_p">
        <span class="img_close">X</span>
    </p>
</div>
<!-- popup end -->
<!-- 달력 -->
<script>
    //calendar 그리기
    function drawCalendar(){
        var setTableHTML = "";
        setTableHTML+='<table class="calendar">';
        setTableHTML+='<tr><th>SUN</th><th>MON</th><th>TUE</th><th>WED</th><th>THU</th><th>FRI</th><th>SAT</th></tr>';
        for(var i=0;i<6;i++){
            setTableHTML+='<tr height="100">';
            for(var j=0;j<7;j++){
                setTableHTML+='<td class="img_wrap" style="text-overflow:ellipsis;overflow:hidden;white-space:nowrap">';
                setTableHTML+='<div class="cal-day"><span></span></div>';
                setTableHTML+='</td>';
            }
            setTableHTML+='</tr>';
        }
        setTableHTML+='</table>';
        $("#cal_tab").html(setTableHTML);
        //달력 css 커스텀
    
    }

    var today = null;
    var year = null;
    var month = null;
    var firstDay = null;
    var lastDay = null;
    var $tdDay = null;
    var $tdSche = null;
    var link_arr = [];
    var link_arr2 = [];
    var day = "";
    var rate = 0;

//날짜 초기화
    function initDate(){
        $tdDay = $("td div.cal-day")
        dayCount = 0;
        today = new Date();
        year = <?=(!empty($_GET['id'])) ? $_GET['id'] : date('Y');?>; // 년도
        month = <?=(!empty($_GET['m'])) ? $_GET['m'] : date('m');?>; //월
        firstDay = new Date(year,month-1,1);
        lastDay = new Date(year,month,0);
    }
    // $("#y").val("2021").prop("selected", true);
    $("#y").val("<?=(!empty($_GET['id'])) ? $_GET['id'] : date('Y');?>").prop("selected", true); //option 선택
    $("#m").val("<?=(!empty($_GET['m'])) ? $_GET['m'] : date('m');?>").prop("selected", true); //option 선택

    $("#y").change(function(){
        location.href="calendar.php?id="+$("#y").val()+"&m="+$("#m").val()+"";
    });
    $("#m").change(function(){
        location.href="calendar.php?id="+$("#y").val()+"&m="+$("#m").val()+"";
    });
    
//calendar 날짜표시
    function drawDays(){
        $("#cal_top_year").text(year);
        $("#cal_top_month").text(month);

        for(var i=firstDay.getDay();i<firstDay.getDay()+lastDay.getDate();i++){
            $tdDay.eq(i).text(++dayCount).css("color","#fff");
            $tdDay.eq(i).append("<br>");
            
            <?php foreach($result as $row): ?>
                //2021-10-11 explode 되면 $list[0] == 2021, $list[1] == 10, $list[2] == 11
                <?php $list = explode('-', $row['wr_last']); ?>
                if(dayCount == <?=$list[2]?>){
                    if(1 <= <?=$row['wr_1']?> && <?=$row['wr_1']?> <= 2) {
                        $tdDay.eq(i).append('<div class="cal-schedule" data-id="<?=$row['wr_id']?>" data-img="<?=$row['wr_name']?>" style="display: inline-block; cursor:pointer;"><span>🙁</span></div>');
                    }
                    if(2 < <?=$row['wr_1']?> && <?=$row['wr_1']?> < 4) {
                        $tdDay.eq(i).append('<div class="cal-schedule" data-id="<?=$row['wr_id']?>" data-img="<?=$row['wr_name']?>" style="display: inline-block; cursor:pointer;"><span>😐</span></div>');
                    }
                    if(4 <= <?=$row['wr_1']?> && <?=$row['wr_1']?> <= 5) {
                        $tdDay.eq(i).append('<div class="cal-schedule" data-id="<?=$row['wr_id']?>" data-img="<?=$row['wr_name']?>" style="display: inline-block; cursor:pointer;"><span>🙂</span></div>');
                    }
                }
            <?php endforeach; ?>
        }
        for(var i=0;i<42;i+=7){
            $tdDay.eq(i).css("color","#c73c2d");
        }
        for(var i=6;i<42;i+=7){
            $tdDay.eq(i).css("color","#4e4ba5");
        }
    }

	$(document).on("click", ".cal-schedule", function(){
        var id = $(this).data("id");
        var img = $(this).data("img");
        // day = $(this).data("day");
        $(".alert").show();
        $(".img_p").attr("src", "<?=G5_IMG_URL?>/"+img+".png");
		$(".img_p").attr("data-id", id);
    });

	$(document).on("click", ".img_p", function(){
        var id = $(this).data("id");
        location.href="./view.php?id="+id;
    });

    $(".img_close").on("click", function(){
        $(".alert").hide();
    });


    $(document).ready(function() {
        drawCalendar();
        initDate();
        drawDays();
    });
</script>
<?php
include_once(G5_THEME_PATH.'/tail.php');