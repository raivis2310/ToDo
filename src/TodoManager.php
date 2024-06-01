<?php

namespace App;

class TodoManager
{
    private mixed $file;

    public function __construct($file = 'todos.json')
    {
        $this->file = $file;
        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([]));
        }
    }

    public function getTodos()
    {
        return json_decode(file_get_contents($this->file), true);
    }

    public function saveTodos($todos): void
    {
        file_put_contents($this->file, json_encode($todos));
    }

    public function addTodo($description): void
    {
        $todos = $this->getTodos();
        $todos[] = ['description' => $description, 'status' => 'incomplete'];
        $this->saveTodos($todos);
    }

    public function markAsComplete($index): void
    {
        $todos = $this->getTodos();
        if (isset($todos[$index])) {
            $todos[$index]['status'] = 'complete';
            $this->saveTodos($todos);
        }
    }

    public function deleteTodo($index): void
    {
        $todos = $this->getTodos();
        if (isset($todos[$index])) {
            array_splice($todos, $index, 1);
            $this->saveTodos($todos);
        }
    }
}
