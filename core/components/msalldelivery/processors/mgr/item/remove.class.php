<?php
class msAllDeliveryItemRemoveProcessor extends modObjectRemoveProcessor
{
    public $objectType = 'msAllDeliveryItem';
    public $classKey = 'msAllDeliveryItem';
    public $languageTopics = ['msalldelivery:manager'];
    #public $permission = 'remove';

    /**
     * @return bool|null|string
     */
    public function initialize()
    {
        if (!$this->modx->hasPermission($this->permission)) {
            return $this->modx->lexicon('access_denied');
        }
        return parent::initialize();
    }
}

return 'msAllDeliveryItemRemoveProcessor';