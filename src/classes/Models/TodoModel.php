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
        $this->db->setAttribute(
            \PDO::ATTR_DEFAULT_FETCH_MODE,
            \PDO::FETCH_ASSOC
        );
        $sql = $this->db->prepare('SELECT `id`, `item` FROM `todo-item` WHERE done = 1;');
        $sql->execute();
        return $sql->fetchAll();
    }

    public function sendTodoItems($post)
    {
        $newItem = $post['addTodo'];
        $sql = $this->db->prepare('INSERT INTO `todo-item` (`item`, `done`) VALUES (:item, 1);');

        $sql->bindParam('item', $newItem, \PDO::PARAM_STR);
        $sql->execute();

    }

    public function moveTodoItems($postMove)
    {
        $doneItemId = $postMove['taskId'];
        $sql = $this->db->prepare('UPDATE `todo-item` SET `done` = 0 WHERE id=:id;');
        $sql->bindParam('id', $doneItemId, \PDO::PARAM_INT);
        $sql->execute();
    }

    public function getDoneItems()
    {
        $this->db->setAttribute(
            \PDO::ATTR_DEFAULT_FETCH_MODE,
            \PDO::FETCH_ASSOC
        );
        $sql = $this->db->prepare('SELECT `id`, `item` FROM `todo-item` WHERE done = 0;');
        $sql->execute();
        return $sql->fetchAll();
    }

}