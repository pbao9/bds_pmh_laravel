<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Ngày tạo hợp đồng') }}:</label>
            {{-- <x-input type="date" name="transfer_date_create" :value="$contract->transfer_date_create" placeholder="{{ __('Ngày tạo hợp đồng') }}" /> --}}
            <input type="text" class="datepicker form-control" name="transfer_date_create" value="{{ date('d/m/Y', strtotime($contract->transfer_date_create)) }}" placeholder="dd/mm/yyyy">
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Tên bất động sản') }}:</label>
            <x-input name="transfer_land_title" :value="$contract->transfer_land_title" placeholder="{{ __('Tên bất động sản') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Mã bất động sản') }}:</label>
            <x-input name="transfer_land_code" :value="$contract->transfer_land_code" placeholder="{{ __('Mã bất động sản') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Địa chỉ bất động sản') }}:</label>
            <x-input name="transfer_land_address" :value="$contract->transfer_land_address" placeholder="{{ __('Địa chỉ bất động sản') }}" />
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Họ tên bên chuyển nhượng') }}:</label>
            <x-input name="transfer_owner_fullname" :value="$contract->transfer_owner_fullname" placeholder="{{ __('Họ tên chủ nhà') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Số CMND/Passport bên chuyển nhượng') }}:</label>
            <x-input name="transfer_owner_id_number" :value="$contract->transfer_owner_id_number"
                placeholder="{{ __('Số CMND/Passport bên chuyển nhượng') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Ngày cấp CMND/Passport bên chuyển nhượng') }}:</label>
            {{-- <x-input type="date" name="transfer_owner_id_date" :value="$contract->transfer_owner_id_date"
                placeholder="{{ __('Ngày cấp CMND/Passport bên chuyển nhượng') }}" /> --}}
            <input type="text" class="datepicker form-control" name="transfer_owner_id_date" value="{{ date('d/m/Y', strtotime($contract->transfer_owner_id_date)) }}" placeholder="dd/mm/yyyy">
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Nơi cấp CMND/Passport bên chuyển nhượng') }}:</label>
            <x-input name="transfer_owner_id_location" :value="$contract->transfer_owner_id_location"
                placeholder="{{ __('Nơi cấp CMND/Passport bên chuyển nhượng') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Địa chỉ bên chuyển nhượng') }}:</label>
            <x-input name="transfer_owner_address" :value="$contract->transfer_owner_address"
                placeholder="{{ __('Địa chỉ CMND/Passport bên chuyển nhượng') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Tài khoản ngân hàng bên chuyển nhượng') }}:</label>
            <x-input name="transfer_owner_bank" :value="$contract->transfer_owner_bank"
                placeholder="{{ __('Tài khoản ngân hàng bên chuyển nhượng') }}" />
        </div>
    </div>
