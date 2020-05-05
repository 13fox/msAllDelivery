<?php
/** @var modX $modx */
/* @var array $scriptProperties */
switch ($modx->event->name) {
    case 'OnHandleRequest':
        /* @var msAllDelivery $msAllDelivery*/
        $msAllDelivery = $modx->getService('msalldelivery', 'msAllDelivery', $modx->getOption('msalldelivery_core_path', $scriptProperties, $modx->getOption('core_path') . 'components/msalldelivery/') . 'model/');
        if ($msAllDelivery instanceof msAllDelivery) {
            $msAllDelivery->loadHandlerEvent($modx->event, $scriptProperties);
        }
        break;
}
return '';