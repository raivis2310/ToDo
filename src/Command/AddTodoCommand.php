<?php

namespace App\Command;

use App\TodoManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddTodoCommand extends Command
{
    protected static $defaultName = 'app:add-todo';

    protected function configure(): void
    {
        $this
            ->setDescription('Adds task')
            ->addArgument('description', InputArgument::REQUIRED, 'The description of the TODO');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $description = $input->getArgument('description');
        $todoManager = new TodoManager();
        $todoManager->addTodo($description);

        $output->writeln('Task added.');
        return Command::SUCCESS;
    }
}
