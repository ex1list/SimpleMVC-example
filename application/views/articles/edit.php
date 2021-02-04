<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
 // var_dump($editAdminСategoryTitle); die();
 
?>

<?php include('includes/admin-users-nav.php'); ?>

<h2><?= $editAdminArticleTitle ?>
    <span>
        <?= $User->returnIfAllowed("admin/admincategories/delete", 
            "<a href=" . $Url::link("admin/admincategories/delete&id=" . $_GET['id']) 
            . ">[Удалить]</a>");?>
    </span>
</h2>

<form id="editUser" method="post" action="<?= $Url::link("admin/adminusers/edit&id=" . $_GET['id'])?>">
    <h5>Введите название статьи</h5>
    <input type="text" name="login" placeholder="логин пользователя" value="<?= $viewAdminarticles->title ?>"><br>
    <h5>Publication date</h5>
    <input  type="date" name="publicationDate" id="publicationDate" placeholder="YYYY-MM-DD" required maxlength="10" value="<?php echo $viewAdminarticles->publicationDate ?  $viewAdminarticles->publicationDate : "" ?>"><br>
    <h5>Article summary</h5>
    <input type="text" name="pass" placeholder="новый пароль" value="<?= $viewAdminarticles->summary?>"><br>
    <h5>Article content</h5>
    <input type="textarea" name="pass" placeholder="новый пароль" value="<?= $viewAdminarticles->content ?>"><br>
    <h5>Article active</h5>
    <input type="checkbox" name="pass" placeholder="новый пароль" value="1"><br>
    <div class="form-group">   
        <label for="role">Article  category</label>
            <select name="role" id="role" class="form-control" value="<?= $viewAdminusers->role ?>"> 
                <option value="<?= $viewAdminarticles->title ?>">Администратор</option>
                <option value="<?= $viewAdminarticles->title ?>">Зарегистрированный пользователь</option>
            </select>
    </div>
    
    <div class="form-group">   
        <label for="role">Article subcategory</label>
            <select name="role" id="role" class="form-control" value="<?= $viewAdminarticles->title ?>"> 
                <option value="<?= $viewAdminarticles->title ?>">Администратор</option>
                <option value="<?= $viewAdminarticles->title ?>">Зарегистрированный пользователь</option>
            </select>
    </div>
    
    
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
    <input type="submit" name="saveChanges" value="Сохранить">
    <input type="submit" name="cancel" value="Назад">
</form>
