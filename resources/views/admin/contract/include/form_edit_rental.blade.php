<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Mã Bất động sản') }}:</label>
            <x-input name="rental_land_code" :value="$contract->rental_land_code" placeholder="{{ __('Mã Bất động sản') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Tên Bất động sản') }}:</label>
            <x-input name="rental_land_title" :value="$contract->rental_land_title" placeholder="{{ __('Tên Bất động sản') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Địa chỉ Bất động sản') }}:</label>
            <x-input name="rental_land_address" :value="$contract->rental_land_address" placeholder="{{ __('Địa chỉ Bất động sản') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Thời gian ký hợp đồng') }}:</label>
            <input type="text" class="datepicker form-control" name="rental_date_create"
                value="{{ date('d/m/Y', strtotime($contract->rental_date_create)) }}" placeholder="dd/mm/yyyy">
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Diện tích Bất động sản') }}:</label>
            <x-input name="rental_land_area" :value="$contract->rental_land_area" placeholder="{{ __('Diện tích Bất động sản') }}" />
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Tên người cho thuê') }}:</label>
            <x-input name="rental_owner_fullname" :value="$contract->rental_owner_fullname" placeholder="{{ __('Tên người cho thuê') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Điện thoại') }}</label>
            <x-input name="rental_owner_phonenumber" :value="$contract->rental_owner_phonenumber" placeholder="{{ __('Điện thoại') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Số CCCD/Passport người cho thuê') }}:</label>
            <x-input name="rental_owner_id_number" :value="$contract->rental_owner_id_number"
                placeholder="{{ __('Số CCCD/Passport người cho thuê') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Ngày cấp CCCD/Passport người cho thuê') }}:</label>
            <input type="text" class="datepicker form-control" name="rental_owner_id_date"
                value="{{ date('d/m/Y', strtotime($contract->rental_owner_id_date)) }}" placeholder="dd/mm/yyyy">
            {{-- <x-input type="date" name="rental_owner_id_date" :value="$contract->rental_owner_id_date" placeholder="{{ __(' Ngày cấp CCCD/Passport người cho thuê') }}" /> --}}
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Nơi cấp CCCD/Quốc tịch người cho thuê') }}:</label>
            <x-input name="rental_owner_id_location" :value="$contract->rental_owner_id_location"
                placeholder="{{ __('Nơi cấp CCCD/Quốc tịch') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Nơi cư trú người cho thuê') }}:</label>
            <x-input name="rental_owner_location" :value="$contract->rental_owner_location"
                placeholder="{{ __('Nơi cư trú người cho thuê') }}" />
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Phân loại khách') }}:</label>
            <x-select id="typeContractCustomerEd" name="typeContractCustomerEd">
                <x-option value="" selected :title="__('Chọn loại khách')" />
                <x-option value="1" :title="__('Khách cá nhân')" />
                <x-option value="2" :title="__('Công ty thuê')" />
            </x-select>
        </div>
    </div>
</div>
<div class="row" id="rentalCustomerFieldsEd">
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Tên người thuê') }}:</label>
            <x-input name="rental_customer_fullname" :value="$contract->rental_customer_fullname" placeholder="{{ __('Tên người thuê') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Điện thoại') }}</label>
            <x-input name="rental_owner_phonenumber" :value="$contract->rental_customer_phonenumber" placeholder="{{ __('Điện thoại') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Nơi cư trú người thuê') }}:</label>
            <x-input name="rental_customer_location" :value="$contract->rental_customer_location"
                placeholder="{{ __('Nơi cư trú người  thuê') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Số CCCD/Passport người thuê') }}:</label>
            <x-input name="rental_customer_id_number" :value="$contract->rental_customer_id_number"
                placeholder="{{ __('Số CCCD/Passport người thuê') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Nơi cấp CCCD/Quốc tịch người thuê') }}:</label>
            <x-input name="rental_customer_id_location" :value="$contract->rental_customer_id_location"
                placeholder="{{ __('Nơi cấp CCCD/Quốc tịch') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Ngày cấp CCCD/Passport người thuê') }}:</label>
            <input type="text" class="datepicker form-control" name="rental_customer_id_date"
                value="{{ date('d/m/Y', strtotime($contract->rental_customer_id_date)) }}" placeholder="dd/mm/yyyy">
            {{-- <x-input type="date" name="rental_customer_id_date" :value="$contract->rental_customer_id_date" placeholder="{{ __(' Ngày cấp CCCD/Passport người thuê') }}" /> --}}
        </div>
    </div>
