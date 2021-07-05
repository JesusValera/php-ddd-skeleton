<?php

declare(strict_types=1);

namespace CodelyTv\Tests\Shared\Infrastructure\PhpUnit;

use CodelyTv\Shared\Domain\Bus\DomainEvent;
use CodelyTv\Shared\Domain\Bus\DomainEventPublisher;
use CodelyTv\Shared\Domain\UuidGenerator;
use PHPUnit\Framework\TestCase;

abstract class UnitTestCase extends TestCase
{
    private DomainEventPublisher $domainEventPublisher;
    private UuidGenerator $uuidGenerator;

    protected function shouldPublishDomainEvent(DomainEvent $domainEvent): void
    {
        $this->domainEventPublisher()->method('publish')->withAnyParameters();
    }

    protected function domainEventPublisher(): DomainEventPublisher
    {
        if (!isset($this->domainEventPublisher)) {
            $this->domainEventPublisher = $this->createMock(DomainEventPublisher::class);
        }

        return $this->domainEventPublisher;
    }

    protected function shouldGenerateUuid(string $uuid): void
    {
        $this->uuidGenerator()->method('generate')->willReturn($uuid);
    }

    protected function uuidGenerator(): UuidGenerator
    {
        if (!isset($this->uuidGenerator)) {
            $this->uuidGenerator = $this->createMock(UuidGenerator::class);
        }

        return $this->uuidGenerator;
    }

    protected function notify(DomainEvent $event, callable $subscriber): void
    {
        $subscriber($event);
    }
}
