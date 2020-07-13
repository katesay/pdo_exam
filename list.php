<?php
	const DEBUG = TRUE;
	
	//데이터 베이스 연결하기
	include "db_user.php";
	include "db_info.php";
	include "util.php";

# LIST 설정
# 1. 한 페이지에 보여질 게시물의 수
$page_size = 10;

# 2. 페이지 나누기에 표시될 페이지의 수
$page_list_size = 10;
$no = isset($_GET['no']) ? $_GET['no'] : 0;
if ($no < 0) $no = 0;

// 데이터베이스에서 페이지의 첫번째 글($no)부터 
// $page_size 만큼의 글을 가져온다.
$pdo = dbConnect($dsn, $user, $password, $dbName);

try {
	$query = "SELECT * FROM board ORDER BY id DESC LIMIT :no, :page_size";
	// PDO에 쿼리 문장을 등록한다
	$stmt = $pdo->prepare($query);
	// SQL 문을 실행한다
	$stmt->bindValue(":no", $no);
	$stmt->bindValue(":page_size", $page_size);
	$stmt->execute();


	$result = $stmt->fetchAll();

	
	// 총 게시물 수 를 구한다.
	$stmt = $pdo->prepare("SELECT count(*)  FROM board");
	$stmt->execute();


	
	$result_count = $stmt->fetchColumn();
	//$result_row = mysql_fetch_row($result_count);
	
	//결과의 첫번째 열이 count(*) 의 결과다.
	$total_row = $result_count;
	d($total_row);	
	
	# 총 페이지 계산
	if ($total_row <= 0) $total_row = 0;
	$total_page = ceil($total_row / $page_size);
	d($total_page);	

	# 현재 페이지 계산
	$current_page = ceil(($no+1)/$page_size);
	d($current_page);

	include ("html.head.tpl.php");

	foreach($result as $row) 
	{
		include "html.data.tpl.php";

	}
	//데이터베이스와의 연결 종료
	dbClose($pdo);

	include "html.footer.tpl.php";

} catch (Exception $e) {
	echo '<span class="error">오류가 있습니다. </span><br>';
	echo $e->getMessage();
	exit();
}






?>