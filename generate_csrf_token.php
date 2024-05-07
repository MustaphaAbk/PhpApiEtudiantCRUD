<?php

// Start the session
session_start();

// Generate a CSRF token
$token = bin2hex(random_bytes(32));

// Store the CSRF token in the session
$_SESSION['csrf_token'] = $token;

// Output the CSRF token
echo $token;
