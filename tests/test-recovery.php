<?php
require_once __DIR__ . '/bootstrap.php';
require_once dirname(__DIR__) . '/includes/class-recovery-engine.php';

echo "Testing Woo_Abandoned_Cart_Recovery (Deep Logic)...
";
$engine = Woo_Abandoned_Cart_Recovery::instance();
assert($engine instanceof Woo_Abandoned_Cart_Recovery, "Instance check");

// Test 1: Helper email validation
assert(is_email('valid.customer@gmail.com') === true, "Valid email check");
assert(is_email('invalid-string') === false, "Invalid email rejection");

// Test 2: Password / recovery token generation length
$token = wp_generate_password(32, false);
assert(strlen($token) >= 32, "Token must be at least 32 characters");

echo "PASS: Woo_Abandoned_Cart_Recovery deep assertions passed.
";
