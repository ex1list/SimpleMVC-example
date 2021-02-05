<?php
namespace application\controllers\admin;
use \application\models\Admincategories as Admincategories;
use ItForFree\SimpleMVC\Config;

/**
 *
 */
class AdmincategoriesController extends \ItForFree\SimpleMVC\mvc\Controller
{
    
    public $layoutPath = 'admin-main.php';
   
    
    
    public function indexAction()
    {
        $Admincategories = new Admincategories();
      // var_dump($Adminarticles); die();
         $categories= $Admincategories->getList()['results'];
         
        //var_dump( $articles); die();
            
           
            $this->view->addVar('categories', $categories);
            $this->view->render('categories/index.php');
   
    }

    /**
     * Выводит на экран форму для создания новой статьи (только для Администратора)
     */
    public function addAction()
    {
        $Url = Config::get('core.url.class');
        if (!empty($_POST)) {
            if (!empty($_POST['saveNewUser'])) {
                $Admincategories = new Admincategories();
                $newAdmincategories = $Admincategories->loadFromArray($_POST);
                $newAdmincategories->insert(); 
                $this->redirect($Url::link("admin/admincategories/index"));
            } 
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/admincategories/index"));
            }
        }
        else {
            $addnewAdmincategoriesTitle = "Добавление новой категории";
            $this->view->addVar('addnewAdmincategoriesTitle', $addnewAdmincategoriesTitle);
            
            $this->view->render('categories/add.php');
        }
    }
    
    /**
     * Выводит на экран форму для редактирования статьи (только для Администратора)
     */
    public function editAction()
    {
        // var_dump( $_GET['id']);die();
        $id = $_GET['id'];
    
         $Url = Config::get('core.url.class');
        //var_dump($_POST); die();
        if (!empty($_POST)) { // это выполняется нормально.
            
            if (!empty($_POST['saveChanges'] )) {
                $Admincategories = new Admincategories();
                $newAdmincategories = $Admincategories->loadFromArray($_POST);
                //var_dump($newAdmincategories); die();
                $newAdmincategories->update();
                $this->redirect($Url::link("admin/admincategories/index&id=$id"));
            } 
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/admincategories/index&id=$id"));
            }
        }
        else {
            $Admincategories = new Admincategories();
            $viewAdmincategory = $Admincategories->getById($id);
            //var_dump($viewAdminarticles); die();
             
            $editAdminСategoryTitle = "Редактирование данных категории";
            
             
           
            $this->view->addVar('viewAdmincategory', $viewAdmincategory);
            $this->view->addVar('editAdminСategoryTitle', $editAdminСategoryTitle);
      
            $this->view->render('categories/edit.php');   
        }
        
    }
    
    /**
     * Выводит на экран предупреждение об удалении данных (только для Администратора)
     */
    public function deleteAction()
    {
        //var_dump($_GET); die();
        $id = $_GET['id'];
        $Url = Config::get('core.url.class');
        
        if (!empty($_POST)) {
            if (!empty($_POST['deleteUser'])) {
                //var_dump($_POST);die();
                $Admincategories = new Admincategories();
                $newAdmincategories = $Admincategories->loadFromArray($_POST);
                $newAdmincategories->delete();
                
                $this->redirect($Url::link("admin/admincategories/index"));
              
            }
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/adminusers/edit&id=$id"));
            }
        }
        else {
            
            $Admincategories = new Admincategories();
            $deletedAdmincategories = $Admincategories->getById($id);
            $deleteAdmincategoriesTitle = "Удаление категории";
            
            $this->view->addVar('deleteAdmincategoriesTitle', $deleteAdmincategoriesTitle);
            $this->view->addVar('deletedAdmincategories', $deletedAdmincategories);
            
            $this->view->render('categories/delete.php');
        }
    }
}
