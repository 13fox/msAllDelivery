<?php
/** @var modX $modx */
/** @var array $scriptProperties */
/** @var msAllDelivery $msAllDelivery */
$msAllDelivery = $modx->getService('msAllDelivery', 'msAllDelivery', MODX_CORE_PATH . 'components/msalldelivery/model/', $scriptProperties);
if (!$msAllDelivery) {
    return 'Could not load msAllDelivery class!';
}

// Do your snippet code here. This demo grabs 5 items from our custom table.
$tpl = $modx->getOption('tpl', $scriptProperties, 'Item');
$sortby = $modx->getOption('sortby', $scriptProperties, 'name');
$sortdir = $modx->getOption('sortbir', $scriptProperties, 'ASC');
$limit = $modx->getOption('limit', $scriptProperties, 5);
$outputSeparator = $modx->getOption('outputSeparator', $scriptProperties, "\n");
$toPlaceholder = $modx->getOption('toPlaceholder', $scriptProperties, false);

// Build query
$c = $modx->newQuery('msAllDeliveryItem');
$c->sortby($sortby, $sortdir);
$c->where(['active' => 1]);
$c->limit($limit);
$items = $modx->getIterator('msAllDeliveryItem', $c);

// Iterate through items
$list = [];
/** @var msAllDeliveryItem $item */
foreach ($items as $item) {
    $list[] = $modx->getChunk($tpl, $item->toArray());
}

// Output
$output = implode($outputSeparator, $list);
if (!empty($toPlaceholder)) {
    // If using a placeholder, output nothing and set output to specified placeholder
    $modx->setPlaceholder($toPlaceholder, $output);

    return '';
}
// By default just return output
return $output;
