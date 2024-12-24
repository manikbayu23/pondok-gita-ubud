<?php
include_once 'connection.php';

$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
$subject = isset($_REQUEST['subject']) ? $_REQUEST['subject'] : '';
$country = isset($_REQUEST['country']) ? $_REQUEST['country'] : '';
$message = isset($_REQUEST['message']) ? $_REQUEST['message'] : '';

$sql = "INSERT INTO reviews (name, email, subject, country, message) VALUES (?,?,?,?,?)";
$stmt = $db->prepare($sql);

header('Content-Type: application/json');

if ($stmt->execute([$name, $email, $subject, $country, $message])) {
    echo json_encode(['success' => true, 'message' => 'Review berhasil ditambahkan']);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal menambahkan review']);
}