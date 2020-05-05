<?php

class msAllDeliveryOfficeItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'msAllDeliveryItem';
    public $classKey = 'msAllDeliveryItem';
    public $languageTopics = ['msalldelivery'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('msalldelivery_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('msalldelivery_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'msAllDeliveryOfficeItemCreateProcessor';