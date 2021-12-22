<?php
/**
 * |L| - Liskov substitution principle
 *
 * |Theory|
 * This state that objects should be replaceable by their subtypes without altering how the program works.
 */

declare(strict_types=1);

/**
 * Example about Liskov substitution principle violation
 */

class Rectangle {
    protected $width;
    protected $height;

    /**
     * @param $w
     * @return void
     */
    public function setWidth($w)
    {
        $this->width = $w;
    }

    /**
     * @param $h
     * @return void
     */
    public function setHeight($h)
    {
        $this->height = $h;
    }

    /**
     * @return float|int
     */
    public function calculateArea()
    {
        return $this->width * $this->height;
    }
}

class Square extends Rectangle {
    /**
     * @param $h
     * @return void
     */
    public function setHeight($h)
    {
        $this->width = $h;
        $this->height = $h;
    }

    /**
     * @param $w
     * @return void
     */
    public function setWidth($w)
    {
        $this->width = $w;
        $this->height = $w;
    }
}

$rectangle = new Rectangle();
$rectangle->setHeight(10);
$rectangle->setWidth(5);
echo $rectangle->calculateArea(); // result: 10 * 5 = 50

$square = new Square();
$square->setHeight(10);
$square->setWidth(5);
echo $square->calculateArea(); // result: 5 * 5 = 25
