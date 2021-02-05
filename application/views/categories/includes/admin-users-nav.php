<?php 
use ItForFree\SimpleMVC\Config;
use ItForFree\SimpleMVC\Url;

$User = Config::getObject('core.user.class');


//vpre($User->explainAccess("admin/adminusers/index"));
?>

<ul class="nav">
    
    <?php  if ($User->isAllowed("admin/adminusers/index")): ?>
    <li class="nav-item ">
        <a class="nav-link" href="<?= Url::link("admin/admincategories/index") ?>">Список</a>
    </li>
    <?php endif; ?>
    
    <?php  if ($User->isAllowed("admin/adminusers/add")): ?>
    <li class="nav-item ">
        <a class="nav-link" href="<?= Url::link("admin/admincategories/add") ?>"> + Добавить категорию</a>
    </li>
    <?php endif; ?>  
</ul>