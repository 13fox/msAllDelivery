<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    $dev = MODX_BASE_PATH . 'Extras/msAllDelivery/';
    /** @var xPDOCacheManager $cache */
    $cache = $modx->getCacheManager();
    if (file_exists($dev) && $cache) {
        if (!is_link($dev . 'assets/components/msalldelivery')) {
            $cache->deleteTree(
                $dev . 'assets/components/msalldelivery/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_ASSETS_PATH . 'components/msalldelivery/', $dev . 'assets/components/msalldelivery');
        }
        if (!is_link($dev . 'core/components/msalldelivery')) {
            $cache->deleteTree(
                $dev . 'core/components/msalldelivery/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_CORE_PATH . 'components/msalldelivery/', $dev . 'core/components/msalldelivery');
        }
    }
}

return true;