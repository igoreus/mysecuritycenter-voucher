<?php
/**
 * Implementation of generator that returns data:
 * b6589fc6ab0dc82cf12099d1c2d40ab994e8410c
 * 356a192b7913b04c54574d18c28d46e6395428ab
 * ....
 */

class GeneratorSha1 extends GeneratorAbstract {

    /**
     * Returns voucher code.
     *
     * @param int $position
     * @return mixed|string
     */
    protected  function _getCode($position) {
        return sprintf ('%s', sha1($position));

    }


}