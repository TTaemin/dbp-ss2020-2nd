<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> 영화 정보 관리 시스템 </title>
</head>

<body>
    <h1> 영화 정보 관리 시스템 </h1>
    <a href="film_select.php">(1) 영화 정보 조회</a><br>
    <a href="film_insert.php">  - 신규 영화 등록</a><br>

    <form action="film_update.php" method="POST">
            - 영화 정보 수정:
        <input type="text" name="film_id" placeholder="film_id">
        <input type="submit" value="Search">
    </form>

    <form action="film_delete.php" method="POST">
            - 영화 정보 삭제:
        <input type="text" name="film_id" placeholder="film_id">
        <input type="submit" value="Delete">
    </form>

    <form action="length_info.php" method="GET">
        (2) 영화 길이 순으로 영화 조회: 
        <input type="text" name="number" placeholder="number">
        <input type="submit" value="Search">
    </form>

    <form action="year_info.php" method="GET">
        (3) 최신개봉 순으로 영화 정보 조회: 
        <input type="text" name="number" placeholder="number">
        <input type="submit" value="Search">
    </form>

    <form action="rating_info.php" method="GET">
        (4) 등급별로 영화 정보 조회: 
        <input type="text" name="number" placeholder="number">
        <input type="submit" value="Search">
    </form>


</body>

</html>
