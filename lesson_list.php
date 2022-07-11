<?php
$db = new PDO("mysql:host=127.0.0.1;dbname=lesson_list", "root", "");

if (isset($_POST["group"])) {
    $statement = $db->prepare("SELECT week_day, lesson_number, auditorium, disciple, type
    FROM lesson INNER JOIN lesson_groups 
    ON ID_Lesson = FID_Lesson2
    INNER JOIN groups ON FID_Groups = ID_Groups
    WHERE `title` = :group");
    $statement->execute([":group" => $_POST["group"]]);
    while ($data = $statement->fetch()) {
        echo "<b> Day: </b> {$data['week_day']}; <b>Lesson: </b> {$data['lesson_number']}; <b> Auditorium: </b> {$data['auditorium']}; <b> Disciple: </b> {$data['disciple']}; <b> Type: </b> {$data['type']}.<br>";
    }

} elseif (isset($_POST["teacher"])) {
    $statement = $db->prepare("SELECT week_day, lesson_number, auditorium, disciple, type
    FROM lesson INNER JOIN lesson_teacher ON ID_Lesson = FID_Lesson1
    INNER JOIN teacher ON FID_Teacher = ID_Teacher
    WHERE name = :teacher");
    $statement->execute([":teacher"=>$_POST["teacher"]]);

    $txt = "<hr><div>";
    while ($data = $statement->fetch()) {
        $txt .= " <b> Day: </b> {$data['week_day']}; <b>Lesson: </b> {$data['lesson_number']}; <b> Auditorium: </b> {$data['auditorium']}; <b> Disciple: </b> {$data['disciple']}; <b> Type: </b> {$data['type']}.<br>";
    }
    $txt .= "</div>";
    echo json_encode($txt);

} elseif (isset($_POST["auditorium"])) {
    $statement = $db->prepare("SELECT week_day, lesson_number, auditorium, disciple, type 
    FROM lesson
    WHERE auditorium = :auditorium");
    $statement->execute([":auditorium"=>$_POST["auditorium"]]);

    echo "<hr><div>";
    while ($data = $statement->fetch()) {
        echo " <b> Day: </b> {$data['week_day']}; <b>Lesson: </b> {$data['lesson_number']}; <b> Auditorium: </b> {$data['auditorium']}; <b> Disciple: </b> {$data['disciple']}; <b> Type: </b> {$data['type']}.<br>";
    }
    echo "</div>";
}