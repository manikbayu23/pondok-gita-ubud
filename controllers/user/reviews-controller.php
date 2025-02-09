<?php
include_once 'connection.php';

$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
$country = isset($_REQUEST['country']) ? $_REQUEST['country'] : '';
$message = isset($_REQUEST['message']) ? $_REQUEST['message'] : '';
$rate = isset($_REQUEST['star-radio']) ? (int) $_REQUEST['star-radio'] : 0;

try {

    if ($rate == 0) {
        echo json_encode(value: ['success' => false, 'message' => 'Rating harus diisi.']);
        exit();
    }

    $sql = "INSERT INTO reviews (name, email, status, country, message, created_at, rate) VALUES (?,?,'1',?,?,now(), ?)";
    $stmt = $db->prepare($sql);

    header('Content-Type: application/json');

    if ($stmt->execute([$name, $email, $country, $message, $rate])) {
        echo json_encode(value: ['success' => true, 'message' => 'Review berhasil ditambahkan']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal menambahkan review']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
