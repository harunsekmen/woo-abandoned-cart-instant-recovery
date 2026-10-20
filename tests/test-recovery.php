<?php
require_once __DIR__ . '/bootstrap.php';

require_once dirname(__DIR__) . '/includes/class-recovery-engine.php';

echo "Testing Woo_Abandoned_Cart_Recovery...
";
$engine = Woo_Abandoned_Cart_Recovery::instance();
assert($engine instanceof Woo_Abandoned_Cart_Recovery, "Instance check");
echo "PASS: Woo_Abandoned_Cart_Recovery verified.
";
