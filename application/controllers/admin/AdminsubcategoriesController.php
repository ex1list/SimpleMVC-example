<?php
namespace application\controllers\admin;
use \application\models\Adminsubcategories as Adminsubcategories;
use \application\models\Admincategories as Admincategories;
use ItForFree\SimpleMVC\Config;

/**
 *
 */
class AdminsubcategoriesController extends \ItForFree\SimpleMVC\mvc\Controller
{
    
    public $layoutPath = 'admin-main.php';
   
    
    
    public function indexAction()
    {
        $Adminsubcategories = new Adminsubcategories();
        // var_dump($Adminarticles); die();
        $subcategories = $Adminsubcategories->getList()['results'];
         //var_dump( $subcategories); die();
        $this->view->addVar('subcategories', $subcategories);
        $this->view->render('subcategories/index.php');
    }

    /**
     * Выводит на экран форму для создания новой статьи (только для Администратора)
     */
    public function addAction()
    {
        $Url = Config::get('core.url.class');
        if (!empty($_POST)) {
            if (!empty($_POST['saveNewUser'])) {
                $Adminsubcategories = new Adminsubcategories();
                $newAdminsubcategories = $Adminsubcategories->loadFromArray($_POST);
                $newAdminsubcategories->insert(); 
                $this->redirect($Url::link("admin/adminsubcategories/index"));
            } 
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/adminsubcategories/index"));
            }
        }
        else {
            $addAdminsubcategoriesTitle = "Добавить субкатегорию";
            $this->view->addVar('addAdminsubcategoriesTitle', $addAdminsubcategoriesTitle);
            
            $this->view->render('subcategories/add.php');
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
                $Adminsubcategories = new Adminsubcategories();
                $newAdminsubcategories = $Adminsubcategories->loadFromArray($_POST);
                $newAdminsubcategories->update();
                $this->redirect($Url::link("admin/adminsubcategories/index&id=$id"));
            } 
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/adminsubcategories/index&id=$id"));
            }
        }
        else {
            $Adminsubcategories = new Adminsubcategories();
            $viewAdminsubcategories = $Adminsubcategories->getById($id);
            //var_dump($viewAdminarticles); die();
             
            $editAdminSubcategoryTitle = "Редактирование данных субкатегории";
             $Admincategories = new Admincategories();
             $categories= $Admincategories->getList()['results'];
           
            $this->view->addVar('viewAdminsubcategories', $viewAdminsubcategories);
            $this->view->addVar('editAdminSubcategoryTitle', $editAdminSubcategoryTitle);
            $this->view->addVar('categories', $categories);
            $this->view->render('subcategories/edit.php');   
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
                $Adminsubcategories = new Adminsubcategories();
                $newAdminsubcategories = $Adminsubcategories->loadFromArray($_POST);
                $newAdminsubcategories->delete();
                $this->redirect($Url::link("admin/adminsubcategories/index"));
              
            }
            elseif (!empty($_POST['cancel'])) {
                $this->redirect($Url::link("admin/adminsubcategories/edit&id=$id"));
            }
        }
        else {
            
            $Adminsubcategories = new Adminsubcategories();
            $deletedAdminsubcategories = $Adminsubcategories->getById($id);
            $deleteAdminsubcategoriesTitle = "Удаление cубкатегории";       
            $this->view->addVar('deleteAdminsubcategoriesTitle', $deleteAdminsubcategoriesTitle);
            $this->view->addVar('deletedAdminsubcategories', $deletedAdminsubcategories);  
            $this->view->render('subcategories/delete.php');
        }
    }
}
