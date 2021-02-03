<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
  //var_dump($subcategories); die();
 
?>

<?php include('includes/admin-users-nav.php'); ?>

<h2><?= $editAdminSubcategoryTitle ?>
    <span>
        <?= $User->returnIfAllowed("admin/adminusers/delete", 
            "<a href=" . $Url::link("admin/adminusers/delete&id=" . $_GET['id']) 
            . ">[Удалить]</a>");?>
    </span>
</h2>

<form id="editUser" method="post" action="<?= $Url::link("admin/adminusers/edit&id=" . $_GET['id'])?>">
    <h5>Subname</h5>
    <input type="text" name="login" placeholder="логин пользователя" value="<?= $viewAdminsubcategories->Subname ?>"><br>
    <h5>Subdescription</h5>
    <input type="text" name="pass" placeholder="новый пароль" value="<?= $viewAdminsubcategories->Subdescription?>"><br>
    
     
    
    
    
    
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
    <input type="submit" name="saveChanges" value="Сохранить">
    <input type="submit" name="cancel" value="Назад">
</form>
