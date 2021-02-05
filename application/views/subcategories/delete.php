<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
?>

<?php include('includes/admin-users-nav.php'); ?>

<h2><?= $deleteAdminsubcategoriesTitle ?></h2>

<form method="post" action="<?= $Url::link("admin/adminsubcategories/delete&id=". $_GET['id'])?>" >
    Вы уверены, что хотите удалить данную субкатегорию?
    
    <input type="hidden" name="id" value="<?= $deletedAdminsubcategories->id ?>">
    <input type="submit" name="deleteUser" value="Удалить">
    <input type="submit" name="cancel" value="Вернуться"><br>
</form>
