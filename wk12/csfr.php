<?php
    $message = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == "host" && $password == "pass"){
            $message = "Login successful";
        } else {
            $message = "Login failed";
        }
    }
?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password"><br>
  <button type="submit" value="submit">Submit</button>
  <div>
    <?php echo $message; ?>
  </div>
</form>
