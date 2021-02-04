<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
// var_dump($editAdminСategoryTitle); die();
 
?>

<?php include('includes/admin-users-nav.php'); ?>

<h2><?= $editAdminСategoryTitle ?>
    <span>
        <?= $User->returnIfAllowed("admin/admincategories/delete", 
            "<a href=" . $Url::link("admin/admincategories/delete&id=" . $_GET['id']) 
            . ">[Удалить]</a>");?>
    </span>
</h2>

<form id="editUser" method="post" action="<?= $Url::link("admin/admincategories/edit&id=" . $_GET['id'])?>">
    <h5>Name of category</h5>
    <input type="text" name="name" placeholder="Имя категории" value="<?= $viewAdmincategory->name ?>"><br>
    <h5>Category summary</h5>
    <input type="text" name="description" placeholder="Описание категории" value="<?= $viewAdmincategory->description?>"><br>
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
    <input type="submit" name="saveChanges" value="Сохранить">
    <input type="submit" name="cancel" value="Назад">
</form>
