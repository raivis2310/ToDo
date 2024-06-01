<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use App\Command\AddTodoCommand;
use App\Command\ListTodosCommand;
use App\Command\CompleteTodoCommand;
use App\Command\DeleteTodoCommand;

$app = new Application();
$app->add(new AddTodoCommand());
$app->add(new ListTodosCommand());
$app->add(new CompleteTodoCommand());
$app->add(new DeleteTodoCommand());
$app->run();
