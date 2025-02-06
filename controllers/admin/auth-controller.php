<?php
include_once 'connection.php';

$name = $_REQUEST['name'];
$dateNow = date('Y-m-d H:i:s');

switch ($name) {
    case 'login':
        try {
            $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
            $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';

            // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $sql = "SELECT * FROM users WHERE username =  ? LIMIT 1";
            $stmt = $db->prepare($sql);
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && (password_verify($password, $user['password']))) {
                $_SESSION['user'] = [
                    'name' => $user['name'],
                    'username' => $user['username'],
                    'email' => $user['email']
                ];
                echo json_encode(value: ['success' => true, 'message' => 'Berhasil masuk', 'url' => route('/admin/dashboard')]);
            } else {
                echo json_encode(value: ['success' => false, 'message' => 'Username atau password salah']);
            }
        } catch (PDOException $e) {
            echo json_encode(value: ['success' => false, 'message' => $e->getMessage()]);
        }
        break;
    case 'logout':
        session_unset(); // Hapus semua variabel dalam session
        session_destroy();
        header('Location: ' . route('/admin/login'));
        break;
    case 'store':
        try {
            $name = 'admin2';
            $username = 'admin2';
            $email = 'admin2@gmail.com';
            $password = 'admin2025#';
            $token = ' ';
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $sql = "INSERT INTO users (name, username, password, email, remember_token, created_at, updated_at) VALUES (?,?,?,?,?, now(), now())";
            $stmt = $db->prepare($sql);
            $stmt->execute([$name, $username, $hashedPassword, $email, $token]);

            echo json_encode(value: ['success' => true, 'message' => 'Berhasil membuat admin baru']);
        } catch (PDOException $e) {
            echo json_encode(value: ['success' => false, 'message' => $e->getMessage()]);
        }
        break;
}
exit();