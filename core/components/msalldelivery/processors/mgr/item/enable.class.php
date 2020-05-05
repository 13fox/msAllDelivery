<?php
include_once dirname(__FILE__) . '/update.class.php';
class msAllDeliveryItemEnableProcessor extends msAllDeliveryItemUpdateProcessor
{
    public function beforeSet()
    {
        $this->setProperty('active', true);
        return true;
    }
}
return 'msAllDeliveryItemEnableProcessor';