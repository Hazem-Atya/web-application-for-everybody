<?php
session_start();
include_once "ConnexionPDO.php";
$pdo = ConnexionPDO::getInstance();
if (!isset($_SESSION['name']) || !isset($_SESSION['user_id'])) {
    die('Acess denied');
}
if (!isset($_GET['profile_id'])) {
    $_SESSION['error'] = 'Missing profile_id';
    header("location:index.php");
    return;
}
$stmt = $pdo->prepare("SELECT * FROM profile WHERE profile_id=:id ");
$stmt->execute(array(
    'id' => $_GET['profile_id']
));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<head>
    <title>Hazem Atya</title>
</head>
<body>
<h1>Profile information</h1>
<p>First_Name: <?= $row['first_name'] ?></p>
<p>last_Name: <?= $row['last_name'] ?></p>
<p>Email: <?= $row['email'] ?></p>
<p>Headline: <?= $row['headline'] ?></p>
<p>Summary: <?= $row['summary'] ?></p>

<a href="index.php">Done</a>
</body>
