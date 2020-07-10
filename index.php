   
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
            // SQL문을 만든다(모든 레코드)
            $sql = "SELECT * FROM member ";
            $sql = $sql. "WHERE id like 'busan100%'";
           
            echo ("sql = {$sql}");

            // PDO에 쿼리 문장을 등록한다
            $stm = $pdo->prepare($sql);
            // SQL 문을 실행한다
            $stm->execute();
                        
            // 결과 얻기(연관 배열로 반환한다)
            $result = $stm->fetchAll(PDO::FETCH_ASSOC); 
//var_dump ($result);

            // 테이틀의 타이틀 행
$th_data = <<< "EOD"
    <table>
        <thead><tr>
        <th> ID </th>
        <th> 이름 </th>
        <th> 나이 </th>
        <th> 성별 </th>
        </tr></thead>
    <tbody>
EOD;
             
    echo $th_data;


             foreach ($result as $row){
               // １행씩 테이블에 넣는다
               $colID = es($row['id']);
               $colName = es($row['name']);
               $colAge = es($row['age']);
               $colSex = es($row['sex']);
  

$tr_data = <<< "EOD"
     <tr>
     <td> {$colID} </td>
     <td> {$colName} </td>
     <td> {$colAge} </td>
     <td> {$colSex} </td>
     </tr>
EOD;

                 echo $tr_data;
            }
            echo "</tbody>";
            echo "</table>";
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