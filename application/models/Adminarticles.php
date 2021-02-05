<?php

namespace application\models;

/**
 * Description of AuthUsers
 *
 * @author qwe
 */
class Adminarticles extends BaseExampleModel
{
    /**
     * Имя таблицы пользователей
     */
    public $tableName = 'articles';
    
    /**
     * @var string Критерий сортировки строк таблицы
     */
     
    
    /**
     * Логин пользователя
     * @var type 
     */
    public $publicationDate = null;
    
    /**
     * Логин пользователя
     * @var type 
     */
    public $categoryId = null;
    /**
     * @var type 
     */
    public $title = null;
    
    /**
     * @var type 
     */
    public $summary = null;
    
    /**
     * @var type 
     */
    public $content = null;
    
    /**
     * @var type 
     */
    public $Active = null;
    
    /**
     * @var type 
     */
    public $SubcategoryId = null;
   
    /**
     * Добавляем нового пользователя
     */
    public function insert()
    {
        $sql = "INSERT INTO $this->tableName (publicationDate, categoryId, title, summary, content, Active, SubcategoryId) VALUES (:publicationDate, :categoryId, :title, :summary, :content, :Active,:SubcategoryId)"; 
        $st = $this->pdo->prepare ( $sql );
        $st->bindValue( ":publicationDate", $this->publicationDate, \PDO::PARAM_STMT);
        $st->bindValue( ":categoryId", $this->categoryId, \PDO::PARAM_STR );
        $st->bindValue( ":title", $this->title, \PDO::PARAM_STR );
        $st->bindValue( ":summary", $this->summary, \PDO::PARAM_STR );
        
        $st->bindValue( ":content", $this->content, \PDO::PARAM_STR );
        $st->bindValue( ":Active", $this->Active, \PDO::PARAM_STR );
        $st->bindValue( ":SubcategoryId", $this->SubcategoryId, \PDO::PARAM_STR );
        $st->execute();
        $this->id = $this->pdo->lastInsertId();
    }

    /**
    * Обновляем текущий объект статьи в базе данных
    */
    public function update()
    {       
        $sql = "UPDATE $this->tableName SET publicationDate=:publicationDate, categoryId=:categoryId, title=:title, summary=:summary, content=:content, Active=:Active,SubcategoryId=:SubcategoryId,  WHERE id = :id";  
        $st = $this->pdo->prepare ( $sql );
        $st->bindValue( ":publicationDate", $this->publicationDate, \PDO::PARAM_STMT);
        $st->bindValue( ":categoryId", $this->categoryId, \PDO::PARAM_STR );
        $st->bindValue( ":title", $this->title, \PDO::PARAM_STR );
        $st->bindValue( ":summary", $this->summary, \PDO::PARAM_STR );      
        $st->bindValue( ":content", $this->content, \PDO::PARAM_STR );
        $st->bindValue( ":Active", $this->Active, \PDO::PARAM_STR );
        $st->bindValue( ":SubcategoryId", $this->SubcategoryId, \PDO::PARAM_STR ); 
        $st->bindValue( ":id", $this->id, \PDO::PARAM_INT );
        $st->execute();
    }
    
        public  function getlist_author_articles() {  
           $array =null;     
           $sql = "SELECT * FROM `users_articles` ";
           $st = $this->pdo->prepare ( $sql );
           $st->execute();
           $array = $st->fetchAll(\PDO::FETCH_ASSOC);
           $conn = null; 
            // var_dump($array); die();
            foreach ( $array as $category ) {
               return  $array;  
            }
           }
    
}
