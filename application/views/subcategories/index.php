<?php 
use ItForFree\SimpleMVC\Config;

$Articles_get = Config::getObject('core.articles.class');

 //var_dump($subcategories);die();
?>

<?php include('includes/admin-users-nav.php'); ?>

<h2>Список субкатегорий</h2> 
    
<?php    if (!empty($subcategories)): ?>
<table class="table">
    <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Subname</th>
      <th scope="col">Subdescription</th>
      <th scope="col"></th>
    </tr>
     </thead>
    <tbody>
    <?php foreach($subcategories  as $subcategory): ?>
    <tr>
        <td> <?=  $subcategory->id ?> </td>
        <td> <?=  $subcategory->Subname ?> </td>
        <td> <?=  $subcategory->Subdescription ?> </td>
      
    
        
        
        <td>  <?= $User->returnIfAllowed("admin/adminsubcategories/edit", 
                    "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/adminsubcategories/edit&id=".$subcategory->id) 
                    . ">[Редактировать]</a>");?></td>
       </tr>
    <?php endforeach; ?>
    
    </tbody>
</table>

<?php else:?>
    <p> Список cтатей пуст. </p>
<?php endif; ?>