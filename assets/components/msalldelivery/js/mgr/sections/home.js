msAllDelivery.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'msalldelivery-panel-home',
            renderTo: 'msalldelivery-panel-home-div'
        }]
    });
    msAllDelivery.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(msAllDelivery.page.Home, MODx.Component);
Ext.reg('msalldelivery-page-home', msAllDelivery.page.Home);