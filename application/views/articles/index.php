<?php 
use ItForFree\SimpleMVC\Config;

$Articles_get = Config::getObject('core.articles.class');
//categories subcategories $users
//var_dump($users); die();
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
      <th scope="col">Authors</th>
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
        
                <td> <?php  
                
         
                 
                    foreach($subcategories as $subcategory) { 
                       if ((int) $article->SubcategoryId == (int) $subcategory->id) { 
                            echo $subcategory->Subname."<BR>"; 
                         } 
                     } 
               
          
           
         
                
            
                ?> </td>
        
        
        <td> <?=  $article->title ?> </td>
        <td> <?=  $article->summary ?> </td>
        <td> <?=  $article->content ?> </td>
        <td> <?=  $article->Active ?> </td>
    
        
        <td>
            
            <?php 
// var_dump($author_articles); die();
if ($users) {

foreach ($author_articles as $author_article)  {     
       if($author_article["article_id"]==(int) $article->id) {                                
           foreach ($users as $user) {                                      
               if ((int) $user->id == (int) $author_article["users_id"]){
                   echo $user->login."<BR>";
               }  
           }
    
       }
       
      
       } 
        
  
 
 }
 
 // array(6) { [0]=> array(2) { ["users_id"]=> string(1) "1" ["article_id"]=> string(1) "1" } [1]=> array(2) { ["users_id"]=> string(1) "1" ["article_id"]=> string(1) "2" } [2]=> array(2) { ["users_id"]=> string(1) "1" ["article_id"]=> string(1) "3" } [3]=> array(2) { ["users_id"]=> string(1) "2" ["article_id"]=> string(1) "1" } [4]=> array(2) { ["users_id"]=> string(1) "2" ["article_id"]=> string(1) "3" } [5]=> array(2) { ["users_id"]=> string(1) "3" ["article_id"]=> string(1) "1" } } 
 
 
 

    /*    /var/www/my-first-cms/admin.php:520:
array (size=2)
  0 => 
    array (size=2)
      'users_id' => string '1' (length=1)
      'article_id' => string '2' (length=1)
  1 => 
    array (size=2)
      'users_id' => string '2' (length=1)
      'article_id' => string '2' (length=1)
    */
 
 else {
        echo "No authors";
 }

  ?>
            
            
            
        </td>
    
        
        
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