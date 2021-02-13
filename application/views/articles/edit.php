<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
 // var_dump($subcategories); die();
 
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
 <h5>Article summary</h5>
    <input type="text" name="pass" placeholder="новый пароль" value="<?= $viewAdminarticles->summary?>"><br>
    <h5>Article content</h5>
    <input type="textarea" name="pass" placeholder="новый пароль" value="<?= $viewAdminarticles->content ?>"><br>
    
                    <label for="categoryId">Article Category</label>
        <!--  ["categoryId"]=> string(1) "1" -->
                <select name="categoryId">
                  <option value="0"<?php echo !$viewAdminarticles->categoryId ? " selected" : ""?>>(none)</option>
                <?php foreach ( $categories as $category ) { ?>
                  <option value="<?php echo $category->id?>"<?php echo ( $category->id == $viewAdminarticles->categoryId ) ? " selected" : ""?>><?php echo htmlspecialchars( $category->name )?></option>
                <?php } ?>
                </select>
    
    
    <div class="form-group">   

        <!-- ["SubcategoryId"]=> string(1) "1" -->
       
                       <li>
                <label for="SubcategoryId">Article SubCategory</label>
                <select name="SubcategoryId"> 

                <?php foreach ($categories as $category ) {  ?>
                  <optgroup label="<?php echo htmlspecialchars($category->name) ?>">
                    <?php foreach ($subcategories as $subcategory ) {  
                      if ($category->id == $subcategory->category_id) {
                    ?>
                      <option value="<?php echo $subcategory->id?>"
                        <?php echo ( $subcategory->id == $viewAdminarticles->SubcategoryId ) 
                        ? " selected" : ""?>>
                        <?php echo htmlspecialchars( $subcategory->Subname )?> 
                      </option>
                      <?php }
                    }   ?>   
                  </optgroup> 
               <?php }     ?>  

            

                </select>
            
               </li>
        
        
        
        
      
    </div>
    <div class="form-group">   
        <label for="Author">Author</label>
            <select name="groups[]" multiple="" size="10" >
                <?php  foreach ($users as $user)  { ?>
                <option value="<?php echo $user->id?>"><?php echo htmlspecialchars( $user->login)?></option>

        <?php } ?>
          </select>
 
    </div>
        <h5>Publication date</h5>
    <input  type="date" name="publicationDate" id="publicationDate" placeholder="YYYY-MM-DD" required maxlength="10" value="<?php echo $viewAdminarticles->publicationDate ?  $viewAdminarticles->publicationDate : "" ?>"><br>
     <h5>Article active</h5>
    <input type="checkbox" name="pass" placeholder="новый пароль" value="1"><br>
    
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
    <input type="submit" name="saveChanges" value="Сохранить">
    <input type="submit" name="cancel" value="Назад">
</form>
