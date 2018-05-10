options={
    data: {
        type: 'remote',
        source: {
            read: {
                url: laroute.route("services.list"),
                method: 'POST',
                // custom headers
                headers: { 'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                params: {
                    // custom parameters
                    // generalSearch: '',
                    // EmployeeID: 1,
                    // someParam: 'someValue',
                    // token: 'token-value'
                },
                // map: function(raw) {
                //     // sample data mapping
                //     var dataSet = raw;
                //     if (typeof raw.data !== 'undefined') {
                //         dataSet = raw.data;
                //     }
                //     return dataSet;
                // },
            }
        },
        pageSize: 10,
        saveState: {
            cookie: true,
            webstorage: true
        },

        serverPaging: true,
        serverFiltering: true,
        serverSorting: false,
        autoColumns: false
    },

    layout: {
        theme: 'default',
        class: 'm-datatable--brand',
        scroll: false,
        height: null,
        footer: true,
        header: true,

        smoothScroll: {
            scrollbarShown: true
        },

        spinner: {
            overlayColor: '#000000',
            opacity: 0,
            type: 'loader',
            state: 'brand',
            message: true
        },

        icons: {
            sort: {asc: 'la la-arrow-up', desc: 'la la-arrow-down'},
            pagination: {
                next: 'la la-angle-right',
                prev: 'la la-angle-left',
                first: 'la la-angle-double-left',
                last: 'la la-angle-double-right',
                more: 'la la-ellipsis-h'
            },
            rowDetail: {expand: 'fa fa-caret-down', collapse: 'fa fa-caret-right'}
        }
    },

    sortable: true,

    pagination: true,

    search: {
        // enable trigger search by keyup enter
        // onEnter: false,
        // input text for search
        // input: $('#generalSearch'),
        // search delay in milliseconds
        // delay: 700,
    },

    // detail: {
    //     title: 'Load sub table',
    //     content: function (e) {
    //         // e.data
    //         // e.detailCell
    //     }
    // },

    rows: {
        callback: function() {},
        // auto hide columns, if rows overflow. work on non locked columns
        autoHide: false,
    },

    // columns definition
    columns: [{
        field: "service_id",
        title: "ID",
        sortable: 'asc',
        filterable: false,
        width: 30,
        responsive: {visible: 'md'},
        // locked: {left: 'xl'},
        template: '{{service_id}}',
    },
    {
        field: "service_code",
        title: "Mã Dịch vụ",
        sortable: 'asc',
        filterable: false,
        width: 50,
        responsive: {visible: 'md'},
        // locked: {left: 'xl'},
        template: '{{service_code}}',
    },
    {
        field: "service_name",
        title: "Tên dịch vụ",
        sortable: 'asc',
        filterable: false,
        width: 150,
        responsive: {visible: 'md'},
        // locked: {left: 'xl'},
        template: '{{service_name}}',
    },
    {
        field: "description",
        title: "Mô tả",
        sortable: 'asc',
        filterable: false,
        width: 150,
        responsive: {visible: 'md'},
        // locked: {left: 'xl'},
        template: '{{description}}',
    },
    {
        field: "services_image",
        title: "Hình ảnh",
        sortable: 'asc',
        filterable: false,
        width: 80,
        responsive: {visible: 'md'},
            // locked: {left: 'xl'},
        template: '{{services_image}}',
    },
    {
            field: "detail",
            title: "Chi tiết",
            sortable: 'asc',
            filterable: false,
            width: 200,
            responsive: {visible: 'md'},
            // locked: {left: 'xl'},
            template: '{{detail}}',
    },
    {
            field: "is_active",
            title: "Trạng thái",
            sortable: 'asc',
            filterable: false,
            width: 120,
            responsive: {visible: 'md'},
            // locked: {left: 'xl'},
            template: function (row) {

                if(row.is_active==1)
                    return '<div class="btn-is-active pretty p-switch p-fill" >\n' +
                        '        <input type="checkbox" checked data-id="'+row.service_id+'" act="publish"/>\n' +
                        '        <div class="state p-success">\n' +
                        '            <label>Hoạt động</label>\n' +
                        '        </div>\n' +
                        '    </div>';
                else{
                    return '<div class="btn-is-active pretty p-switch p-fill" >\n' +
                        '        <input type="checkbox" data-id="'+row.service_id+'" act="unPublish" />\n' +
                        '        <div class="state p-success">\n' +
                        '            <label>Tạm ngưng</label>\n' +
                        '        </div>\n' +
                        '    </div>';
                }

            }
    },
        {
            field: "",
            title: "Hành động",
            width: 50,
            sortable: false,
            responsive: {visible: 'md'},
            // locked: {left: 'xl'},
            template: function (row) {
                return "<a href='"+laroute.route('services.edit',{id:row.service_id})+"'\n" +
                    "class=\"m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill\"\n" +
                    "title=\"Sửa dữ liệu\"><i class=\"la la-edit\"></i></a>\n" +
                    "<button onclick=\"service.remove(this, '"+row.service_id+"')\"\n" +
                    "class=\"m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill\"\n" +
                    "title=\"Xóa dữ liệu\"><i class=\"la la-trash\"></i></button>";
            }
        },],

    toolbar: {
        layout: ['pagination', 'info'],
    //
        placement: ['bottom'],  //'top', 'bottom'
    //
        items: {
            pagination: {
                // type: 'default',
                //
                // pages: {
                //     desktop: {
                //         layout: 'default',
                //         pagesNumber: 6
                //     },
                //     tablet: {
                //         layout: 'default',
                //         pagesNumber: 3
                //     },
                //     mobile: {
                //         layout: 'compact'
                //     }
                // },
                //
                // navigation: {
                //     prev: true,
                //     next: true,
                //     first: true,
                //     last: true
                // },
    //
                pageSizeSelect: [10, 25, 50, 100]
            },
    //
            info: true
        }
    },

    // translate: {
    //     records: {
    //         processing: 'Please wait...',
    //         noRecords: 'No records found'
    //     },
    //     toolbar: {
    //         pagination: {
    //             items: {
    //                 default: {
    //                     first: 'First',
    //                     prev: 'Previous',
    //                     next: 'Next',
    //                     last: 'Last',
    //                     more: 'More pages',
    //                     input: 'Page number',
    //                     select: 'Select page size'
    //                 },
    //                 info: 'Displaying {{start}} - {{end}} of {{total}} records'
    //             }
    //         }
    //     }
    // }
};
var datatable = $('#m_datatable').mDatatable(options);

var _search= function(){
    is_active = $("select.m-input").val();
    search_type = $(".search-type").val();
    text_value = $("#generalSearch").val();
    column = "search";
    value = {
        search_type:search_type,
        search_keyword:text_value,
        is_active:is_active
    };
    datatable.search(value,column);
}

$(document).ready(function () {
    $(document).on("change", ".btn-is-active input", function () {
        // alert("ssss");
        $(this).prop("disabled", true);
        service.changeStatus($(this), $(this).attr("data-id"), $(this).attr("act"));
    });


    $("#m_datatable").on("m-datatable--on-update-perpage", function (e, args) {
        alert($(".selectpicker").attr("title"));
        // console.log(e);
        // console.log(args);
    });

    $(".frmFilter").submit(function (e) {
        e.preventDefault();
        _search();
    });

    $("select.m-input").change(function () {
        _search();
    })
});