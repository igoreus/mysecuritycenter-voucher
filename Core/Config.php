<?php
/**
 * Config class.Class works with ini files.
 *
 */


class CoreConfig {

    /**
     * @var CoreConfig
     */
    protected static $_instance = null;

    /**
     * @var array
     */
    protected $_config = array();

    /**
     * @var string
     */
    protected $_errorMessage = '';


    private function __construct() {}

    private function __clone() {}

    private function __wakeup() {}

    /**
     * Singleton instance.
     *
     * @return CoreConfig
     */
    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Handles errors
     *
     * @param integer $errno
     * @param string $errstr
     * @param string $errfile
     * @param integer $errline
     */
    protected function _errorHandler($errno, $errstr, $errfile, $errline) {
        $this->_errorMessage .= ($this->_errorMessage ? $errstr : "\n" . $errstr);
    }

    /**
     * Load INI file and sets config array.
     *
     * @param string $filename
     * @return true
     * @throws ExceptionConfig
     */
    public function loadFile($filename) {
        set_error_handler(array($this, '_errorHandler'));
        $this->_config = parse_ini_file($filename, true);
        restore_error_handler();

        if ($this->_errorMessage) {
            throw new ExceptionConfig($this->_errorMessage);
        }
        return true;
    }

    /**
     * Returns config as array.
     *
     * @return array
     */
    public function toArray() {
        return $this->_config;
    }


    /**
     * Returns config variable ny name.
     *
     * @param $name
     * @param null $default
     * @return mixed
     */
    public function get($name, $default = null)
    {
        $result = $default;
        if (array_key_exists($name, $this->_config)) {
            $result = $this->_config[$name];
        }
        return $result;
    }

    /**
     * Magic function ($obj->value works).
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->get($name);
    }

}