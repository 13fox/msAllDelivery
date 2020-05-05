<?php

/**
 * The home manager controller for msAllDelivery.
 *
 */
class msAllDeliveryHomeManagerController extends modExtraManagerController
{
    /** @var msAllDelivery $msAllDelivery */
    public $msAllDelivery;


    /**
     *
     */
    public function initialize()
    {
        $this->msAllDelivery = $this->modx->getService('msAllDelivery', 'msAllDelivery', MODX_CORE_PATH . 'components/msalldelivery/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['msalldelivery:manager', 'msalldelivery:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('msalldelivery');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->msAllDelivery->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->msAllDelivery->config['jsUrl'] . 'mgr/msalldelivery.js');
        $this->addJavascript($this->msAllDelivery->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->msAllDelivery->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->msAllDelivery->config['jsUrl'] . 'mgr/misc/default.grid.js');
        $this->addJavascript($this->msAllDelivery->config['jsUrl'] . 'mgr/misc/default.window.js');
        $this->addJavascript($this->msAllDelivery->config['jsUrl'] . 'mgr/widgets/items/grid.js');
        $this->addJavascript($this->msAllDelivery->config['jsUrl'] . 'mgr/widgets/items/windows.js');
        $this->addJavascript($this->msAllDelivery->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->msAllDelivery->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addJavascript(MODX_MANAGER_URL . 'assets/modext/util/datetime.js');

        $this->msAllDelivery->config['date_format'] = $this->modx->getOption('msalldelivery_date_format', null, '%d.%m.%y <span class="gray">%H:%M</span>');
        $this->msAllDelivery->config['help_buttons'] = ($buttons = $this->getButtons()) ? $buttons : '';

        $this->addHtml('<script type="text/javascript">
        msAllDelivery.config = ' . json_encode($this->msAllDelivery->config) . ';
        msAllDelivery.config.connector_url = "' . $this->msAllDelivery->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "msalldelivery-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .=  '<div id="msalldelivery-panel-home-div"></div>';
        return '';
    }

    /**
     * @return string
     */
    public function getButtons()
    {
        $buttons = null;
        $name = 'msAllDelivery';
        $path = "Extras/{$name}/_build/build.php";
        if (file_exists(MODX_BASE_PATH . $path)) {
            $site_url = $this->modx->getOption('site_url').$path;
            $buttons[] = [
                'url' => $site_url,
                'text' => $this->modx->lexicon('msalldelivery_button_install'),
            ];
            $buttons[] = [
                'url' => $site_url.'?download=1&encryption_disabled=1',
                'text' => $this->modx->lexicon('msalldelivery_button_download'),
            ];
            $buttons[] = [
                'url' => $site_url.'?download=1',
                'text' => $this->modx->lexicon('msalldelivery_button_download_encryption'),
            ];
        }
        return $buttons;
    }
}