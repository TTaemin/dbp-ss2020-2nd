<?php
    $link = mysqli_connect("localhost", "admin", "admin", "sakila");
    $query = "SELECT * FROM film ORDER BY film_id ASC LIMIT 100";
    $result = mysqli_query($link, $query);
    //print_r($result);
    //print_r($row);
    $film_info = '';
    while($row = mysqli_fetch_array($result)) {
    $film_info .= '<tr>';
    $film_info .= '<td>'.$row['film_id'].'</td>';
    $film_info .= '<td>'.$row['title'].'</td>';
    $film_info .= '<td>'.$row['description'].'</td>';
    $film_info .= '<td>'.$row['special_features'].'</td>';
    $film_info .= '<td>'.$row['length'].'</td>';
    $film_info .= '<td>'.$row['rating'].'</td>';
    $film_info .= '<td><a href="film_update.php?film_id='.$row['film_id'].'">update</a>
    </td>';
    $film_info .= '<td><a href="film_delete.php?film_id='.$row['film_id'].'">delete</a>
    </td>';
    $film_info .= '</tr>';
    }
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> 영화정보 관리 시스템 </title>
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
            background-color: #C385E3;
        }
        td {
            background-color: #EED5FA;
        }
    </style>
</head>

<body>
    <h2><a href="index.php">영화정보 관리 시스템</a> | 영화 정보 조회</h2>
    <table border="0">
        <tr>
            <th>film_id</th>
            <th>title</th>
            <th>description</th>
            <th>special_features</th>
            <th>length</th>
            <th>rating</th>
            <th>update</th>
            <th>delete</th>
        </tr>
        <?=$film_info?>
    </table>

</body>

</html>
