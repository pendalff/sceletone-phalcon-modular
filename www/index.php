<?php
/**
 * Read the configuration
 */
include __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'Application.php';
try {
    $app = new Application();
    $app->run();
} catch (\Exception $e) {
    var_dump($e);
    echo $e->getMessage();
}
