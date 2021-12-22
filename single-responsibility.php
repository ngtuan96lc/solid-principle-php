<?php
/**
 * |S| - Single responsibility principle
 *
 * |Theory|
 * A class should have a single responsibility, but more than that, a class should have a reason to change.
 */

declare(strict_types=1);

/**
 * Example about Single responsibility principle violation
 */

class Page {
    /**
     * @var string
     */
    protected string $title;

    public function __construct() {
        $this->title = 'Title default';
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return false|string
     */
    public function formatJson()
    {
        return json_encode($this->getTitle());
    }
}

/**
 * However, if we want to change the output of formatJson() or add another type of output to the class.
 * We need to alter the class to change an existing method or add another method to suit.
 * => This just fine for some classes as simple.
 * => A better approach to this, we create a new class that is used to format the Page object into Json.
 */

/**
 * Refactor code
 */
class PageRefactor {
    /**
     * @var string
     */
    protected string $title;

    public function __construct() {
        $this->title = 'Title default';
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}

class Formatter {
    /**
     * @param PageRefactor $page
     * @return false|string
     */
    public function jsonFormat(PageRefactor $page) {
        return json_encode($page->getTitle());
    }

    public function xmlFormat(PageRefactor $page) {
        //todo: code in here to return XML
    }
}
