(function () {

    FTX.Address = {

        list: {
        
            selectors: {
                address_table: $('#pages-table'),
            },
        
            init: function () {
               
                this.selectors.address_table.dataTable({

                    processing: false,
                    serverSide: true,
                    ajax: {
                        url: this.selectors.address_table.data('ajax_url'),
                        type: 'post',
                        data: { status: 1, trashed: false }
                    },
                    columns: [
                        { data: 'address1', name: 'address1' },
                        { data: 'city', name: 'city' },
                        { data: 'state', name: 'state' },
                        { data: 'status', name: 'status' },
                        { data: 'post_code', name: 'post_code' },
                        { data: 'actions', name: 'actions', searchable: false, sortable: false }
                    ],
                    order: [[0, "asc"]],
                    searchDelay: 500,
                    "createdRow": function (row, data, dataIndex) {
                        FTX.Utils.dtAnchorToForm(row);
                    }
                    
                });
            }
        },

        edit: {
            init: function (locale) {
                FTX.tinyMCE.init(locale);                
            }
        },
    }
})();