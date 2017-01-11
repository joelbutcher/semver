<?php

/*
 * This file is part of composer/semver.
 *
 * (c) Composer <https://github.com/composer>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Composer\Semver\Constraint;

class AbstractConstraintTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException PHPUnit_Framework_Error_Deprecated
     */
    public function testAbstractConstraintWithDeprecated()
    {
        $expectedString = 'pretty string';
        $constraint = new \ReflectionClass('\Composer\Semver\Constraint\AbstractConstraint');
        $setPrettyString = $constraint->getMethod('setPrettyString');
        $setPrettyString->setAccessible(true);
        $setPrettyString->invoke($constraint, 'pretty string');
        
        $getPrettyString = $constraint->getMethod('getPrettyString');
        $getPrettyString->setAccessible(true);
        $result = $setPrettyString->invoke($constraint);
        
        $this->assertSame($expectedString, $result);
    }
}
