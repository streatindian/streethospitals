

function datatableInit(table, url, columnS, filter = false) {
    console.log(filter);
    var column = [{
        data: 'DT_RowIndex',
        name: 'DT_RowIndex'
    }
    ];
    for (let i = 0; i < columnS.length; i++) {
        column.push({
            data: columnS[i],
            name: columnS[i]
        })
    }
    var myTable = $("#" + table);
    // set on change date picker

    if (!localStorage.getItem(table + 'startDate')) {
        if (filter.start.time) {
            startDate = new Date(filter.start.time);
            if (filter.start.past) {
                startDate.setFullYear(startDate.getFullYear() - filter.start.past);
            }
        }

        $("[name=startDate]").val(filter ? startDate.toISOString().slice(0, 10) : new Date().toISOString().slice(0, 10));
    } else {
        $("[name=startDate]").val(localStorage.getItem(table + 'startDate'));
    }
    if (!localStorage.getItem('endDate')) {
        if (filter.start.time) {
            endDate = new Date(filter.start.time);
        } else {
            endDate = new Date();
        }
        $("[name=endDate]").val(endDate.toISOString().slice(0, 10));
    } else {
        $("[name=endDate]").val(filter.end.time ? filter.end.time : new Date().toISOString().slice(0, 10));
    }
    myTable.DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: url,
            type:"POST",
            data: function (d) {
                if (filter) {
                    d.startDate = $("[name=startDate]").val(),
                        d.endDate = $("[name=endDate]").val()
                }
                d._token  =csrf_token;

            }
        },
        oLanguage: {
            sProcessing: "<div class='demo-inline-spacing'>\
                      <div class='spinner-grow' role='status'>\
                        <span class='visually-hidden'>Loading...</span>\
                      </div><div class='spinner-grow text-danger' role='status'>\
                       <span class='visually-hidden'>Loading...</span>\
                     </div>\
                     <div class='spinner-grow text-warning' role='status'>\
                       <span class='visually-hidden'>Loading...</span>\
                     </div>\
                     <div class='spinner-grow text-info' role='status'>\
                       <span class='visually-hidden'>Loading...</span>\
                     </div>\
                        </div>"
        }
        ,
        columns: column
    });

    $('#startDate, #endDate').on('change', function () {
        var startDate = $("[name=startDate]").val();
        var endDate = $("[name=endDate]").val();
        localStorage.setItem(table + 'startDate', startDate);
        localStorage.setItem(table + 'endDate', endDate);
        if (startDate <= endDate) {
            myTable.DataTable().ajax.reload();
        }
    });
}
