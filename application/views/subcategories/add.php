<?php include('includes/admin-users-nav.php'); ?>
<h2><?= $addAdminsubcategoriesTitle ?></h2>

<form id="addUser" method="post" action="<?= \ItForFree\SimpleMVC\Url::link("admin/adminsubcategories/add")?>"> 

    <div class="form-group">
        <label for="login">Введите название субкатегории</label>
        <input type="text" class="form-control" name="Subname" id="login" placeholder="название субкатегории">
    </div>
   <div class="form-group">
        <label for="pass">Выберите категорию</label>
        <input type="text" class="form-control"  name="category_id" id="pass" placeholder="категория">
            <select name="role" id="role" class="form-control" value="<?= $viewAdminusers->role ?>"> 
                <option value="admin">Администратор</option>
                <option value="auth_user">Зарегистрированный пользователь</option>
            </select>    
    </div>
    <div class="form-group">
        <label for="pass">Введите описание субкатегории</label>
        <input type="text" class="form-control"  name="Subdescription" id="pass" placeholder="описание субкатегории">
    </div>
  
    <input type="submit" class="btn btn-primary" name="saveNewUser" value="Сохранить">
    <input type="submit" class="btn" name="cancel" value="Назад">
</form>


