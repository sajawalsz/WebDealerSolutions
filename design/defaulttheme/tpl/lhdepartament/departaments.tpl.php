<?php if ($_SESSION['var'] == 1) : ?>


<h1><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/departments','Domains');?></h1>

<table class="table" cellpadding="0" cellspacing="0">
<thead>
<tr>

    <th width="1%">ID</th>
    <th><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/departments','Name');?></th>
    <th><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/departments','E-mail');?></th>
    <th width="1%">&nbsp;</th>
</tr>
</thead>
<?php foreach ($items as $departament) : ?>
    <tr>
        <td><?php echo $departament->id?></td>
        <td><?php echo htmlspecialchars($departament->name)?></td>
        <td><?php echo htmlspecialchars($departament->email)?></td>
        <td nowrap><a class="btn btn-default btn-xs" href="<?php echo erLhcoreClassDesign::baseurl('departament/edit')?>/<?php echo $departament->id?>"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/departments','Edit domain');?></a></td>
    </tr>
<?php endforeach; ?>
</table>

<?php if (isset($pages)) : ?>
    <?php include(erLhcoreClassDesign::designtpl('lhkernel/paginator.tpl.php')); ?>
<?php endif;?>

<?php if (erLhcoreClassUser::instance()->hasAccessTo('lhdepartament','create')) : ?>
<a class="btn btn-default" href="<?php echo erLhcoreClassDesign::baseurl('departament/new')?>"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/departments','New domain');?></a>
<?php endif;?>
<?php endif;?>




<?php if ($_SESSION['var'] == 2) : ?>

<h1><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/departments','Tips');?></h1>

<table class="table" cellpadding="0" cellspacing="0">
<thead>
<tr>
    <th width="1%">ID</th>
    <th><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/departments','Tips');?></th>
    <th width="1%">&nbsp;</th>
</tr>
</thead>
<?php foreach ($items as $departament) : ?>
    <tr>
        <td><?php echo $departament->id?></td>
        <td><?php echo htmlspecialchars($departament->tips)?></td>
        <td nowrap><a class="btn btn-default btn-xs" href="<?php echo erLhcoreClassDesign::baseurl('departament/edit')?>/<?php echo $departament->id?>"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/departments','Edit tip');?></a></td>
    </tr>
<?php endforeach; ?>
</table>

<?php if (isset($pages)) : ?>
    <?php include(erLhcoreClassDesign::designtpl('lhkernel/paginator.tpl.php')); ?>
<?php endif;?>

<?php if (erLhcoreClassUser::instance()->hasAccessTo('lhdepartament','create')) : ?>
<a class="btn btn-default" href="<?php echo erLhcoreClassDesign::baseurl('departament/new')?>"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/departments','New tip');?></a>
<?php endif;?>

<?php endif;?>


<?php if ($_SESSION['var'] == 3) : ?>

<h1><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('department/departments','Tips');?></h1>

<?php endif;?>