msAllDelivery.window.CreateItem = function (config) {
    config = config || {}
    config.url = msAllDelivery.config.connector_url

    Ext.applyIf(config, {
        title: _('msalldelivery_item_create'),
        width: 600,
        cls: 'msalldelivery_windows',
        baseParams: {
            action: 'mgr/item/create',
            resource_id: config.resource_id
        }
    })
    msAllDelivery.window.CreateItem.superclass.constructor.call(this, config)

    this.on('success', function (data) {
        if (data.a.result.object) {
            // Авто запуск при создании новой подписик
            if (data.a.result.object.mode) {
                if (data.a.result.object.mode === 'new') {
                    var grid = Ext.getCmp('msalldelivery-grid-items')
                    grid.updateItem(grid, '', {data: data.a.result.object})
                }
            }
        }
    }, this)
}
Ext.extend(msAllDelivery.window.CreateItem, msAllDelivery.window.Default, {

    getFields: function (config) {
        return [
            {xtype: 'hidden', name: 'id', id: config.id + '-id'},
            {
                xtype: 'textfield',
                fieldLabel: _('msalldelivery_item_name'),
                name: 'name',
                id: config.id + '-name',
                anchor: '99%',
                allowBlank: false,
            }, {
                xtype: 'textarea',
                fieldLabel: _('msalldelivery_item_description'),
                name: 'description',
                id: config.id + '-description',
                height: 150,
                anchor: '99%'
            },  {
                xtype: 'msalldelivery-combo-filter-resource',
                fieldLabel: _('msalldelivery_item_resource_id'),
                name: 'resource_id',
                id: config.id + '-resource_id',
                height: 150,
                anchor: '99%'
            }, {
                xtype: 'xcheckbox',
                boxLabel: _('msalldelivery_item_active'),
                name: 'active',
                id: config.id + '-active',
                checked: true,
            }
        ]


    }
})
Ext.reg('msalldelivery-item-window-create', msAllDelivery.window.CreateItem)

msAllDelivery.window.UpdateItem = function (config) {
    config = config || {}

    Ext.applyIf(config, {
        title: _('msalldelivery_item_update'),
        baseParams: {
            action: 'mgr/item/update',
            resource_id: config.resource_id
        },
    })
    msAllDelivery.window.UpdateItem.superclass.constructor.call(this, config)
}
Ext.extend(msAllDelivery.window.UpdateItem, msAllDelivery.window.CreateItem)
Ext.reg('msalldelivery-item-window-update', msAllDelivery.window.UpdateItem)