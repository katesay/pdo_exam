
<?php
    $dbHost = "localhost";      // 호스트 주소(localhost, 120.0.0.1)
    $dbName = "testdb";      // 데이타 베이스(DataBase) 이름
    $dbUser = "php7";          // DB 아이디
    $dbPass = "php777";        // DB 패스워드
    $dbChar = "utf8";            // 문자 인코딩

try {
    // PDO 객체 생성 & DB 접속
    $dsn = "mysql:host={$dbHost};dbname={$dbName};charset={$dbChar}";
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    // 프리페어 스테이트먼트의 에뮬레이터를 무효로 한다
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // 예외가 쓰로우되는 설정으로 한다
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "데이터베이스 {$dbName}에 접속했습니다.";


} catch (Exception $e) {
    echo '<span class="error">오류가 있습니다. </span><br>';
    echo $e->getMessage();
 
    exit();
 }

    // 쿼리를 담은 PDOStatement 객체 생성
    $stmt = $pdo -> prepare("SELECT * FROM girl_group WHERE name = :name");

    // PDOStatement 객체가 가진 쿼리의 파라메터에 변수 값을 바인드
    $stmt -> bindValue(":name", "카라");

    // PDOStatement 객체가 가진 쿼리를 실행
    $stmt -> execute();

    // PDOStatement 객체가 실행한 쿼리의 결과값 가져오기
    $row = $stmt -> fetch();

    echo "<pre>";
    print_r($row);
    echo "</pre>";
?>
