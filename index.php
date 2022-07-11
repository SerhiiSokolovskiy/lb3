<?php
$db = new PDO("mysql:host=127.0.0.1;dbname=lesson_list", "root", "");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>3</title>
    <script src="script.js"></script>
</head>
<body>
<form action="" method="post" id="group">
    <label> Group:
        <select name="group">
            <?php
            $statement = $db->query("SELECT DISTINCT `title` FROM groups");
            while ($data = $statement->fetch()) {
                echo "<option value='$data[0]'>$data[0]</option>";
            }
            ?>
        </select>
    </label>
    <input type="submit"><br>
</form>
<br>
<div id="1"></div>
<form action="" method="post" id="teacher">
    <label> Teacher:
        <select name="teacher">
            <?php
            $statement = $db->query("SELECT DISTINCT name FROM teacher");
            while ($data = $statement->fetch()) {
                echo "<option value='$data[0]'>$data[0]</option>";
            }
            ?>
        </select>
    </label>
    <input type="submit"><br>
</form>
<br>
<div id="2"></div>
<form action="" method="post" id="auditorium">
    <label> Auditorium:
        <select name="auditorium">
            <?php
            $statement = $db->query("SELECT DISTINCT auditorium FROM lesson");
            while ($data = $statement->fetch()) {
                echo "<option value='$data[0]'>$data[0]</option>";
            }
            ?>
        </select>
    </label>
    <input type="submit"><br>
</form>
<br>
<div id="3"></div>
</body>
</html>
