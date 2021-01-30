<?php 
use ItForFree\SimpleMVC\Config;

$articles = Config::getObject('core.articles.class');
var_dump($articles);die();
?>

<?php include('includes/admin-users-nav.php'); ?>

<h2>Список статей</h2> 
    
<?php if (!empty($users)): ?>
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
    <?php foreach($users as $user): ?>
    <tr>
        <td> <?= $user->id ?> </td>
        <td> <?= $user->login ?> </td>
        <td>  <?= $user->email ?> </td>
        <td>  <?= $user->timestamp ?> </td>
        <td> <?= $user->id ?> </td>
        <td> <?= $user->login ?> </td>
        <td>  <?= $user->email ?> </td>
        <td>  <?= $user->timestamp ?> </td>     
        
        
        <td>  <?= $User->returnIfAllowed("admin/adminusers/edit", 
                    "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/adminusers/edit&id=". $user->id) 
                    . ">[Редактировать]</a>");?></td>
    </tr>
    <?php endforeach; ?>
    
    </tbody>
</table>

<?php else:?>
    <p> Список cтатей пуст. </p>
<?php endif; ?>