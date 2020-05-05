<?php
// Подключаем

/** @var modResource $resource */
$resource=$modx->getObject('modResource',array(
    'id'=>5
));
$pagetitle=$resource->get('pagetitle');
$resource->toArray();