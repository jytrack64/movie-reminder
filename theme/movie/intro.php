<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>intro</title>
</head>
<body>
    <style>
        .intro_wrap {position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: #000;z-index:9999;}
        .text {position: fixed;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);list-style: none;border-bottom: 0; display: table;}
        .text2 {transition: all .5s ease;opacity: 0;}
        .text2.on {opacity: 1;}
        .text li {display: inline-block; float:left; font-weight: 400;font-size: 48px;color: #fff;opacity: 1;transition: all .7s ease;letter-spacing: .03em;max-width: 2em;white-space:nowrap}
        .text li.bold {font-weight: bold;}
          .text li.small {font-size:32px; line-height:48px;}
        .text li.spaced {padding-left: 0.5em; margin-right:0.07em;}
        .text li.hidden.spaced {padding-left: 0;}
        .text.hidden li.ghost {opacity: 0;max-width: 0; margin-right: 0;}
       .text li.hidden{opacity: 0;max-width: 0;}
       .ghost2 {margin-right: 20px;}
      
       @media screen and (max-device-width: 1024px) {
        .text li {font-size:38px;}
           .text li.small {font-size:24px; line-height:38px;}
      }
      
      @media screen and (max-device-width: 768px) {
        .text li {font-size:30px;}
           .text li.small {font-size:20px; line-height:30px;}
           .text {padding:0; width:100%; display: flex; justify-content: center;}
           .intro_wrap {display: flex; align-items: center; justify-content: center;}
      }
      
      @media screen and (max-device-width: 500px) {
        .text li {font-size:20px;}
           .text li.small {font-size:14px; line-height:20px;}
      }
    </style>
    <!-- Movie Reminder Ranking -->
    <div class="intro_wrap">
        <ul class="text text1">
          <li class="">M</li>
          <li class="ghost ">o</li>
          <li class="ghost">v</li>
          <li class="ghost">i</li>
          <li class="ghost ghost2">e</li>
          
          <li class="">R</li>
          <li class="ghost">e</li>
          <li class="ghost">m</li>
          <li class="ghost">i</li>
          <li class="ghost">n</li>
          <li class="ghost">d</li>
          <li class="ghost">e</li>
          <li class="ghost">r</li>
        </ul>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.1.js"></script>
    <script>
        $(function () {
            var text1 = $(".text1");
            let set_ani = setTimeout(function tick() {
                if (!text1.hasClass("hidden")) {
                    text1.addClass("hidden");
                } else {
                    if (text1.find('li').hasClass("hidden")) {
                       text1.find('li').removeClass("hidden");
                      set_ani = setTimeout(tick, 1300); // (*)
                    } else {
                        $('.intro_wrap').delay(1000).fadeOut('slow', function() {
                        window.location.href = "http://localhost/moview/main.php";
                      });
                      return;
                    }
                }
                set_ani = setTimeout(tick, 500); // (*)
            }, 1300);
        });
    
    </script>
</body>
</html>