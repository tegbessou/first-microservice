<?php

declare(strict_types=1);

namespace App\MessageHandler;

use App\Message\TestMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class TestMessageHandler
{
    public function __invoke(TestMessage $message)
    {

    }
}