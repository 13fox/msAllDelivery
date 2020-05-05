<?php

class msAllDeliveryItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'msAllDeliveryItem';
    public $classKey = 'msAllDeliveryItem';
    public $languageTopics = ['msalldelivery:manager'];
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
        $this->setProperty('mode', 'new');
        return parent::beforeSet();
    }

}

return 'msAllDeliveryItemCreateProcessor';