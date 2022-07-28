<?php
$menu['menu100'] = array (
    array('100000', '환경설정', G5_ADMIN_URL.'/config_form.php',   'config'),
    //array('100100', '기본환경설정', G5_ADMIN_URL.'/config_form.php',   'cf_basic'),
    //array('100280', '테마설정', G5_ADMIN_URL.'/theme.php',     'cf_theme', 1),
    array('100320', '메인배너', G5_ADMIN_URL.'/main_banner.php',     'cf_menu', 1),
    array('100330', '개봉예정작', G5_ADMIN_URL.'/coming_soon.php',     'cf_menu', 1),
);

/*
if(version_compare(phpversion(), '5.3.0', '>=') && defined('G5_BROWSCAP_USE') && G5_BROWSCAP_USE) {
    $menu['menu100'][] = array('100510', 'Browscap 업데이트', G5_ADMIN_URL.'/browscap.php', 'cf_browscap');
    $menu['menu100'][] = array('100520', '접속로그 변환', G5_ADMIN_URL.'/browscap_convert.php', 'cf_visit_cnvrt');
}

$menu['menu100'][] = array('100410', 'DB업그레이드', G5_ADMIN_URL.'/dbupgrade.php', 'db_upgrade');
$menu['menu100'][] = array('100400', '부가서비스', G5_ADMIN_URL.'/service.php', 'cf_service');
*/