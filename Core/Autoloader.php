<?php
/**
 * Autoloader class.
 *
 */


class CoreAutoloader {

    /**
     * @var CoreAutoloader
     */
    protected static $_instance;

    /**
     * @var string
     */
    protected $_extension = '.php';

    /**
     * Singleton instance.
     *
     * @return CoreAutoloader
     */
    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor of class.
     */
    protected function __construct() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     *  Autoloader.
     *
     * @param string $className
     * @return bool
     */
    public static function autoload($className) {
        $self = self::getInstance();
        $result = array();
        preg_match_all('/[A-Z][a-z1-9]+/', $className, $result);

        for ($i = sizeof($result[0]); $i > 0; $i--) {
            $filePath = array_slice($result[0], 0, $i);
            $fileName = array_slice($result[0], $i);
            $file = ROOT_PATH . '/' . implode ('/', $filePath) . implode ('', $fileName) . $self->_extension;
            if ($self->_loadFile($file)) {

                return true;
            }
        }
        return false;
    }

    /**
     * Function loads file if it is readable.

     * @param string $file
     * @return boolean
     */
    protected function _loadFile($file) {
        if (!is_readable($file)) {
            return false;
        }
        require_once $file;
        return true;
    }
}