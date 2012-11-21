<?php
/**
 * File generate voucher numbers.
 */
date_default_timezone_set('UTC');
define('ROOT_PATH',realpath(dirname(__FILE__)));

require_once(ROOT_PATH . '/Core/Autoloader.php');
// Register autoloader
CoreAutoloader::getInstance();
// Load config
$config = CoreConfig::getInstance();
$config->loadFile(ROOT_PATH . '/Config/vouchers.ini');

$voucher = $config->get('voucher');

if(!in_array($voucher['algorithm'], $config->get('available_algorithms'))) {
    throw new ExceptionBase(sprintf('Algorithm: %s is not available', $voucher['algorithm']));
}

$generator = GeneratorCreator::factory($voucher['algorithm'], $voucher['quantity'], $voucher['position']);

foreach($generator as $code) {
    echo $code . "\n";

}







