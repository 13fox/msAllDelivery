var msAllDelivery = function (config) {
    config = config || {};
    msAllDelivery.superclass.constructor.call(this, config);
};
Ext.extend(msAllDelivery, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}, buttons: {}
});
Ext.reg('msalldelivery', msAllDelivery);

msAllDelivery = new msAllDelivery();