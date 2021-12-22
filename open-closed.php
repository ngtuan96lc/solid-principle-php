<?php
/**
 * |O| Open Closed principle
 *
 * |Theory|
 * Classes should be "open for extension, but close for modification".
 * Essentially meaning that classes should be extended to change functionality,
 * rather than being altered into something else.
 */

declare(strict_types=1);

/**
 * Example about Open Closed principle violation
 */

class Developer {
    /**
     * @return string
     */
    public function code()
    {
        return 'Coding';
    }
}

class Tester {
    /**
     * @return string
     */
    public function test()
    {
        return 'Testing';
    }
}

class ProjectManagement {
    /**
     * @param $member
     * @return mixed
     * @throws Exception
     */
    public function process($member)
    {
        if ($member instanceof Developer) {
            $member->code();
        } elseif ($member instanceof Tester) {
            $member->test();
        }
        throw new Exception('Invalid input member');
    }
}

/**
 * The problem with this setup is that we are restricted by the types of object can pass to the ProjectManagement class.
 * For example, if we want to pass a TeamLeader object to ProjectManagement class.
 * We need to write a conditional statements.
 * => This meaning we need to modify function process()
 *
 * => The correct way to approach this problem is creating an interface,
 * then implement it for Developer / Tester class.
 */

/**
 * Refactor code
 */
interface Workable {
    public function work();
}

class DeveloperRefactor implements Workable
{
    /**
     * @return string
     */
    public function work()
    {
        return 'Coding';
    }
}

class TesterRefactor implements Workable
{
    /**
     * @return string
     */
    public function work()
    {
        return 'Testing';
    }
}

class ProjectManagementRefactor
{
    public function process(Workable $member)
    {
        $member->work();
    }
}