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

class EmptyConstraintTest extends \PHPUnit_Framework_TestCase
{
    protected $versionProvide;
    protected $emptyConstraint;

    protected function setUp()
    {
        $this->versionProvide = new Constraint('==', '1.1');
        $this->emptyConstraint = new EmptyConstraint();
    }

    protected function tearDown()
    {
        unset($this->versionProvide);
        unset($this->emptyConstraint);
    }

    public function testMatches()
    {
        $result = $this->emptyConstraint->matches($this->versionProvide);
        
        $this->assertTrue($result);
    }

    public function testGetPrettyString()
    {
        $expectedString = 'pretty-string';
        $this->emptyConstraint->setPrettyString($expectedString);
        $result = $this->emptyConstraint->getPrettyString();
        
        $this->assertSame($expectedString, $result);

        $expectedString = '[]';
        $this->emptyConstraint->setPrettyString(null);
        $result = $this->emptyConstraint->getPrettyString();
        
        $this->assertSame($expectedString, $result);
    }
}
