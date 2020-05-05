<?php
include_once dirname(__FILE__) . '/update.class.php';
class msAllDeliveryItemDisableProcessor extends msAllDeliveryItemUpdateProcessor
{
    public function beforeSet()
    {
        $this->setProperty('active', false);
        return true;
    }
}
return 'msAllDeliveryItemDisableProcessor';
