<?php

  include('./config/db_connect.php');

  //check GET request id param
  if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // make sql
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    // make query & get result
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array
    $pizza = mysqli_fetch_assoc($result);

    // free result from memory
    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);

    // print_r($pizza);
  }
?>

<!DOCTYPE html>
<html>

  <?php include('templates/header.php'); ?>

  <div class="containar center">
    <?php if($pizza): ?>
      <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
      <p>Created by <?php echo htmlspecialchars($pizza['email'])?></p>
      <p><?php echo date($pizza['created_at']); ?></p>
      <h5>Ingredients</h5>
      <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>
    <?php else: ?>
      <h5>No such pizza exists!</h5>
    <?php endif;?>
  </div>

  <?php include('templates/footer.php'); ?>

</html>