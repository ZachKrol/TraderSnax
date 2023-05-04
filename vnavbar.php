<?php
// Include config file
$config = parse_ini_file("dbconfig.ini");

//Database connection
$link = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);
// Check connection
if ($link->connect_error) {
  die("Connection failed: " . $link->connect_error);
}

$sql = "select * from users";
$result = $link->query($sql);
$link->close();
?>
<html>
<body>    
<nav class="navbar navbar-expand-sm bg-light justify-content-center sticky-top">
<div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="">Review</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="products.php">Products</a>
      </li>
      <form class="d-flex">
        <input class="form-control me-2 rounded-pill" id="searchUser" name="searchUser" type="text" placeholder="Search Users" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
      </form>
      <ul class="dropdown-menu" id="searchResults" aria-labelledby="defaultDropdown">
      <?php
        while($record = $result->fetch_assoc()){
          $username = $record['username'];
          echo '<li><a class="dropdown-item" href="profile.php?username=' . $username . '">' . $username . '</a></li>';

        }
      ?>
      </ul>

      <li class="nav-item dropdown">
        <!-- TO DO: INSERT USER NAME AND PHOTO -->
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <img src="" alt="Logo" style="width:40px;" class="rounded-pill">
            username</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
        </ul>    
      </li>
    </ul>
  </div>
</nav>
<script>
$(document).ready(function(){
  $("#searchUser").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#searchResults li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>