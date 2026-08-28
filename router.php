<?php
/**
 * J&B Junk Busters — Wasmer Edge Router
 * Replaces Apache .htaccess rules for PHP built-in server
 */

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Block direct access to /includes (site templates/config)
if (preg_match('#^/includes/#', $uri)) {
    http_response_code(403);
    echo '403 Forbidden';
    exit;
}

// Block direct access to /logs
if (preg_match('#^/logs/#', $uri)) {
    http_response_code(403);
    echo '403 Forbidden';
    exit;
}

// Block PHP execution inside /uploads (defense-in-depth)
if (preg_match('#^/uploads/.*\.php#i', $uri)) {
    http_response_code(403);
    echo '403 Forbidden';
    exit;
}

// Block dotfiles (.htaccess, .env, .git, etc.)
if (preg_match('#/\.#', $uri)) {
    http_response_code(403);
    echo '403 Forbidden';
    exit;
}

// If the file exists, let the built-in server handle it
$file = __DIR__ . $uri;
if ($uri !== '/' && is_file($file)) {
    return false;
}

// Default: serve index.php for all other routes
if ($uri === '/' || !is_file($file)) {
    require __DIR__ . '/index.php';
    return true;
}

return false;
