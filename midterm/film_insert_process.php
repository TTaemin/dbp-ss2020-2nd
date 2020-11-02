<?php
$link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
$filtered = array(
    'film_id' => mysqli_real_escape_string($link, $_POST['film_id']),
    'title' => mysqli_real_escape_string($link, $_POST['title']),
    'description' => mysqli_real_escape_string($link, $_POST['description']),
    'release_year' => mysqli_real_escape_string($link, $_POST['release_year']),
    'length' => mysqli_real_escape_string($link, $_POST['length']),
    'rating' => mysqli_real_escape_string($link, $_POST['rating'])
);

$query = "
    INSERT INTO film (
        film_id, 
        title, 
        description, 
        release_year, 
        length, 
        rating
    ) VALUES (
        '{$filtered['film_id']}', 
        '{$filtered['title']}',
        '{$filtered['description']}', 
        '{$filtered['release_year']}',
        '{$filtered['length']}', 
        '{$filtered['rating']}'        
    )
    ";

    //print_r($query);

    $result = mysqli_query($link, $query);
    if ($result == false) {
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
        error_log(mysqli_error($link));
    } else {
        echo '성공하였습니다. <a href="index.php">돌아가기</a>';
    }


?>
