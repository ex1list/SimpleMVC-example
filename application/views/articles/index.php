<?php 
use ItForFree\SimpleMVC\Config;

$Articles_get = Config::getObject('core.articles.class');
//var_dump($articles);die();
?>

<?php include('includes/admin-users-nav.php'); ?>

<h2>Список статей</h2> 
    
<?php    if (!empty($articles)): ?>
<table class="table">
    <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Дата публикации</th>
      <th scope="col">categoryId</th>
      <th scope="col">title</th>
      <th scope="col">summary</th>
      <th scope="col">content</th>
      <th scope="col">Active</th>
      <th scope="col">SubcategoryId</th>
      <th scope="col"></th>
    </tr>
     </thead>
    <tbody>
    <?php foreach($articles as $aricle): ?>
    <tr>
        <td> <?=  $aricle->id ?> </td>
        <td> <?=  $aricle->publicationDate ?> </td>
        <td> <?=  $aricle->categoryId ?> </td>
        <td> <?=  $aricle->title ?> </td>
        <td> <?=  $aricle->summary ?> </td>
        <td> <?=  $aricle->content ?> </td>
        <td> <?=  $aricle->Active ?> </td>
        <td> <?=  $aricle->SubcategoryId ?> </td>
    
        
        
        <td>  <?= $User->returnIfAllowed("admin/adminusers/edit", 
                    "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/adminarticles/edit&id=". $aricle->id) 
                    . ">[Редактировать]</a>");?></td>
       </tr>
    <?php endforeach; ?>
    
    </tbody>
</table>

<?php else:?>
    <p> Список cтатей пуст. </p>
<?php endif; ?>