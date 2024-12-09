<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\User;
use App\Message\TestMessage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(name: 'app:test')]
final class TestCommand extends Command
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly MessageBusInterface $bus,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $user = new User();

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $this->bus->dispatch(new TestMessage('Hello, world!'));

        return Command::SUCCESS;
    }
}