</div>
<div class="row" id="companyFieldsEd">
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Công ty thuê') }}:</label>
            <x-input name="rental_customer_company" :value="$contract->rental_customer_company" placeholder="{{ __('Công ty thuê') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Địa chỉ') }}:</label>
            <x-input name="rental_customer_address" :value="$contract->rental_customer_address" placeholder="{{ __('Địa chỉ') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Mã số thuế') }}:</label>
            <x-input name="rental_customer_code" :value="$contract->rental_customer_code" placeholder="{{ __('Mã số thuế') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Người đại diện công ty') }}:</label>
            <x-input name="rental_customer_represent" :value="$contract->rental_customer_represent"
                placeholder="{{ __('Người đại diện thuê') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Chức vụ') }}:</label>
            <x-input name="rental_customer_position" :value="$contract->rental_customer_position" placeholder="{{ __('Chức vụ') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Điện thoại') }}:</label>
            <x-input name="rental_customer_phone" :value="$contract->rental_customer_phone" placeholder="{{ __('Điện thoại') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Email') }}:</label>
            <x-input name="rental_customer_email" :value="$contract->rental_customer_email" placeholder="{{ __('Email') }}" />
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Người đại diện làm chứng') }}:</label>
            <x-input name="rental_performer_represent" :value="$contract->rental_performer_represent" placeholder="{{ __('Người đại diện') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Chức vụ') }}:</label>
            <x-input name="rental_performer_position" :value="$contract->rental_performer_position" placeholder="{{ __('Chức vụ') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Người thực hiện') }}:</label>
            <x-input name="rental_performer_fullname" :value="$contract->rental_performer_fullname" placeholder="{{ __('Người thực hiện') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Mục dích thuê') }}:</label>
            <x-input name="rental_purpose" :value="$contract->rental_purpose" placeholder="{{ __('Mục dích thuê') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Thời gian cho thuê(tháng)') }}:</label>
            <x-input type="number" name="rental_time" :value="$contract->rental_time"
                placeholder="{{ __('Thời gian cho thuê(tháng)') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Mục dích thuê (foreign language)') }}:</label>
            <x-input name="rental_purpose_lang" :value="$contract->rental_purpose_lang"
                placeholder="{{ __('Mục dích thuê (foreign language)') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Thời gian bắt đầu thuê') }}:</label>
            <input type="text" class="datepicker form-control" name="rental_time_start"
                value="{{ date('d/m/Y', strtotime($contract->rental_time_start)) }}" placeholder="dd/mm/yyyy">
            {{-- <x-input type="date" name="rental_time_start" :value="$contract->rental_time_start" placeholder="{{ __('Thời gian bắt đầu thuê') }}" /> --}}
        </div>
    </div>
</div>


<hr>
<!--id="moneyvietnamese"-->

