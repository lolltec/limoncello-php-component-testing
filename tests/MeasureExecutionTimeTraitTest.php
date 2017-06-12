<?php namespace Limoncello\Tests\Testing;

/**
 * Copyright 2015-2017 info@neomerx.com
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

use Limoncello\Testing\MeasureExecutionTimeTrait;

/**
 * @package Limoncello\Tests\Testing
 */
class MeasureExecutionTimeTraitTest extends TestCase
{
    use MeasureExecutionTimeTrait;

    /**
     * Test measure time.
     */
    public function testMeasureTime()
    {
        $retVal = $this->measureTime(function () {
            $value = 'some value';
            for ($i = 0; $i < 1000; ++$i) {
                $value ?: null;
            }
            return $value;
        }, $time);

        $this->assertTrue(is_float($time));
        $this->assertGreaterThan(0, $time);
        $this->assertEquals('some value', $retVal);
    }
}
