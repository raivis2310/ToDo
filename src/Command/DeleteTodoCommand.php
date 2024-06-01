<?php

namespace App\Command;

use App\TodoManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeleteTodoCommand extends Command
{
    protected static $defaultName = 'app:delete-todo';

    protected function configure(): void
    {
        $this
            ->setDescription('Deletes a TODO')
            ->addArgument('id', InputArgument::REQUIRED, 'The ID of the task to delete');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $id = $input->getArgument('id');
        $todoManager = new TodoManager();
        $todoManager->deleteTodo($id);

        $output->writeln('Task deleted.');
        return Command::SUCCESS;
    }
}
