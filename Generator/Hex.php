<?php
/**
 * Implementation of generator that returns data:
 * 00001
 * 00002
 * ....
 * 000e
 * 000f
 * ....
 */

class GeneratorHex extends GeneratorAbstract {

    /**
     * Returns voucher code.
     *
     * @param int $position
     * @return mixed|string
     */
    protected  function _getCode($position) {
        return sprintf ('%05s', dechex($position+1));

    }


}