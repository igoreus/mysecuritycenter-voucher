<?php
/**
 * Implementation of generator that returns data:
 * 00001
 * 00002
 * ....
 */
class GeneratorDecimal extends GeneratorAbstract {

    /**
     * Returns voucher code.
     *
     * @param int $position
     * @return mixed|string
     */
    protected  function _getCode($position) {
        return sprintf ('%05s', $position+1);

    }


}