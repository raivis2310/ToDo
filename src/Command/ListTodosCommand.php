<?php

namespace App\Command;

use App\TodoManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;

class ListTodosCommand extends Command
{
    protected static $defaultName = 'app:list-todos';

    protected function configure(): void
    {
        $this->setDescription('List of tasks');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $todoManager = new TodoManager();
        $todos = $todoManager->getTodos();

        $table = new Table($output);
        $table
            ->setHeaders(['ID', 'Description', 'Status'])
            ->setRows(array_map(function ($todo, $index) {
                return [$index, $todo['description'], $todo['status']];
            }, $todos, array_keys($todos)));
        $table->render();

        return Command::SUCCESS;
    }
}
