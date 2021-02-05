<?php 
use ItForFree\SimpleMVC\Config;

$Articles_get = Config::getObject('core.articles.class');
//categories subcategories
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
      <th scope="col">subcategory</th>
      <th scope="col">title</th>
      <th scope="col">summary</th>
      <th scope="col">content</th>
      <th scope="col">Active</th>
      <th scope="col">SubcategoryId</th>
      <th scope="col"></th>
    </tr>
     </thead>
    <tbody>
    <?php foreach($articles as $article): ?>
    <tr>
        <td> <?=  $article->id ?> </td>
        <td> <?=  $article->publicationDate ?> </td> 
        
        
        
        <td> <?php foreach($categories as $category) { 
            if ( (int) $article->categoryId == (int) $category->id) { 
                echo $category->name; 

            } 
        
        }  ?> </td>
        
                <td> <?php  $a=1;
                
            foreach($categories as $category) { 
            foreach($subcategories as $subcategory) { 
                if ( (int) $category->id == (int) $subcategory->category_id) { 
                    echo $subcategory->Subname; 
                } if ($a==1) {break;}      
            }
                
            
                }?> </td>
        
        
        <td> <?=  $article->title ?> </td>
        <td> <?=  $article->summary ?> </td>
        <td> <?=  $article->content ?> </td>
        <td> <?=  $article->Active ?> </td>
        <td> <?=  $article->SubcategoryId ?> </td>
    
        
        
        <td>  <?= $User->returnIfAllowed("admin/adminusers/edit", 
                    "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/adminarticles/edit&id=". $article->id) 
                    . ">[Редактировать]</a>");?></td>
       </tr>
    <?php endforeach; ?>
    
    </tbody>
</table>

<?php else:?>
    <p> Список cтатей пуст. </p>
<?php endif; ?>