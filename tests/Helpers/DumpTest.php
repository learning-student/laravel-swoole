<?php

namespace SwooleTW\Http\Tests\Helpers;

use PHPUnit\Framework\TestCase;
use SwooleTW\Http\Helpers\Dump;

class DumpTest extends TestCase
{

    public function testDumpSuccess(): void
    {
        $response = Dump::dd('aa', 'bb');

        $this->assertTrue($response);
    }
}
