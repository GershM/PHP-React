<?php
declare(strict_types=1);

require __DIR__."/../../server/main.php";
// Run app - remote mode
try {
    bootstrap()->run();
}
catch (Exception $t) {
    echo '<br>';
    echo $t;
}
