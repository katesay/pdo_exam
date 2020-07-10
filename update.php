
   
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

            //for($i = 10000; $i <= 100000; $i++) {
                $sql = "UPDATE `member` SET  `pw` = '바다물', `name` = '태종대', `age` = '20', `sex` = '물' WHERE `id` like 'busan100%'";
            
                //echo ("sql = {$sql}");
                //if (($i % 10000) == 0) {
                //    echo ("[$i] 번째 레코드 추가. <br>");
                //}

                // PDO에 쿼리 문장을 등록한다
                $stm = $pdo->prepare($sql);
                // SQL 문을 실행한다
                $stm->execute();

                echo ("UPDATE SQL실행이 잘되었읍니다.");
            //}


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