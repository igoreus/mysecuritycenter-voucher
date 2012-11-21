<?php
/**
 * Abstract class for all generator.
 */

abstract class GeneratorAbstract implements Iterator, GeneratorInterface {

    /**
     * @var int
     */
    protected $_quantity = 10;

    /**
     * @var int
     */
    protected $_position = 0;

    /**
     * @var int
     */
    protected $_rewind_position = 0;

    /**
     * Constructor of class
     */
    public function __construct() {
        $this->position = 0;
    }

    /**
     * Method returns voucher code.
     *
     * @param int $position
     * @return mixed
     */
    abstract protected function _getCode($position);

    /**
     * Setter for _quantity.
     *
     * @param int $quantity
     * @return GeneratorInterface
     */
    public function setQuantity($quantity) {
        $this->_quantity = $quantity;
        return $this;
    }

    /**
     * Setter for _position.
     *
     * @param int $position
     * @return GeneratorInterface
     */
    public function setPosition($position) {
        $this->_position = $position;
        $this->_rewind_position = $position;

        return $this;
    }

    /**
     * Rewind the Iterator to the first element.
     *
     */
    function rewind() {
        $this->_position = $this->_rewind_position;
    }

    /**
     * Return the key of the current element.
     *
     * @return int|mixed
     */
    function key() {
        return $this->_quantity;
    }

    /**
     * Checks if current position is valid.
     *
     * @return bool
     */
    function valid() {
        return $this->_position < $this->_quantity;
    }

    /**
     * Return the current element.
     *
     * @return mixed
     */
    function current() {
        return $this->_getCode($this->_position);

    }

    /**
     * Move forward to next element
     *
     */
    function next() {
        $this->_position++;
    }
}