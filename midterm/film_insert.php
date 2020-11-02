<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> 영화정보 관리 시스템 </title>
</head>

<body>
    <h2><a href="index.php">영화정보 관리 시스템</a> | 신규 영화 등록</h2>
    <form action="emp_insert_process.php" method="POST">
        <label>film_id:</label>
        <input type="text" name="film_id" placeholder="film_id"><br>
        <label>title:</label>
        <input type="text" name="title" placeholder="title"><br>
        <label>description:</label>
        <input type="text" name="description" placeholder="description"><br>
        <label>release_year:</label>
        <input type="text" name="release_year" placeholder="release_year"><br>
        <label>length:</label>
        <input type="text" name="length" placeholder="length"><br>
        <label>rating:</label>
        <input type="text" name="rating" placeholder="rating"><br>
        <input type="submit" value="Create">
    </form>


</body>

</html>
