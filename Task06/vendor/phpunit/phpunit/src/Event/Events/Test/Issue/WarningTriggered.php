<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Event\Test;

use const PHP_EOL;
use function implode;
use function sprintf;
use PHPUnit\Event\Code\Test;
use PHPUnit\Event\Event;
use PHPUnit\Event\Telemetry;

/**
 * @psalm-immutable
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final readonly class WarningTriggered implements Event
{
    private Telemetry\Info $telemetryInfo;
    private Test $test;

    /**
     * @psalm-var non-empty-string
     */
    private string $message;

    /**
     * @psalm-var non-empty-string
     */
    private string $file;

    /**
     * @psalm-var positive-int
     */
    private int $line;
    private bool $suppressed;
    private bool $ignoredByBaseline;

    /**
     * @psalm-param non-empty-string $message
     * @psalm-param non-empty-string $file
     * @psalm-param positive-int $line
     */
    public function __construct(Telemetry\Info $telemetryInfo, Test $test, string $message, string $file, int $line, bool $suppressed, bool $ignoredByBaseline)
    {
        $this->telemetryInfo     = $telemetryInfo;
        $this->test              = $test;
        $this->message           = $message;
        $this->file              = $file;
        $this->line              = $line;
        $this->suppressed        = $suppressed;
        $this->ignoredByBaseline = $ignoredByBaseline;
    }

    public function telemetryInfo(): Telemetry\Info
    {
        return $this->telemetryInfo;
    }

    public function test(): Test
    {
        return $this->test;
    }

    /**
     * @psalm-return non-empty-string
     */
    public function message(): string
    {
        return $this->message;
    }

    /**
     * @psalm-return non-empty-string
     */
    public function file(): string
    {
        return $this->file;
    }

    /**
     * @psalm-return positive-int
     */
    public function line(): int
    {
        return $this->line;
    }

    public function wasSuppressed(): bool
    {
        return $this->suppressed;
    }

    public function ignoredByBaseline(): bool
    {
        return $this->ignoredByBaseline;
    }

    public function asString(): string
    {
        $message = $this->message;

        if (!empty($message)) {
            $message = PHP_EOL . $message;
        }

        $details = [$this->test->id()];

        if ($this->suppressed) {
            $details[] = 'suppressed using operator';
        }

        if ($this->ignoredByBaseline) {
            $details[] = 'ignored by baseline';
        }

        return sprintf(
            'Test Triggered Warning (%s)%s',
            implode(', ', $details),
            $message,
        );
    }
}