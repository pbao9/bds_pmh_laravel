<script>

function SearchColumsDataTable(datatable) {
    datatable.api().columns([1, 2, 3, 4, 5, 6, 7, 8]).every(function () {
        var column = this;
        var input = document.createElement("input");
        input.setAttribute('placeholder', 'Nhập từ khóa');
        input.setAttribute('class', 'form-control');

        //search for column address advanced
        if(column.selector.cols == 8){ 
            //defind element
            var selectDistrict = document.createElement("select"),
            selectWard = document.createElement("select"),
            div = document.createElement("div"),
            i = document.createElement("i");
            
            // assigned attr for element
            div.setAttribute('class', 'search-advanced');
            i.setAttribute('class', 'fas fa-filter');
            div.setAttribute('style', 'display: none;');

            selectDistrict.setAttribute('class', 'select2bs4 form-control');
            selectWard.setAttribute('class', 'select2bs4 form-control');

            selectWard.setAttribute('name', 'ward_id');
            selectDistrict.setAttribute('name', 'district_id');

            //render input and config search value for text address
            $(input).appendTo($(column.footer()).empty())
            .on('change', function () {
                console.log($(this).val()+'|'+$(selectWard).val()+'|'+$(selectDistrict).val());
                column.search($(this).val()+'|'+$(selectWard).val()+'|'+$(selectDistrict).val(), false, false, true).draw();
            });
            
            //render advanced search (district and ward)
            $(selectWard).prependTo($(div));
            $(selectDistrict).prependTo($(div));
            $(div).prependTo($(column.footer()));
            $(i).appendTo($(column.footer()));

            // config search value for id ward
            $(selectWard).on('change', function () {
                column.search($(input).val()+'|'+$(this).val()+'|'+$(selectDistrict).val(), false, false, true).draw();
            });
            // config search value for id district
            $(selectDistrict).on('change', function () {
                
                column.search($(input).val()+'|'+$(selectWard).val()+'|'+$(this).val(), false, false, true).draw();
            });
        }
        else if(column.selector.cols == 4){
            input = document.createElement("select");
            input.setAttribute('class', 'select2bs4 form-control');
            input.setAttribute('name', 'category[]');
            input.setAttribute('multiple', 'multiple');
            
            $(input).appendTo($(column.footer()).empty())
            .on('change', function () {
                column.search($(this).val(), false, false, true).draw();
            });
        }
        else{ //search for column with input and select simple
            if(column.selector.cols == 5 || column.selector.cols == 6 || column.selector.cols == 7){

                input = document.createElement("select"), 
                createSelectColumnUniqueDatatable(column, input);

            }
            

            $(input).appendTo($(column.footer()).empty())
            .on('change', function () {
                column.search($(this).val(), false, false, true).draw();
            });
        }
    });
}

</script>