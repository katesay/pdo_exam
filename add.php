
   
<!DOCTYPE html>
<html lang="kr">
<head>
<meta charset="utf-8">
<title>PDO로 데이터베이스에 접속한다</title>
<link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>

    <?php
        $libPath = "./lib/";
        
        include $libPath. "dbuser.php";
        include $libPath. "dbcon.php";
        include $libPath. "util.php";
    ?>
    <?
        $pdo = dbConnect($dsn, $user, $password, $dbName)
    ?><br>
    <?php
        try {

            for($i = 10000; $i <= 100000; $i++) {
                $sql = "INSERT INTO `member` (`id`, `pw`, `name`, `age`, `sex`, `hp`, `email`, `gendar`, `hobby1`, `hobby2`, `hobby3`, `hobby4`, `hobby5`, `comment`, `level`) VALUES ('busan{$i}', 'busan{$i}', '부산', '100', '산', '', 'busan@email{$i}.{$i}', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
            
                if (($i % 10000) == 0) {
                    echo ("[$i] 번째 레코드 추가. <br>");
                }

                // PDO에 쿼리 문장을 등록한다
                $stm = $pdo->prepare($sql);
                // SQL 문을 실행한다
                $stm->execute();
            }


        } catch (Exception $e) {
            echo '<span class="error">오류가 있습니다. </span><br>';
            echo $e->getMessage();
            exit();
        }

    ?>
     <?php
        dbClose($pdo);
     ?>


</div>
</body>
</html>