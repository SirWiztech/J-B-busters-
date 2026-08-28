<?php
/**
 * J&B Junk Busters — Quote Request Handler
 * No database — sends email + saves to JSON log file
 */
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// ── Sanitize inputs ──────────────────────────────────────────
function clean(string $val): string {
    return htmlspecialchars(strip_tags(trim($val)), ENT_QUOTES, 'UTF-8');
}

$name    = clean($_POST['name']    ?? '');
$phone   = clean($_POST['phone']   ?? '');
$email   = clean($_POST['email']   ?? '');
$zip     = clean($_POST['zip']     ?? '');
$service = clean($_POST['service'] ?? '');
$volume  = clean($_POST['volume']  ?? '');
$details = clean($_POST['details'] ?? '');
$urgent  = isset($_POST['urgent']) ? 'YES — Same Day Requested!' : 'No';

// ── Validation ────────────────────────────────────────────────
$errors = [];
if (empty($name))           $errors[] = 'Name is required.';
if (empty($phone))          $errors[] = 'Phone number is required.';
if (empty($zip))            $errors[] = 'Zip code is required.';
if (empty($service))        $errors[] = 'Please select a service.';

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

// ── Handle photo uploads ──────────────────────────────────────
$uploadedFiles = [];
$uploadDir     = __DIR__ . '/../uploads/quotes/';

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

if (!empty($_FILES['photos']['name'][0])) {
    $allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $maxSize = 10 * 1024 * 1024; // 10MB

    foreach ($_FILES['photos']['tmp_name'] as $idx => $tmpName) {
        if ($_FILES['photos']['error'][$idx] !== UPLOAD_ERR_OK) continue;
        if ($_FILES['photos']['size'][$idx]  > $maxSize)       continue;

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime  = finfo_file($finfo, $tmpName);
        finfo_close($finfo);

        if (!in_array($mime, $allowed, true)) continue;

        $ext      = match($mime) {
            'image/jpeg' => 'jpg',
            'image/png'  => 'png',
            'image/gif'  => 'gif',
            'image/webp' => 'webp',
            default      => 'jpg'
        };
        $filename = sprintf('quote_%s_%d.%s', date('Ymd_His'), $idx, $ext);
        $dest     = $uploadDir . $filename;

        if (move_uploaded_file($tmpName, $dest)) {
            $uploadedFiles[] = $dest;
        }
    }
}

// ── Build email ───────────────────────────────────────────────
$to      = 'info@jnbjunkbusters.com';
$subject = "🚛 New Quote Request — J&B Junk Busters Website";

$body  = "═══════════════════════════════════════\n";
$body .= "  NEW QUOTE REQUEST — J&B JUNK BUSTERS\n";
$body .= "═══════════════════════════════════════\n\n";
$body .= "👤 Name:     {$name}\n";
$body .= "📞 Phone:    {$phone}\n";
$body .= "✉️  Email:    " . ($email ?: 'Not provided') . "\n";
$body .= "📍 Zip:      {$zip}\n";
$body .= "🔧 Service:  {$service}\n";
$body .= "📦 Volume:   " . ($volume ?: 'Not specified') . "\n";
$body .= "⚡ Urgent:    {$urgent}\n\n";
$body .= "📝 Details:\n{$details}\n\n";
$body .= "📸 Photos attached: " . count($uploadedFiles) . "\n";
$body .= "───────────────────────────────────────\n";
$body .= "Sent from jnbjunkbusters.com at " . date('F j, Y g:i A T') . "\n";

$headers  = "From: JNB Website <noreply@jnbjunkbusters.com>\r\n";
$headers .= "Reply-To: {$email}\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

// Attach photos via multipart if any
if (!empty($uploadedFiles)) {
    $boundary = md5(time());
    $headers  = "From: JNB Website <noreply@jnbjunkbusters.com>\r\n";
    $headers .= "Reply-To: {$email}\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"\r\n";

    $body = "--{$boundary}\r\n";
    $body .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $body .= "New quote request from {$name} ({$phone})\n";
    $body .= "Service: {$service} | Zip: {$zip} | Volume: {$volume}\n";
    $body .= "Urgent: {$urgent}\nDetails: {$details}\n\r\n";

    foreach ($uploadedFiles as $file) {
        $content  = chunk_split(base64_encode(file_get_contents($file)));
        $fname    = basename($file);
        $mime     = mime_content_type($file);
        $body    .= "--{$boundary}\r\n";
        $body    .= "Content-Type: {$mime}; name=\"{$fname}\"\r\n";
        $body    .= "Content-Transfer-Encoding: base64\r\n";
        $body    .= "Content-Disposition: attachment; filename=\"{$fname}\"\r\n\r\n";
        $body    .= "{$content}\r\n";
    }
    $body .= "--{$boundary}--\r\n";
}

$mailSent = mail($to, $subject, $body, $headers);

// ── Save to JSON log (no database needed) ─────────────────────
$logFile = __DIR__ . '/../logs/quotes.json';
$logDir  = dirname($logFile);

if (!is_dir($logDir)) {
    mkdir($logDir, 0755, true);
}

$entry = [
    'id'        => uniqid('q_', true),
    'timestamp' => date('c'),
    'name'      => $name,
    'phone'     => $phone,
    'email'     => $email,
    'zip'       => $zip,
    'service'   => $service,
    'volume'    => $volume,
    'details'   => $details,
    'urgent'    => $urgent,
    'photos'    => array_map('basename', $uploadedFiles),
    'mail_sent' => $mailSent,
    'ip'        => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
];

$existing = file_exists($logFile) ? json_decode(file_get_contents($logFile), true) : [];
array_unshift($existing, $entry);
file_put_contents($logFile, json_encode($existing, JSON_PRETTY_PRINT));

// ── Response ──────────────────────────────────────────────────
echo json_encode([
    'success' => true,
    'message' => 'Quote request received! We\'ll be in touch within 15 minutes.',
    'ref'     => $entry['id'],
]);