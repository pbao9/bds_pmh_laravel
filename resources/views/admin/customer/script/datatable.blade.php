<script>

function SearchColumsDataTable(datatable) {
    datatable.api().columns([0, 1, 2, 3, 4, 5, 6, 7]).every(function () {
        var column = this;
        var input = document.createElement("input");
        if(column.selector.cols == 5 || column.selector.cols == 6 || column.selector.cols == 7){
            input.setAttribute('type', 'date');
        }
        input.setAttribute('placeholder', 'Nhập từ khóa');
        input.setAttribute('class', 'form-control');

        $(input).appendTo($(column.footer()).empty())
        .on('change', function () {
            column.search($(this).val(), false, false, true).draw();
        });
    });
}

</script>