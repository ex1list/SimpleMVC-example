<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
//  var_dump($categories); die();
 
?>

<?php include('includes/admin-users-nav.php'); ?>

<h2><?= $editAdminSubcategoryTitle ?>
    <span>
        <?= $User->returnIfAllowed("admin/adminsubcategories/delete", 
            "<a href=" . $Url::link("admin/adminsubcategories/delete&id=" . $_GET['id']) 
            . ">[Удалить]</a>");?>
    </span>
</h2>

<form id="editUser" method="post" action="<?= $Url::link("admin/adminsubcategories/edit&id=" . $_GET['id'])?>">
    <h5>Subname</h5>
    <input type="text" name="Subname" placeholder="имя субкатегории" value="<?= $viewAdminsubcategories->Subname ?>"><br>
    <h5>Subdescription</h5>
    <input type="text" name="Subdescription" placeholder="описание субкатегории" value="<?= $viewAdminsubcategories->Subdescription?>"><br>
     <h5>Сategory</h5>
 
    
    <select name="category_id">
        <?php   foreach ( $categories as $category ) { ?>
        <<option value="<?php echo $category->id?>"  ><?php echo htmlspecialchars($category->name)?></option>
        <?php } ?>
    </select>
    
     <br><br><br>
    
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
    <input type="submit" name="saveChanges" value="Сохранить">
    <input type="submit" name="cancel" value="Назад">
</form>
