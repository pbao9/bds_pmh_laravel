<script>
    function searchColumsDataTable(datatable) {
        datatable.api().columns([1,2]).every(function () {
            var column = this, 
            input = document.createElement("input");

            if(column.selector.cols == 2){
                input = document.createElement("select");
                createSelectColumnUniqueDatatable(column, input);
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