</div>
<hr>
<div class="row">    
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Họ tên bên nhận chuyển nhượng') }}:</label>
            <x-input name="transfer_customer_fullname" :value="$contract->transfer_customer_fullname"
                placeholder="{{ __('Họ tên bên nhận chuyển nhượng') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Số CCCD/Passport bên nhận chuyển nhượng') }}:</label>
            <x-input name="transfer_customer_id_number" :value="$contract->transfer_customer_id_number"
                placeholder="{{ __('Số CCCD/Passport bên nhận chuyển nhượng') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Ngày cấp CCCD/Passport bên nhận chuyển nhượng') }}:</label>
            {{-- <x-input type="date" name="transfer_customer_id_date" :value="$contract->transfer_customer_id_date"
                placeholder="{{ __('Ngày cấp CCCD/Passport bên nhận chuyển nhượng') }}" /> --}}
            <input type="text" class="datepicker form-control" name="transfer_customer_id_date" value="{{ date('d/m/Y', strtotime($contract->transfer_customer_id_date)) }}" placeholder="dd/mm/yyyy">
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Nơi cấp CCCD/Passport bên nhận chuyển nhượng') }}:</label>
            <x-input name="transfer_customer_id_location" :value="$contract->transfer_customer_id_location"
                placeholder="{{ __('Nơi cấp CCCD/Passport bên nhận chuyển nhượng') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Địa chỉ bên nhận chuyển nhượng') }}:</label>
            <x-input name="transfer_customer_address" :value="$contract->transfer_customer_address"
                placeholder="{{ __('Địa chỉ bên nhận chuyển nhượng') }}" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Nguời đại diện') }}:</label>
            <x-input name="transfer_performer_represent" :value="$contract->transfer_performer_represent" placeholder="{{ __('Người đại diện') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Chức vụ') }}:</label>
            <x-input name="transfer_performer_position" :value="$contract->transfer_performer_position" placeholder="{{ __('Chức vụ') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Người thực hiện') }}:</label>
            <x-input name="transfer_performer_fullname" :value="$contract->transfer_performer_fullname" placeholder="{{ __('Người thực hiện') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Diện tích bất động sản') }}:</label>
            <x-input type="number" name="transfer_land_area" :value="$contract->transfer_land_area" placeholder="{{ __('Diện tích bất động sản') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Chủ quyền số') }}:</label>
            <x-input name="transfer_land_certification_number" :value="$contract->transfer_land_certification_number"
                placeholder="{{ __('Chủ quyền số') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Số vào sổ') }}:</label>
            <x-input name="transfer_land_certification_input_number" :value="$contract->transfer_land_certification_input_number"
                placeholder="{{ __('Số vào sổ') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Thửa đất số') }}:</label>
            <x-input name="transfer_land_number" :value="$contract->transfer_land_number" placeholder="{{ __('Thửa đất số') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Tờ bản đồ số') }}:</label>
            <x-input name="transfer_land_map_number" :value="$contract->transfer_land_map_number" placeholder="{{ __('Tờ bản đồ số') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Ký ngày') }}:</label>
            {{-- <x-input type="date" name="transfer_land_certification_date" :value="$contract->transfer_land_certification_date"
                placeholder="{{ __('Ký ngày') }}" /> --}}
            <input type="text" class="datepicker form-control" name="transfer_land_certification_date" value="{{ date('d/m/Y', strtotime($contract->transfer_land_certification_date)) }}" placeholder="dd/mm/yyyy">
                
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Giá chuyển nhượng(số)') }}:</label>
            <x-input type="number" name="transfer_price_number" :value="$contract->transfer_price_number"
                placeholder="{{ __('Giá chuyển nhượng(số)') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Giá chuyển nhượng(chữ)') }}:</label>
            <x-input name="transfer_price_text" :value="$contract->transfer_price_text"
                placeholder="{{ __('Giá chuyển nhượng(chữ)') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Ngày thanh toán đợt 1') }}:</label>
            {{-- <x-input type="date" name="transfer_payment1_date" :value="$contract->transfer_payment1_date"
                placeholder="{{ __('Ngày thanh toán đợt 1') }}" /> --}}
                <input type="text" class="datepicker form-control" name="transfer_payment1_date" value="{{ date('d/m/Y', strtotime($contract->transfer_payment1_date)) }}" placeholder="dd/mm/yyyy">
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Giá thanh toán đợt 1(số)') }}:</label>
            <x-input type="number" name="transfer_payment1_price_number" :value="$contract->transfer_payment1_price_number"
                placeholder="{{ __('Giá thanh toán đợt 1(số)') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Giá thanh toán đợt 1(chữ)') }}:</label>
            <x-input name="transfer_payment1_price_text" :value="$contract->transfer_payment1_price_text"
                placeholder="{{ __('Giá thanh toán đợt 1(chữ)') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
             <label class="control-label">{{ __('Để mua căn hộ') }}:</label>
             <x-input name="transfer_buy_apartment" :value="$contract->transfer_buy_apartment"
                 placeholder="{{ __('Để mua căn hộ') }}" />
         </div>
    </div> 
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Ngày thanh toán đợt 2') }}:</label>
            {{-- <x-input type="date" name="transfer_payment2_date" :value="$contract->transfer_payment2_date"
                placeholder="{{ __('Ngày thanh toán đợt 2') }}" /> --}}
            <input type="text" class="datepicker form-control" name="transfer_payment2_date" value="{{ date('d/m/Y', strtotime($contract->transfer_payment2_date)) }}" placeholder="dd/mm/yyyy">
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Giá thanh toán đợt 2(số)') }}:</label>
            <x-input type="number" name="transfer_payment2_price_number" :value="$contract->transfer_payment2_price_number"
                placeholder="{{ __('Giá thanh toán đợt 2(số)') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Giá thanh toán đợt 2(chữ)') }}:</label>
            <x-input name="transfer_payment2_price_text" :value="$contract->transfer_payment2_price_text"
                placeholder="{{ __('Giá thanh toán đợt 2(chữ)') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Giá thanh toán đợt 3(số)') }}:</label>
            <x-input type="number" name="transfer_payment3_price_number" :value="$contract->transfer_payment3_price_number"
                placeholder="{{ __('Giá thanh toán đợt 3(số)') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Giá thanh toán đợt 3(chữ)') }}:</label>
            <x-input name="transfer_payment3_price_text" :value="$contract->transfer_payment3_price_text"
                placeholder="{{ __('Giá thanh toán đợt 3(chữ)') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Tiền cọc(số)') }}:</label>
            <x-input name="transfer_earnest_price_number" :value="$contract->transfer_earnest_price_number"
                placeholder="{{ __('Tiền cọc(số)') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Tiền cọc(chữ)') }}:</label>
            <x-input name="transfer_earnest_price_text" :value="$contract->transfer_earnest_price_text"
                placeholder="{{ __('Tiền cọc(chữ)') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Tiền phạt(số)') }}:</label>
            <x-input type="number" name="transfer_fine_price_number" :value="$contract->transfer_fine_price_number"
                placeholder="{{ __('Tiền phạt(số)') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Tiền phạt(chữ)') }}:</label>
            <x-input name="transfer_fine_price_text" :value="$contract->transfer_fine_price_text"
                placeholder="{{ __('Tiền phạt(chữ)') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Tổng tiền phạt(số)') }}:</label>
            <x-input type="number" name="transfer_fine_all_price_number" :value="$contract->transfer_fine_all_price_number"
                placeholder="{{ __('Tổng tiền phạt(số)') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Tổng tiền phạt(chữ)') }}:</label>
            <x-input name="transfer_fine_all_price_text" :value="$contract->transfer_fine_all_price_text"
                placeholder="{{ __('Giá chuyển nhượng(chữ)') }}" />
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label">{{ __('Thỏa thuận riêng') }}:</label>
            <x-input name="transfer_condition" :value="$contract->transfer_condition"
                placeholder="{{ __('Thỏa thuận riêng') }}" />
        </div>
    </div>
</div>
