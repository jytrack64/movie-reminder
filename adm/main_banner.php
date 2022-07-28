<?php
header('Content-Type: text/html; charset=utf-8');
$sub_menu = "100320";
include_once('./_common.php');

$domain = $_SERVER['SERVER_NAME'];
$host = "localhost";
$user = "root";
$pw = "root";
$dbName = "movie";

if ($is_admin != 'super')
    alert('최고관리자만 접근 가능합니다.');

$g5['title'] = "메인배너 관리";
include_once('./admin.head.php');
$dbConnect = new mysqli($host, $user, $pw, $dbName);
$dbConnect->set_charset("utf-8");

$sql = "SELECT * FROM g5_write_notice";
$sql .= " ORDER BY wr_id DESC";
$result = $dbConnect->query($sql);

?>
<style>
    .btn {
    height: 30px;
    border: 0;
    border-radius: 5px;
    padding: 0 10px;
    font-weight: bold;
    font-size: 1.09em;
    vertical-align: middle;
}
    form {
    display: flex;
    align-items: center;
    flex-flow: column;
    width: 100%;
    height: auto;
    }
    form input,button {
        width: 100%;
        height:35px;
    }
    form input {margin-bottom:10px;}
    #wrapper h2 {font-size:16px; font-weight:500; text-align:center; border-bottom:1px solid #dcdcdc;}
    #wrapper table{border-collapse: collapse; border-spacing: 0; width: 100%; table-layout: fixed;}
    #wrapper table tr th {width:100px;}
    #wrapper table tr td:first-child {width:100px}
    #wrapper table tr td:nth-child(2) {width:200px}
    #wrapper table tr td.g_img {line-height: 22px; width: 100px;}
    #wrapper table tr td > img {width: 100%;}
    #wrapper table tr td.link {width: 50%;text-overflow:ellipsis; overflow:hidden; white-space:nowrap;}

</style>
<p>Intrinsic size:	1920 × 570 px</p><br>
<form action="banner_ok.php" method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="영화 제목을 적어주세요.">
    <input type="text" name="text" placeholder="내용을 적어주세요.">
    <input type="text" name="link" placeholder="링크를 적어주세요.">
    <input type="file" name="file" id="file" class="file" multiple="">
    <button class="btn" style="background: #9eacc6;color: #fff;">등록</button>
</form>

<hr>
<h2>배너리스트</h2>
<table>
  <tr>
    <th>배너 이름</th>
    <th>배너 내용</th>
    <th>링크</th>
    <th>이미지</th>
    <th>삭제</th>
  </tr>
  <?php foreach($result as $row): ?>
  <tr>
    <td><?=$row['wr_subject']?></td>
    <td><?=$row['wr_content']?></td>
    <td class="link"><?=$row['wr_link1']?></td>
    <td class="g_img"><img src="<?=G5_IMG_URL?>/<?=$row['wr_name']?>.png" alt=""></td>
    <td><a href="banner_del.php?id=<?=$row['wr_id']?>" class="btn" style="background: #9eacc6;color: #fff;">삭제</a></td>
  </tr>
  <?php endforeach; ?>
</table>
<?php
include_once ('./admin.tail.php');