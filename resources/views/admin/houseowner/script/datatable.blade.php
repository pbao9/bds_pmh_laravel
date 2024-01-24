<script>
    function SearchColumsDataTable(datatable) {

        datatable.api().columns([0, 1, 2, 3, 4, 5, 6]).every(function() {
            var column = this;

            var input = document.createElement("input");
            input.setAttribute('placeholder', 'Nhập từ khóa');

            if (column.selector.cols == 6) {
                input.setAttribute('type', 'date');
            } else if (column.selector.cols == 4) {
                input = document.createElement("select"),
                    createSelectColumnUniqueDatatable(column, input);
            }
            input.setAttribute('class', 'form-control');

            $(input).appendTo($(column.footer()).empty())
                .on('change', function() {
                    column.search($(this).val(), false, false, true).draw();
                });
        });
    }

    function SearchColumsDataTableHouseOwner(datatable) {

        datatable.api().columns([0, 1, 2, 3, 4, 5, 6, 7, 8, 9]).every(function() {
            var column = this;

            var input = document.createElement("input");
            input.setAttribute('placeholder', 'Nhập từ khóa');

            if (column.selector.cols == 9) {
                input.setAttribute('type', 'date');
                // }else if(column.selector.cols == 3  || column.selector.cols == 4  || column.selector.cols == 6){
                //     input = document.createElement("select"), 

                //     createSelectColumnUniqueDatatable(column, input);

            }
            input.setAttribute('class', 'form-control');

            if (column.selector.cols == 6) {

                $(input).appendTo($(column.footer()).empty())
                    .on('change', function() {
                        column.search('^' + this.value + '$', true, false).unique().draw();
                    });
            } else {

                $(input).appendTo($(column.footer()).empty())
                    .on('change', function() {
                        column.search($(this).val(), false, false, true).draw();
                    });
            }

        });
    }
</script>
