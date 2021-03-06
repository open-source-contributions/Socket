<?php
declare(strict_types = 1);

namespace Tests\Innmind\Socket\Address;

use Innmind\Socket\{
    Address\Unix,
    Exception\DirectoryNotFound,
};
use Innmind\Url\Path;
use PHPUnit\Framework\TestCase;

class UnixTest extends TestCase
{
    public function testInterface()
    {
        $this->assertSame('/tmp/foo.sock', Unix::of('/tmp/foo')->toString());
        $this->assertSame('/tmp/foo.sock', Unix::of('/tmp/foo.so')->toString());
        $this->assertSame('/tmp/foo.sock', Unix::of('/tmp/foo.sock')->toString());
    }

    public function testThrowWhenDirectoryNotFound()
    {
        $this->expectException(DirectoryNotFound::class);

        new Unix(Path::of('/whatever/file'));
    }
}
