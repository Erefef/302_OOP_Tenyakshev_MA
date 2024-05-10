<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Truncater;

class TruncaterTest extends TestCase
{
    public function testTruncate(): void
    {
        $title = 'Тенякшев Михаил Алексеевич';

        $truncater1 = new Truncater();

        $this->assertSame($title, $truncater1->truncate($title));

        $expected = "Тенякшев Михаил...";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => 16]));

        $this->assertSame($title, $truncater1->truncate($title));

        $expected = "Тенякшев Михаил***";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => 16, 'separator' => '***']));

        $expected = "Тенякшев Михаил...";
        $this->assertSame($expected, $truncater1->truncate($title, ['length' => -10]));

        $truncater2 = new Truncater(['length' => 16, 'separator' => '!!!']);

        $expected = "Тенякшев Михаил!!!";
        $this->assertSame($expected, $truncater2->truncate($title));
    }
}
