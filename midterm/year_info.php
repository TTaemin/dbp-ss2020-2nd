<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
    if(mysqli_connect_errno()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    
    //settype($_GET['number'], 'integer');
    //$number = $_GET['number'];
    $filtered_number = mysqli_real_escape_string($link, $_GET['number']);



    $query = "
    select release_year, title, length, rating, description
    from film 
    order by release_year desc limit ".$filtered_number   
    ;

    $result = mysqli_query($link, $query);  

    $article = '';    
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr>';
        $article .= '<td>'.$row['release_year'].'</td>';
        $article .= '<td>'.$row['title'].'</td>';
        $article .= '<td>'.$row['length'].'</td>';
        $article .= '<td>'.$row['rating'].'</td>';
        $article .= '<td>'.$row['description'].'</td>';
        $article .= '</tr>';
    }
  
    mysqli_free_result($result);
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>영화 정보 (최신 개봉년도 순)</title>
    <style>
        body {
            font-family: Consolas, monospace;
            font-family: 12px;
        }
        table {
            width: 100%;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #dadada;
            text-align: center;
        }
        th {
            background-color: #7FB6EF;
        }
        td {
            background-color: #C8E0F8;
        }
    </style>
</head>
<body>
    <h2><a href="index.php">영화정보 관리 시스템</a> | 영화 정보 (최신 개봉년도 순)</h2>
    <table>
        <tr>
            <th>release_year</th>
            <th>title</th>
            <th>length</th>
            <th>rating</th>
            <th>description</th>
        </tr>        
        <?= $article ?>
    </table>
</body>
</html>
