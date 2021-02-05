<?php 
use ItForFree\SimpleMVC\Config;
use ItForFree\SimpleMVC\Url;

$User = Config::getObject('core.user.class');


//vpre($User->explainAccess("admin/adminusers/index"));
?>

<ul class="nav">
    
    <?php  if ($User->isAllowed("admin/adminsubcategories/index")): ?>
    <li class="nav-item ">
        <a class="nav-link" href="<?= Url::link("admin/adminsubcategories/index") ?>">Список</a>
    </li>
    <?php endif; ?>
    
    <?php  if ($User->isAllowed("admin/adminsubcategories/add")): ?>
    <li class="nav-item ">
        <a class="nav-link" href="<?= Url::link("admin/adminsubcategories/add") ?>"> + Добавить субкатегорию</a>
    </li>
    <?php endif; ?>  
</ul>