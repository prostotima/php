<?php
require_once __DIR__ . '/../classes/Student.php';
require_once __DIR__ . '/../classes/Teacher.php';

// Створюємо об’єкти
$student = new Student("Іван Іванов", "student@example.com");
$student->setGroup("КН-21");

$teacher = new Teacher("Олена Петрівна", "teacher@example.com");
$teacher->setSubject("Математика");
?>

<h1>Користувачі системи</h1>

<h2>Студент</h2>
<p>Ім’я: <?= $student->getName() ?></p>
<p>Email: <?= $student->getEmail() ?></p>
<p>Роль: <?= $student->getRole() ?></p>
<p>Група: <?= $student->getGroup() ?></p>

<h2>Викладач</h2>
<p>Ім’я: <?= $teacher->getName() ?></p>
<p>Email: <?= $teacher->getEmail() ?></p>
<p>Роль: <?= $teacher->getRole() ?></p>
<p>Предмет: <?= $teacher->getSubject() ?></p>
