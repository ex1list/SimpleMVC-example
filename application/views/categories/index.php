<?php 
use ItForFree\SimpleMVC\Config;

$Articles_get = Config::getObject('core.articles.class');
//var_dump($categories);die();
?>

<?php include('includes/admin-users-nav.php'); ?>

<h2>Список категорий</h2> 
    
<?php    if (!empty($categories)): ?>
<table class="table">
    <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">description</th>
      <th scope="col"></th>
    </tr>
     </thead>
    <tbody>
    <?php foreach($categories as $category): ?>
    <tr>
        <td> <?=  $category->id ?> </td>
        <td> <?=  $category->name?> </td>
        <td> <?=  $category->description ?> </td>   
        
        <td>  <?= $User->returnIfAllowed("admin/admincategories/edit", 
                    "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/admincategories/edit&id=". $category->id) 
                    . ">[Редактировать]</a>");?></td>
       </tr>
    <?php endforeach; ?>
    
    </tbody>
</table>

<?php else:?>
    <p> Список категорий пуст. </p>
<?php endif; ?>