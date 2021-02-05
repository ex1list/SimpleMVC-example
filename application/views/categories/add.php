<?php include('includes/admin-users-nav.php'); ?>
<h2><?= $addnewAdmincategoriesTitle ?></h2>

<form id="addUser" method="post" action="<?= \ItForFree\SimpleMVC\Url::link("admin/admincategories/add")?>"> 

    <div class="form-group">
        <label for="name">Введите название категории</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="название категории">
    </div>
    <div class="form-group">
        <label for="pass">Введите описание категории</label>
        <input type="text" class="form-control"  name="description" id="description" placeholder="описание категории">
    </div>
   
    <input type="submit" class="btn btn-primary" name="saveNewUser" value="Сохранить">
    <input type="submit" class="btn" name="cancel" value="Назад">
</form>


