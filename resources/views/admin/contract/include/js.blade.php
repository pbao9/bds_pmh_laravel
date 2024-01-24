<script>
    $(document).ready(function() {
        $('.companyFields').hide();
        $('.moneyvietnamese').hide();
        $('.moneykr').hide();
        $('.moneyusd').hide();
        $('.typeContractCustomer').change(function() {
            var selectedValue = $(this).val();
            if (selectedValue == 'individual') {
                $('.rentalCustomerFields').show();
                $('.companyFields').hide();
            } else if (selectedValue == 'company') {
                $('.companyFields').show();
                $('.rentalCustomerFields').hide();
            } else {
                $('.companyFields').hide();
                $('.rentalCustomerFields').hide();
            }
        });
        $('.typemoney').change(function() {
            var selectedValue = $(this).val();
            if (selectedValue == 'vnd') {
                $('.moneyvietnamese').show();
                $('.moneyusd').hide();
            } else if (selectedValue == 'usd') {
                $('.moneyusd').show();
                $('.moneyvietnamese').hide();
            } else if (selectedValue == 'kr') {
                $('.moneykr').show();
                $('.moneyvietnamese').hide();
            } else {
                $('.moneyusd').hide();
                $('.moneyvietnamese').hide();
                $('.moneykr').hide();
            }
        });

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd', // Định dạng ngày tháng
            autoclose: true, // Đóng datepicker sau khi chọn xong
            todayHighlight: true // Highlight ngày hiện tại
        });
    });



    // function updateRentalPriceType() {

    //     var rentalPriceType = document.querySelector('input[name="rental_price_type"]:checked').value;
    //     var rentalPriceVND = document.querySelector('input[name="rental_price_vnd"]');
    //     var rentalPriceUSD = document.querySelector('input[name="rental_price_usd"]');
    //     var rentalPriceKR = document.querySelector('input[name="rental_price_kr"]');
    //     var rentalPriceTextVND = document.querySelector('input[name="rental_price_text"]');
    //     var rentalPriceTextUSD = document.querySelector('input[name="rental_price_usd_text"]');
    //     var rentalPriceTextKR = document.querySelector('input[name="rental_price_kr_text"]');

    //     if (rentalPriceType == 1) {

    //         rentalPriceUSD.disabled = true;
    //         rentalPriceKR.disabled = true;
    //         rentalPriceTextUSD.disabled = true;
    //         rentalPriceTextKR.disabled = true;

    //         rentalPriceVND.disabled = false;
    //         rentalPriceTextVND.disabled = false;
    //     } else if (rentalPriceType == 2) {
    //         rentalPriceVND.disabled = true;
    //         rentalPriceKR.disabled = true;
    //         rentalPriceTextVND.disabled = true;
    //         rentalPriceTextKR.disabled = true;

    //         rentalPriceUSD.disabled = false;
    //         rentalPriceTextUSD.disabled = false;
    //     } else if (rentalPriceType == 3) {
    //         rentalPriceVND.disabled = true;
    //         rentalPriceUSD.disabled = true;
    //         rentalPriceTextVND.disabled = true;
    //         rentalPriceTextUSD.disabled = true;

    //         rentalPriceKR.disabled = false;
    //         rentalPriceTextKR.disabled = false;
    //     }
    // }

    // function rentalPriceType() {
    //     var rentalPriceType = document.querySelector('input[name="rental_price_type"]:checked').value;
    //     var inputFields = ['rental_price_vnd', 'rental_price_usd', 'rental_price_kr'];
    //     var textFields = ['rental_price_text', 'rental_price_usd_text', 'rental_price_kr_text'];

    //     inputFields.forEach(function(field) {
    //         var inputElement = document.querySelector('input[name="' + field + '"]');
    //         inputElement.disabled = true;
    //     });

    //     textFields.forEach(function(field) {
    //         var textFieldElement = document.querySelector('input[name="' + field + '"]');
    //         textFieldElement.disabled = true;
    //     });

    //     var activeInput = document.querySelector('input[name="rental_price_' + (rentalPriceType == 0 ? 'vnd' : (
    //         rentalPriceType == 1 ? 'usd' : 'kr')) + '"]');

    //     var activeTextField = document.querySelector('input[name="rental_price_' + (rentalPriceType == 0 ? 'text' : (
    //         rentalPriceType == 1 ? 'usd_text' : 'kr_text')) + '"]');

    //     if (activeInput && activeTextField) {
    //         activeInput.disabled = false;
    //         activeTextField.disabled = false;
    //     }
    // }

    function rentalPriceType() {
        var rentalPriceType = document.querySelector('input[name="rental_price_type"]:checked').value;
        var inputFields = ['rental_price_vnd', 'rental_price_usd', 'rental_price_kr'];
        var textFields = ['rental_price_text', 'rental_price_usd_text', 'rental_price_kr_text'];

        inputFields.forEach(function(field) {
            var inputElement = document.querySelector('input[name="' + field + '"]');
            inputElement.disabled = true;
        });

        textFields.forEach(function(field) {
            var textFieldElement = document.querySelector('input[name="' + field + '"]');
            textFieldElement.disabled = true;
        });

        var activeInputVnd = document.querySelector('input[name="rental_price_vnd"]');
        var activeTextFieldVnd = document.querySelector('input[name="rental_price_text"]');

        var activeInputUsd = document.querySelector('input[name="rental_price_usd"]');
        var activeTextFieldUsd = document.querySelector('input[name="rental_price_usd_text"]');

        var activeInputKr = document.querySelector('input[name="rental_price_kr"]');
        var activeTextFieldKr = document.querySelector('input[name="rental_price_kr_text"]');

        if (rentalPriceType == 0) {
            activeInputVnd.disabled = false;
            activeTextFieldVnd.disabled = false;
        } else if (rentalPriceType == 1) {
            activeInputVnd.disabled = false;
            activeTextFieldVnd.disabled = false;
            activeInputUsd.disabled = false;
            activeTextFieldUsd.disabled = false;
        } else if (rentalPriceType == 2) {
            activeInputVnd.disabled = false;
            activeTextFieldVnd.disabled = false;
            activeInputKr.disabled = false;
            activeTextFieldKr.disabled = false;
        }
    }
</script>
