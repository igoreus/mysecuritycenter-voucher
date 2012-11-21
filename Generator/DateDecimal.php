<?php
/**
 * Implementation of generator that returns data:
 * 2012112100001
 * 2012112100002
 * ....
 */
class GeneratorDateDecimal extends GeneratorAbstract {

    /**
     * Returns voucher code.
     *
     * @param int $position
     * @return mixed|string
     */
    protected  function _getCode($position) {
        return sprintf ('%s%05s', date('Ymd'), $position+1);

    }


}