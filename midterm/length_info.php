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
    select length, film_id, title, rating, description
    from film 
    order by length asc limit ".$filtered_number   
    ;

    $result = mysqli_query($link, $query);  

    $article = '';    
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr>';
        $article .= '<td>'.$row['length'].'</td>';
        $article .= '<td>'.$row['film_id'].'</td>';
        $article .= '<td>'.$row['title'].'</td>';
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
    <title>영화 정보 (영화 길이 순)</title>
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
    <h2><a href="index.php">영화정보 관리 시스템</a> | 영화 정보 (영화 길이 순)</h2>
    <table>
        <tr>
            <th>length</th>
            <th>film_id</th>
            <th>title</th>
            <th>rating</th>
            <th>description</th>
        </tr>        
        <?= $article ?>
    </table>
</body>
</html>
