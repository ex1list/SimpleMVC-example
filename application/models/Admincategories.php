<?php

namespace application\models;

/**
 * Description of AuthUsers
 *
 * @author qwe
 */
class Admincategories extends BaseExampleModel
{
    /**
     * Имя таблицы пользователей
     */
    public $tableName = 'categories';
    
    /**
     * @var string Критерий сортировки строк таблицы
     */
     
    
    /**
     * Логин пользователя
     * @var type 
     */
    public $id = null;
    
    /**
     * Логин пользователя
     * @var type 
     */
    public $name= null;
    /**
     * @var type 
     */
    public $description = null;
    
    
   
    /**
     * Добавляем нового пользователя
     */
    public function insert()
    {
        $sql = "INSERT INTO $this->tableName (name, description) VALUES (:name, :description)"; 
        $st = $this->pdo->prepare ( $sql );
        $st->bindValue( ":name", $this->name, \PDO::PARAM_STMT);
        $st->bindValue( ":description", $this->description, \PDO::PARAM_STR );
        $st->execute();
        $this->id = $this->pdo->lastInsertId();
    }

    /**
    * Обновляем текущий объект статьи в базе данных
    */
    public function update()
    {       
        $sql = "UPDATE $this->tableName SET name=:name, description=:description  WHERE id = :id";  
        $st = $this->pdo->prepare ( $sql );
        $st->bindValue( ":name", $this->name, \PDO::PARAM_STMT);
        $st->bindValue( ":description", $this->description, \PDO::PARAM_STR );
        $st->bindValue( ":id", $this->id, \PDO::PARAM_INT );
        $st->execute();
    }
    
}

 
