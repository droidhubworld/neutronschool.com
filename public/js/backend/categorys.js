(function () {

    FTX.Category = {

        list: {
        
            selectors: {
                category_table: $('#category-table'),
            },
        
            init: function () {

                this.selectors.category_table.dataTable({

                    processing: false,
                    serverSide: true,

                    ajax: {
                        url: this.selectors.category_table.data('ajax_url'),
                        type: 'post',
                    },
                    columns: [
                        { data: 'name', name: 'name' },
                        { data: 'status', name: 'status' },
                        { data: 'created_at', name: 'created_at', sortable: true },
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

       
    }
})();