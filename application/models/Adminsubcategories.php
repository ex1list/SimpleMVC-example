<?php

namespace application\models;

/**
 * Description of AuthUsers
 *
 * @author qwe
 */
class Adminsubcategories extends BaseExampleModel
{
    /**
     * Имя таблицы пользователей
     */
    public $tableName = 'Subcategories';
    
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
    public $category_id = null;
    /**
     * @var type 
     */
    public $Subname = null;
    
    /**
     * @var type 
     */
    public $Subdescription = null;
 

    /**
     * Добавляем нового пользователя
     */
    public function insert()
    {
        $sql = "INSERT INTO $this->tableName (category_id, Subname, Subdescription) VALUES (:category_id, :Subname, :Subdescription)"; 
        $st = $this->pdo->prepare ( $sql );
        $st->bindValue( ":category_id", $this->category_id, \PDO::PARAM_STMT);
        $st->bindValue( ":Subname", $this->Subname, \PDO::PARAM_STR );
        $st->bindValue( ":Subdescription", $this->Subdescription, \PDO::PARAM_STR );
        $st->execute();
        $this->id = $this->pdo->lastInsertId();
    }

    /**
    * Обновляем текущий объект статьи в базе данных
    */
    public function update()
    {       
        $sql = "UPDATE $this->tableName SET category_id=:category_id, Subname=:Subname, Subdescription=:Subdescription,  WHERE id = :id";  
        $st = $this->pdo->prepare ( $sql );
        $st->bindValue( ":category_id", $this->category_id, \PDO::PARAM_STMT);
        $st->bindValue( ":Subname", $this->Subname, \PDO::PARAM_STR );
        $st->bindValue( ":Subdescription", $this->Subdescription, \PDO::PARAM_STR );
        $st->bindValue( ":id", $this->id, \PDO::PARAM_INT );
        $st->execute();
    }
    
}