<div class="row">
    <em style="color:red">(Vui lòng chọn mệnh giá tiền tương ứng với hợp đồng)</em>
    <div class="col-12 d-flex flex-row">
        <div class="col-md-1 col-sm-12"> <label for="#">Mệnh giá tiền:</label></div>
        <div class="col-md-1 col-sm-12 text-center">
            <div class="form-group">
                <label for="rental_status_price_vnd" class="control-label">{{ __('VNĐ') }}:</label>
                <input type="radio" name="rental_price_type" value="0"
                    {{ $contract->rental_price_type == 0 ? 'checked' : '' }} onChange="rentalPriceType()" required />
            </div>
        </div>
        <div class="col-md-1 col-sm-12 text-center">
            <div class="form-group">
                <label for="rental_status_price_usd" class="control-label">{{ __('USD') }}:</label>
                <input type="radio" name="rental_price_type" value="1"
                    {{ $contract->rental_price_type == 1 ? 'checked' : '' }} onChange="rentalPriceType()" required />
            </div>
        </div>
        <div class="col-md-1 col-sm-12 text-center">
            <div class="form-group">
                <label for="rental_status_price_kr" class="control-label">{{ __('원') }}:</label>
                <input type="radio" name="rental_price_type" value="2"
                    {{ $contract->rental_price_type == 2 ? 'checked' : '' }} onChange="rentalPriceType()" required />
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">

            @if ($contract->rental_price_type == 0)
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Giá thuê(VNĐ)') }}:</label>
                            <input class="form-control" type="text" name="rental_price_vnd"
                                value="{{ $contract->rental_price_vnd }}" placeholder="{{ __('Giá thuê(VNĐ)') }}" />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Bằng chữ') }}:</label>
                            <input class="form-control" type="text" name="rental_price_text"
                                value="{{ $contract->rental_price_text }}" placeholder="{{ __('Bằng chữ') }}" />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Giá thuê(USD)') }}:</label>
                            <input class="form-control" type="text" name="rental_price_usd"
                                value="{{ $contract->rental_price_usd }}" placeholder="{{ __('Giá thuê(USD)') }}"
                                disabled />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Bằng chữ') }}:</label>
                            <input class="form-control" type="text" name="rental_price_usd_text"
                                value="{{ $contract->rental_price_usd_text }}" placeholder="{{ __('Bằng chữ') }}"
                                disabled />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Giá thuê(원)') }}:</label>
                            <input class="form-control" type="text" name="rental_price_kr"
                                value="{{ $contract->rental_price_kr }}"
                                placeholder="{{ __('Giá thuê(원)') }}"disabled />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Bằng chữ') }}:</label>
                            <input class="form-control" type="text" name="rental_price_kr_text"
                                value="{{ $contract->rental_price_kr_text }}" placeholder="{{ __('Bằng chữ') }}"
                                disabled />
                        </div>
                    </div>
                </div>
            @elseif($contract->rental_price_type == 1)
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Giá thuê(VNĐ)') }}:</label>
                            <input class="form-control" type="text" name="rental_price_vnd"
                                value="{{ $contract->rental_price_vnd }}" placeholder="{{ __('Giá thuê(VNĐ)') }}" />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Bằng chữ') }}:</label>
                            <input class="form-control" type="text" name="rental_price_text"
                                value="{{ $contract->rental_price_text }}" placeholder="{{ __('Bằng chữ') }}" />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Giá thuê(USD)') }}:</label>
                            <input class="form-control" type="text" name="rental_price_usd"
                                value="{{ $contract->rental_price_usd }}" placeholder="{{ __('Giá thuê(USD)') }}" />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Bằng chữ') }}:</label>
                            <input class="form-control" type="text" name="rental_price_usd_text"
                                value="{{ $contract->rental_price_usd_text }}" placeholder="{{ __('Bằng chữ') }}" />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Giá thuê(원)') }}:</label>
                            <input class="form-control" type="text" name="rental_price_kr"
                                value="{{ $contract->rental_price_kr }}"
                                placeholder="{{ __('Giá thuê(원)') }}"disabled />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Bằng chữ') }}:</label>
                            <input class="form-control" type="text" name="rental_price_kr_text"
                                value="{{ $contract->rental_price_kr_text }}" placeholder="{{ __('Bằng chữ') }}"
                                disabled />
                        </div>
                    </div>
                </div>
            @elseif($contract->rental_price_type == 2)
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Giá thuê(VNĐ)') }}:</label>
                            <input class="form-control" type="text" name="rental_price_vnd"
                                value="{{ $contract->rental_price_vnd }}"
                                placeholder="{{ __('Giá thuê(VNĐ)') }}" />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Bằng chữ') }}:</label>
                            <input class="form-control" type="text" name="rental_price_text"
                                value="{{ $contract->rental_price_text }}" placeholder="{{ __('Bằng chữ') }}" />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Giá thuê(USD)') }}:</label>
                            <input class="form-control" type="text" name="rental_price_usd"
                                value="{{ $contract->rental_price_usd }}" placeholder="{{ __('Giá thuê(USD)') }}"
                                disabled />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Bằng chữ') }}:</label>
                            <input class="form-control" type="text" name="rental_price_usd_text"
                                value="{{ $contract->rental_price_usd_text }}" placeholder="{{ __('Bằng chữ') }}"
                                disabled />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Giá thuê(원)') }}:</label>
                            <input class="form-control" type="text" name="rental_price_kr"
                                value="{{ $contract->rental_price_kr }}" placeholder="{{ __('Giá thuê(원)') }}" />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Bằng chữ') }}:</label>
                            <input class="form-control" type="text" name="rental_price_kr_text"
                                value="{{ $contract->rental_price_kr_text }}"
                                placeholder="{{ __('Bằng chữ') }}" />
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Giá thuê(VNĐ)') }}:</label>
                            <input class="form-control" type="text" name="rental_price_vnd"
                                placeholder="{{ __('Giá thuê(VNĐ)') }}" disabled />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Bằng chữ') }}:</label>
                            <input class="form-control" type="text" name="rental_price_text"
                                placeholder="{{ __('Bằng chữ') }}" disabled />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Giá thuê(USD)') }}:</label>
                            <input class="form-control" type="text" name="rental_price_usd"
                                placeholder="{{ __('Giá thuê(USD)') }}" disabled />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Bằng chữ') }}:</label>
                            <input class="form-control" type="text" name="rental_price_usd_text"
                                placeholder="{{ __('Bằng chữ') }}" disabled />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Giá thuê(원)') }}:</label>
                            <input class="form-control" type="text" name="rental_price_kr"
                                placeholder="{{ __('Giá thuê(원)') }}"disabled />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">{{ __('Bằng chữ') }}:</label>
                            <input class="form-control" type="text" name="rental_price_kr_text"
                                placeholder="{{ __('Bằng chữ') }}" disabled />
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Số tháng cọc') }}:</label>
            <x-input type="number" name="rental_month_earnest" :value="$contract->rental_month_earnest"
                placeholder="{{ __('Số tháng cọc') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Số tháng đóng tiền/đợt') }}:</label>
            <x-input type="number" name="rental_month_pay" :value="$contract->rental_month_pay"
                placeholder="{{ __('Số tháng đóng tiền/đợt') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Ngày đầu đợt thanh toán') }}:</label>
            <x-input type="number" name="rental_pay_start" :value="$contract->rental_pay_start"
                placeholder="{{ __('Ngày đầu đợt thanh toán') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Ngày cuối đợt thanh toán') }}:</label>
            <x-input type="number" name="rental_pay_end" :value="$contract->rental_pay_end"
                placeholder="{{ __('Ngày cuối đợt thanh toán') }}" />
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Điệu kiện thỏa thuận riêng') }}:</label>
            <textarea name="rental_condition" class="form-control" placeholder="{{ __('Điều kiện thỏa thuận riêng') }}">{{ $contract->rental_condition }}</textarea>
        </div>
    </div>
</div>

@include('admin.contract.include.js')
