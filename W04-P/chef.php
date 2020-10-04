<?php
  $link = mysqli_connect('localhost', 'root', 'rootroot', 'dbp');
  $query = "SELECT * FROM chef";
  $result = mysqli_query($link, $query);
  $chef_info = '';

  while ($row = mysqli_fetch_array($result)) {
      $filtered = array(
      'id' => htmlspecialchars($row['id']),
      'name' => htmlspecialchars($row['name']),
      'country' => htmlspecialchars($row['country'])
    );
      $chef_info .= '<tr>';
      $chef_info .= '<td>'.$filtered['id'].'</td>';
      $chef_info .= '<td>'.$filtered['name'].'</td>';
      $chef_info .= '<td>'.$filtered['country'].'</td>';
      $chef_info .= '<td><a href="chef.php?id='.$filtered['id'].'">update</a></th>';
      $chef_info .= '
        <td>
          <form action="process_delete_chef.php" method="post">
            <input type="hidden" name="id" value="'.$filtered['id'].'">
            <input type="submit" value="delete">
          </form>
        </td>
      ';
      $chef_info .= '</tr>';
  };

  $escaped = array(
    'name' => '',
    'country' => ''
  );

  $form_action = 'process_create_chef.php';
  $label_submit = 'Creat chef';
  $form_id = '';

  if (isset($_GET['id'])) {
      $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
      settype($filtered_id, 'integer');
      $query = "SELECT * FROM chef WHERE id = {$filtered_id}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $escaped['name'] = htmlspecialchars($row['name']);
      $escaped['country'] = htmlspecialchars($row['country']);

      $form_action = 'process_update_chef.php';
      $label_submit = 'Update chef';
      $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
  }


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Food</title>
  </head>
  <body>
    <h1><a href="index.php">Food</a></h1>
    <p><a href="index.php">chef</a></p>

    <table border="1">
      <tr>
        <th>id</th>
        <th>name</th>
        <th>country</th>
        <th>update</th>
        <th>delete</th>
      </tr>
        <?= $chef_info ?>
    </table>
    <br>
  <form action="<?= $form_action ?>" method="post">
    <?= $form_id ?>
    <label for="fname">name:</label><br>
    <input type="text" id="fname" name="name" placeholder="name" value="<?=$escaped['name']?>"><br>
    <label for="lname">country:</label><br>
    <input type="text" id="country" name="country" placeholder="country" value="<?=$escaped['country']?>"><br><br>
    <input type="submit" value="<?= $label_submit ?>">
  </form>

  </body>
</html>
