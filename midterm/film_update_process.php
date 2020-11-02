<?php
$link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
$filtered = array(
    'film_id' => mysqli_real_escape_string($link, $_POST['film_id']),
'title' => mysqli_real_escape_string($link, $_POST['title']),
'description' => mysqli_real_escape_string($link, $_POST['description']),
'special_features' => mysqli_real_escape_string($link, $_POST['special_features']),
'length' => mysqli_real_escape_string($link, $_POST['length']),
'rating' => mysqli_real_escape_string($link, $_POST['rating'])
);

$query = "
    UPDATE film
    SET
        title = '{$filtered['title']}',
        description = '{$filtered['description']}', 
        special_features = '{$filtered['special_features']}',
        length = '{$filtered['length']}', 
        rating = '{$filtered['rating']}' 
    WHERE
        film_id = '{$filtered['film_id']}'         
    ";

    //print_r($query);

    $result = mysqli_query($link, $query);
    if ($result == false) {
        echo '수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
        error_log(mysqli_error($link));
    } else {
        echo '성공하였습니다. <a href="index.php">돌아가기</a>';
    }


?>
