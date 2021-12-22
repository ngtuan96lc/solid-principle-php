<?php
/**
 * |I| - Interface Segregation principle
 * |Theory|
 * Instead of using a big interface, we should divide it into many small interfaces with many specific purposes.
 */

declare(strict_types=1);

/**
 * Example about Interface Segregation violation
 */

interface WorkableInterface {
    public function test();
    public function writeCode();
    public function attendMeetings();
}

class Tester implements WorkableInterface {
    /**
     * @return string
     */
    public function test(): string
    {
        return 'I am testing';
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function writeCode()
    {
        throw new Exception('Opps! I can write code');
    }

    /**
     * @return string
     */
    public function attendMeetings(): string
    {
        return 'I can attend daily meeting';
    }
}

class ProjectManager implements WorkableInterface {
    /**
     * @return mixed
     * @throws Exception
     */
    public function test()
    {
        throw new Exception('Wtf! Do I have to do this?');
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function writeCode()
    {
        throw new Exception('Nope! I will not write code');
    }

    /**
     * @return string
     */
    public function attendMeetings(): string
    {
        return 'Ok, I can attend daily meeting';
    }
}

/**
 * We can see, the ProjectManager need not test or write code.
 * Simply put, it's none of ProjectManager's business
 *
 * => A better approach to this, we create more interfaces with many purposes
 */

/**
 * Refactor code
 */
interface WorkerInterface {
    public function attendMeetings();
}

interface CoderInterface {
    public function writeCode();
}

interface TesterInterface {
    public function test();
}

class Tester2 implements WorkerInterface, TesterInterface {
    /**
     * @return string
     */
    public function attendMeetings(): string
    {
        return 'I can join daily meeting';
    }

    /**
     * @return string
     */
    public function test(): string
    {
        return 'I am testing';
    }
}

class ProjectManager2 implements WorkerInterface {
    /**
     * @return string
     */
    public function attendMeetings(): string
    {
        return 'OK, I can join daily meeting';
    }
}