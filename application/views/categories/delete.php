<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
?>

<?php include('includes/admin-users-nav.php'); ?>

<h2><?= $deleteAdmincategoriesTitle ?></h2>

<form method="post" action="<?= $Url::link("admin/adminсategories/delete&id=". $_GET['id'])?>" >
    Вы уверены, что хотите удалить данную категорию?
    
    <input type="hidden" name="id" value="<?= $deletedAdmincategories->id ?>">
    <input type="submit" name="deleteUser" value="Удалить">
    <input type="submit" name="cancel" value="Вернуться"><br>
</form>
