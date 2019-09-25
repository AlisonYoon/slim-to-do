<?php


namespace Example\Models;


class TodoModel
{
    private $db;

    /**
     * TodoModel constructor.
     * @param $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getTodoItems()
    {
        $sql = 'SELECT `item` FROM todo-item WHERE done = 1;';
        $query = $this->db->query($sql);
        return $query->fetchAll();
    }

    public function sendTodoItems()
    {
        $sql = 'INSERT INTO todo-item VALUES ();';

    }

}