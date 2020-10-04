<?php
  $link = mysqli_connect('localhost', 'root', 'rootroot', 'dbp');
  $filtered = array(
    'name' => mysqli_real_escape_string($link, $_POST['name']),
    'country' => mysqli_real_escape_string($link, $_POST['country'])
  );
  $query = "
    INSERT INTO chef
      (name, country)
      VALUES (
        '{$filtered['name']}',
        '{$filtered['country']}'
        )
  ";

  $result = mysqli_query($link, $query);
  if ($result == false) {
      echo '저장하는 과정에서 문제가 발생했습니다. 관라자에게 문의하세요.';
      error_log(mysqli_error($link));
  } else {
      header('Location: chef.php');
  }
