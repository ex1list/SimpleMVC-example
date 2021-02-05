<?php
namespace application\controllers\admin;
use \application\models\Adminarticles as Adminarticles;
use \application\models\Admincategories as Admincategories;
use \application\models\Adminsubcategories as Adminsubcategories;
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
         // var_dump($Adminarticles); die();
         $subcategories = $Adminsubcategories->getList()['results'];
         $Admincategories = new Admincategories();
         // var_dump($Adminarticles); die();
         $categories= $Admincategories->getList()['results']; 
        // var_dump( $subcategories); die();

           
            $this->view->addVar('articles', $articles);
            $this->view->addVar('subcategories', $subcategories);
            $this->view->addVar('categories', $categories);
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
        //var_dump($_POST); die();
        if (!empty($_POST)) { // это выполняется нормально.
            
            if (!empty($_POST['saveChanges'] )) {
                $Adminusers = new Adminusers();
                $newAdminusers = $Adminusers->loadFromArray($_POST);
                $newAdminusers->update();
                $this->redirect($Url::link("admin/adminusers/index&id=$id"));
            } 
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/adminusers/index&id=$id"));
            }
        }
        else {
            $Adminarticles = new Adminarticles();
            $viewAdminarticles = $Adminarticles->getById($id);
            //var_dump($viewAdminarticles); die();
            
            $editAdminArticleTitle = "Редактирование данных cтатьи";      
            $this->view->addVar('viewAdminarticles', $viewAdminarticles);
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
