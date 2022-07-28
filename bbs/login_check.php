<?php
include_once('./_common.php');

$g5['title'] = "로그인 검사";

$mb_id       = isset($_POST['mb_id']) ? trim($_POST['mb_id']) : '';
$mb_password = isset($_POST['mb_password']) ? trim($_POST['mb_password']) : '';

run_event('member_login_check_before', $mb_id);

if (!$mb_id || !$mb_password)
    alert('회원아이디나 비밀번호가 공백이면 안됩니다.');

$mb = get_member($mb_id);

//$is_social_login = false;
//$is_social_password_check = false;

if (! (isset($mb['mb_id']) && $mb['mb_id']) || !login_password_check($mb, $mb_password, $mb['mb_password']) ) {

    run_event('password_is_wrong', 'login', $mb);

    alert('가입된 회원아이디가 아니거나 비밀번호가 틀립니다.\\n비밀번호는 대소문자를 구분합니다.');
}

//run_event('login_session_before', $mb, $is_social_login);

@include_once($member_skin_path.'/login_check.skin.php');

// 회원아이디 세션 생성
set_session('ss_mb_id', $mb['mb_id']);
// FLASH XSS 공격에 대응하기 위하여 회원의 고유키를 생성해 놓는다. 관리자에서 검사함 - 110106
set_session('ss_mb_key', md5($mb['mb_datetime'] . get_real_client_ip() . $_SERVER['HTTP_USER_AGENT']));


if ($url) {
    // url 체크
    check_url_host($url, '', G5_URL, true);

    $link = urldecode($url);
    // 다른 변수들을 넘겨주기 위함
    if (preg_match("/\?/", $link))
        $split= "&amp;";
    else
        $split= "?";

    // $_POST 배열변수에서 아래의 이름을 가지지 않은 것만 넘김
    $post_check_keys = array('mb_id', 'mb_password', 'x', 'y', 'url');

} else  {
    $link = G5_URL;
}

//run_event('member_login_check', $mb, $link, $is_social_login);

// 관리자로 로그인시 DATA 폴더의 쓰기 권한이 있는지 체크합니다. 쓰기 권한이 없으면 로그인을 못합니다.
if( is_admin($mb['mb_id']) && is_dir(G5_DATA_PATH.'/tmp/') ){
    $tmp_data_file = G5_DATA_PATH.'/tmp/tmp-write-test-'.time();
    $tmp_data_check = @fopen($tmp_data_file, 'w');
    if($tmp_data_check){
        if(! @fwrite($tmp_data_check, G5_URL)){
            $tmp_data_check = false;
        }
    }
    @fclose($tmp_data_check);
    @unlink($tmp_data_file);

    if(! $tmp_data_check){
        alert("data 폴더에 쓰기권한이 없거나 또는 웹하드 용량이 없는 경우\\n로그인을 못할수도 있으니, 용량 체크 및 쓰기 권한을 확인해 주세요.", $link);
    }
}

goto_url($link);