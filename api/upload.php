<?php
/**
 * Standalone photo upload endpoint (for AJAX pre-upload if needed)
 */
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'POST only']);
    exit;
}

$uploadDir = __DIR__ . '/../uploads/temp/';
if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

$allowed = ['image/jpeg','image/png','image/gif','image/webp'];
$results = [];

foreach ($_FILES['photos']['tmp_name'] as $i => $tmp) {
    if ($_FILES['photos']['error'][$i] !== UPLOAD_ERR_OK) continue;
    if ($_FILES['photos']['size'][$i]  > 10*1024*1024)    continue;

    $mime = mime_content_type($tmp);
    if (!in_array($mime, $allowed)) continue;

    $ext  = ['image/jpeg'=>'jpg','image/png'=>'png','image/gif'=>'gif','image/webp'=>'webp'][$mime] ?? 'jpg';
    $name = 'tmp_' . uniqid() . '.' . $ext;

    if (move_uploaded_file($tmp, $uploadDir . $name)) {
        $results[] = ['file' => $name, 'size' => $_FILES['photos']['size'][$i]];
    }
}

echo json_encode(['uploaded' => $results]);