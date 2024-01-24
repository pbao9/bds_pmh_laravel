function createSelectColumnUniqueDatatable(column, input) {
    var optionAll = document.createElement("OPTION");
    optionAll.text = '---Tất cả---';
    optionAll.value = '';
    input.setAttribute('class', 'form-control');
    input.append(optionAll);

    column.data().unique().sort().each(function(d, j) {
        var option = document.createElement("OPTION");
        option.value = option.text = d;
        input.append(option);
    });
}

function moveSearchColumnsDatatable(idTable) {
    $(idTable + ' thead').append($(idTable + ' tfoot tr'));
}

function toggleColumnsDatatable(columns) {
    var headerColumns = columns.header().map(d => d.textContent).toArray(),
        htmlToggleColumns = '',
        checked;
    $.each(headerColumns, function(index, value) {
        checked = '';
        if (columns.column(index).visible() === true) {
            checked = 'checked';
        }
        htmlToggleColumns += `
            <div class="form-check">
                <input class="toggle-vis form-check-input" ${checked} type="checkbox" data-column="${index}">
                <label class="form-check-label">${value}</label>
            </div>
        `;
        $(".drop-toggle-columns").html(htmlToggleColumns);
    });
}