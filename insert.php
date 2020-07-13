<?
	//데이터 베이스 연결하기
	include "db_user.php";
	include "db_info.php";
	

	// write.php 폼값 가져오기
	$id = isset($_GET['id']) ? $_GET['id'] : 0;
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];


	$pdo = dbConnect($dsn, $user, $password, $dbName);

	$query = "INSERT INTO board 
	(id, name, email, pass, title, content,	wdate, ip, view)
	VALUES ('', '$name', '$email', '$pass', '$title', 
	'$content',	now(), '$REMOTE_ADDR', 0)";

	try {
		
		// PDO에 쿼리 문장을 등록한다
		$stmt = $pdo->prepare($query);
		// SQL 문을 실행한다
		$stmt->execute();
		////


	} catch (Exception $e) {
		echo '<span class="error">오류가 있습니다. </span><br>';
		echo $e->getMessage();
		exit();
	}

	//데이터베이스와의 연결 종료
	dbClose($pdo);
 
	// 새 글 쓰기인 경우 리스트로..
	echo ("<meta http-equiv='Refresh' content='1; URL=list.php'>");
?>
<center>
<font size=2>정상적으로 저장되었습니다.</font>