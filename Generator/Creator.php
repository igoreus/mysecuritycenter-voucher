<?php
/**
 * Factory for creating different generators which implement GeneratorInterface.
 */

class GeneratorCreator {

    /**
     * @var string
     */
    protected static $_prefix = 'Generator';

    /**
     * Factory method.
     *
     * @param string $algorithm
     * @param int $quantity
     * @param int $position
     * @return GeneratorInterface
     * @throws ExceptionGenerator
     */
    public static function factory($algorithm, $quantity, $position = 0) {
        $className = self::$_prefix . $algorithm;
        $generator = new $className();

        if ($generator instanceof GeneratorInterface) {
            $generator->setQuantity($quantity + $position)->setPosition($position);
        } else {
            throw new ExceptionGenerator('Generator must implement GeneratorInterface');
        }
        return $generator;
    }
}