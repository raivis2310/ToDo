<?php

namespace App\Command;

use App\TodoManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CompleteTodoCommand extends Command
{
    protected static $defaultName = 'app:complete-todo';

    protected function configure(): void
    {
        $this
            ->setDescription('Task completed')
            ->addArgument('id', InputArgument::REQUIRED, 'The ID of the task to mark complete');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $id = $input->getArgument('id');
        $todoManager = new TodoManager();
        $todoManager->markAsComplete($id);

        $output->writeln('Task marked complete.');
        return Command::SUCCESS;
    }
}
