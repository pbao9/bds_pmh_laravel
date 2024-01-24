$(document).ready(function() {
    $("#typeContract").on('change', function(e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: routeGetFormCreate + '/' + $(this).val(),
            data: {},
            error: function(data) {

            },
            success: function(response) {
                $('#filled-form').empty().append(response);
            }
        });

    });
})
$(document).ready(function() {
    routeGetFormEdit = routeGetFormEdit.replace("type", "");
    $("#typeContractEdit").on('change', function(e) {

        e.preventDefault();
        $.ajax({
            type: "GET",
            url: routeGetFormEdit + $(this).val(),
            data: {},
            error: function(data) {

            },
            success: function(response) {
                $('#filled-form').empty().append(response);
            }
        });

    });
})