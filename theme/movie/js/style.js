$(document).ready(function(){


    // var contents_img = "";
    // var title = "";
    // var text = "";
    // var q_link = "";

    // var text_arr = [];
    // text_arr['0'] = '영화1';
    // text_arr['1'] = '해리포터';
    // text_arr['2'] = '일본영화';
    // text_arr['3'] = '화려한휴가';
    // text_arr['4'] = '말죽거리잔혹사';
    // text_arr['5'] = '타이타닉';
    // text_arr['6'] = '화려한휴가';
    // for(var i = 0; i <= 6; i++){
    //     contents_img = "m_img"+i+".jpg";
    //     $('.section1 .content > ul').append('<li><a href=""><div class="img_box"><img src="./img/'+contents_img+'" alt=""></img></div></a></li>');
    // }

    // var text_arr = [];
    // text_arr['0'] = '영화1';
    // text_arr['1'] = '영화1';
    // text_arr['2'] = '영화1';
    // text_arr['3'] = '영화1';
    // text_arr['4'] = '영화1';
    // text_arr['5'] = '영화1';
    // text_arr['6'] = '영화1';
    // for(var i = 0; i <= 6; i++){
    //     contents_img = "mm_img"+i+".jpg";
    //     $('.section2 .content > ul').append('<li><a href=""><div class="img_box"><img src="./img/'+contents_img+'" alt=""></img></div></a></li>');
    // }

    // var text_arr = [];
    // text_arr['0'] = '영화1';
    // text_arr['1'] = '영화1';
    // text_arr['2'] = '영화1';
    // text_arr['3'] = '영화1';
    // text_arr['4'] = '영화1';
    // text_arr['5'] = '영화1';
    // text_arr['6'] = '영화1';
    // for(var i = 0; i <= 6; i++){
    //     contents_img = "mm_img"+i+".jpg";
    //     $('.section3 .content > ul').append('<li><a href=""><div class="img_box"><img src="./img/'+contents_img+'" alt=""></img></div></a></li>');
    // }

    $('header .header_area label button').mouseover(function(){
        $('header .header_area label input').addClass('on');
    });
    $('header').mouseleave(function(){
        $('header .header_area label input').removeClass('on');
    });

    $('.slide_ul').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        dote: true,
        autoplay: true,
        cssEase: 'linear'
    });

    $('.content_slide_pc').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        responsive: [ // 반응형 웹 구현 옵션
          {  
            breakpoint: 769, //화면 사이즈 768px
            settings: {
              //위에 옵션이 디폴트 , 여기에 추가하면 그걸로 변경
              slidesToShow:4,
            } 
          },
          { 
            breakpoint: 500, //화면 사이즈 768px
            settings: {	
              //위에 옵션이 디폴트 , 여기에 추가하면 그걸로 변경
              slidesToShow:3,
            } ,
          }
        ]
    });  
    // 
    $('.content_slide_mo').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        responsive: [ // 반응형 웹 구현 옵션
          {  
            breakpoint: 769, //화면 사이즈 768px
            settings: {
              //위에 옵션이 디폴트 , 여기에 추가하면 그걸로 변경
              slidesToShow:4,
            } 
          },
          { 
            breakpoint: 500, //화면 사이즈 768px
            settings: {	
              //위에 옵션이 디폴트 , 여기에 추가하면 그걸로 변경
              slidesToShow:3,
            } ,
          }
        ]
    });  

    // logo hover
    $('header > .container .logo').mouseover(function(){
        $('.logo p span.hover_open').addClass('on');
        $('.logo p span.hover_hidden').addClass('no');
    });
    $('header > .container .logo').mouseleave(function(){
        $('.logo p span.hover_open').removeClass('on');
        $('.logo p span.hover_hidden').removeClass('no');
    });



    


});


