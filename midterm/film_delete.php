<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
    if(isset($_GET['film_id'])){
        $filtered_id = mysqli_real_escape_string($link, $_GET['film_id']);
    } else {
        $filtered_id = mysqli_real_escape_string($link, $_POST['film_id']);        
    }
    $query = " 
        SELECT * 
        FROM film 
        WHERE film_id='{$filtered_id}' 
        ";    
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    //print_r($row);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> 영화정보 관리 시스템 </title>
</head>

<body>
<h2><a href="index.php">영화정보 관리 시스템</a> | 영화 정보 삭제</h2>
    <form action="film_delete_process.php" method="POST">
    <label>film_id: </label>
        <input type="text" name="film_id" value="<?=$row['film_id']?>" placeholder="film_id"><br>
        <label>title:</label>
        <input type="text" name="title" value="<?=$row['title']?>" placeholder="title"><br>
        <label>description:</label>
        <input type="text" name="description" value="<?=$row['description']?>" placeholder="description"><br>
        <label>special_features:</label>
        <input type="text" name="special_features" value="<?=$row['special_features']?>" placeholder="special_features"><br>
        <label>length:</label>
        <input type="text" name="length" value="<?=$row['length']?>" placeholder="length"><br>
        <label>rating:</label>
        <input type="text" name="rating" value="<?=$row['rating']?>" placeholder="rating"><br>
        <input type="submit" value="Delete">
    </form>


</body>

</html>
