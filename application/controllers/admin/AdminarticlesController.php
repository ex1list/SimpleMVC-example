<?php
namespace application\controllers\admin;
use \application\models\Adminarticles as Adminarticles;
use \application\models\Admincategories as Admincategories;
use \application\models\Adminsubcategories as Adminsubcategories;
use \application\models\Adminusers as Adminusers;
use ItForFree\SimpleMVC\Config;

/**
 *
 */
class AdminarticlesController extends \ItForFree\SimpleMVC\mvc\Controller
{
    
    public $layoutPath = 'admin-main.php';
   
    
    
    public function indexAction()
    {
         $Adminarticles = new Adminarticles();
         // var_dump($Adminarticles); die();
         $articles= $Adminarticles->getList()['results'];
         
         $Adminsubcategories = new Adminsubcategories();
         
         $subcategories = $Adminsubcategories->getList()['results'];
         
         $Admincategories = new Admincategories();
         
         $categories= $Admincategories->getList()['results']; 
         
       
         $Adminusers = new Adminusers();
         
         
         $users= $Adminusers->getList()['results']; 
         
         $Author_articles = new Adminarticles();
         $author_articles = $Author_articles->getlist_author_articles();
         //var_dump($author_articles); die();
          
            $this->view->addVar('author_articles', $author_articles);
            $this->view->addVar('articles', $articles);
            $this->view->addVar('subcategories', $subcategories);
            $this->view->addVar('categories', $categories);
            $this->view->addVar('users', $users);
            $this->view->render('articles/index.php');
   
    }

    /**
     * Выводит на экран форму для создания новой статьи (только для Администратора)
     */
    public function addAction()
    {
        $Url = Config::get('core.url.class');
        if (!empty($_POST)) {
            if (!empty($_POST['saveNewUser'])) {
                $Adminusers = new Adminusers();
                $newAdminusers = $Adminusers->loadFromArray($_POST);
                $newAdminusers->insert(); 
                $this->redirect($Url::link("admin/adminusers/index"));
            } 
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/adminusers/index"));
            }
        }
        else {
            $addAdminusersTitle = "Регистрация пользователя";
            $this->view->addVar('addAdminusersTitle', $addAdminusersTitle);
            
            $this->view->render('user/add.php');
        }
    }
    
    /**
     * Выводит на экран форму для редактирования статьи (только для Администратора)
     */
    public function editAction()
    {
        //var_dump( $_GET['id']);die();
        $id = $_GET['id'];
    
        $Url = Config::get('core.url.class');
         // echo "<pre>"; var_dump($_POST); echo "</pre>"; die();
        if (!empty($_POST)) { // это выполняется нормально.
            if (!empty($_POST['saveChanges'] )) { 
                //echo "<pre>"; var_dump($_POST); echo "</pre>";    
                $Adminarticles = new Adminarticles();
                //echo "<pre>"; var_dump($Adminarticles); echo "</pre>";  
                $newAdminarticles = $Adminarticles->loadFromArray($_POST);
                //echo "<pre>"; var_dump($newAdminarticles); echo "</pre>";  die();
                $newAdminarticles->update();
                $newAdminarticles->insert_author_articles();
                //$newAdminarticles = $newAdminarticles->getById($_POST);
                //$newAdminarticles = $Adminarticles->insert_author_articles(); 
                //echo "<pre>"; var_dump($newAdminarticles); echo "</pre>"; die();
                //$newAdminarticles->update();  
                //echo "rthth";  die();
                $this->redirect($Url::link("admin/adminarticles/index")); 
            } 
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/adminadminarticles/index&id=$id"));
            }        
        }
        else {
            $Adminarticles = new Adminarticles();
            $viewAdminarticles = $Adminarticles->getById($id);
            //var_dump($viewAdminarticles); die();
            $Adminsubcategories = new Adminsubcategories();  
            $subcategories = $Adminsubcategories->getList()['results'];
            //var_dump($subcategories); die();
            $Admincategories = new Admincategories();
            $categories= $Admincategories->getList()['results'];
            //var_dump($categories); die(); 
            $Adminusers = new Adminusers(); 
            $users= $Adminusers->getList()['results']; 
            //var_dump($users); die(); 
            $Author_articles = new Adminarticles();   
            $author_articles = $Author_articles->getlist_author_articles();
            //var_dump($author_articles); die();               
            $this->view->render('articles/index.php');   
            $editAdminArticleTitle = "Редактирование данных cтатьи";      
            $this->view->addVar('viewAdminarticles', $viewAdminarticles);
            $this->view->addVar('subcategories', $subcategories);
            $this->view->addVar('categories', $categories);
            $this->view->addVar('users', $users);
            $this->view->addVar('author_articles', $author_articles);
            
            $this->view->addVar('editAdminArticleTitle', $editAdminArticleTitle);
            $this->view->render('articles/edit.php');   
        }
        
    }
    
    /**
     * Выводит на экран предупреждение об удалении данных (только для Администратора)
     */
    public function deleteAction()
    {
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        if (!empty($_POST)) {
            if (!empty($_POST['deleteUser'])) {
                $Adminusers = new Adminusers();
                $newAdminusers = $Adminusers->loadFromArray($_POST);
                $newAdminusers->delete();
                
                $this->redirect($Url::link("archive/allUsers"));
              
            }
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/adminusers/edit&id=$id"));
            }
        }
        else {
            
            $Adminusers = new Adminusers();
            $deletedAdminusers = $Adminusers->getById($id);
            $deleteAdminusersTitle = "Удаление статьи";
            
            $this->view->addVar('deleteAdminusersTitle', $deleteAdminusersTitle);
            $this->view->addVar('deletedAdminusers', $deletedAdminusers);
            
            $this->view->render('user/delete.php');
        }
    }
}
