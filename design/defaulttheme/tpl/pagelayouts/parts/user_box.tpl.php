<?php
$currentUser = erLhcoreClassUser::instance();
$UserData = $currentUser->getUserData(true); ?>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo htmlspecialchars($UserData->name),' ',htmlspecialchars($UserData->surname)?> <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li><a href="<?php echo erLhcoreClassDesign::baseurl('user/account')?>" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('pagelayout/pagelayout','Account')?>"><i class="glyphicon glyphicon-user"></i> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('pagelayout/pagelayout','Account')?></a></li>
        <li><a id="logoutbut" href="<?php echo erLhcoreClassDesign::baseurl('user/logout')?>" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('pagelayout/pagelayout','Logout');?>"><i class="glyphicon glyphicon-log-out"></i> <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('pagelayout/pagelayout','Logout');?></a></li>
    </ul>
</li>
        <?php $tempp = $currentUser->getUserData(); ?> 
        <div id="angularvalue3"  > <?php echo $tempp->id ?> </div> 
<script>


        var logout = function () {
            var userlog = document.getElementById('angularvalue3').innerText;
            angular.element(document.getElementById('cont')).scope().lhc.logout( userlog);
        };
        document.getElementById('logoutbut').onclick = logout;
    
</script>
 <?php unset($currentUser);unset($UserData);?>