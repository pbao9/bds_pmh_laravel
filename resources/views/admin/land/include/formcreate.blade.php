<x-form class="form-horizontal" :action="route('admin.land.store')" type="post" :validate="true">
    <div class="row">
        <!-- title -->
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label class="control-label">{{ __('Tiêu đề') }}:</label>
                <x-input name="title" :value="old('title')" :required="true" placeholder="{{ __('Tiêu đề') }}"/>
            </div>
        </div>
        <!-- category -->
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label class="control-label">{{ __('Danh mục') }}:</label>
                <x-select name="category[]" class="select2bs4" multiple="multiple" :required="true">
                </x-select>
            </div>
        </div>
        <!-- code -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Mã BĐS') }}:</label>
                <x-input name="code" :value="old('code')" :required="true" placeholder="{{ __('Mã BĐS') }}"/>
            </div>
        </div>
        <!-- purpose -->
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Mục đích') }}:</label>
                <x-select name="purpose" :required="true">
                    <x-option value="" selected disabled :title="__('Chọn mục đích')" />
                    @foreach($purpose as $key => $value)
                        <x-option :value="$key" :title="$value" />
                    @endforeach
                </x-select>
            </div>
        </div>
        <!-- house owner -->
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Chọn chủ nhà') }}:</label>
                <x-select name="house_owner_id" class="select2bs4" :required="true">
                </x-select>
            </div>
        </div>
        <!-- type -->
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Loại') }}:</label>
                <x-select name="type" :required="true">
                    <x-option value="" selected disabled :title="__('Chọn Loại')" />
                    @foreach($type as $value)
                        <x-option :value="$value" :title="$value" />
                    @endforeach
                </x-select>
            </div>
        </div>
        <!-- level -->
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Cấp độ') }}:</label>
                <x-input type="number" name="level" :value="old('level', 0)" placeholder="{{ __('Cấp độ') }}"/>
            </div>
        </div>
        <!-- status -->
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Trạng thái') }}:</label>
                <x-select name="status" :required="true">
                    @foreach($status as $value)
                        <x-option :value="$value" :title="$value" />
                    @endforeach
                </x-select>
            </div>
        </div>
        <!-- furniture -->
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Nội thất') }}:</label>
                <x-select name="furniture" :required="true">
                    @foreach($furniture as $value)
                        <x-option :value="$value" :title="$value" />
                    @endforeach
                </x-select>
            </div>
        </div>
        <!-- door direction -->
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Chọn hướng cửa') }}:</label>
                <x-select name="door_direction" :required="true">
                    <x-option value="" selected disabled :title="__('Chọn hướng cửa')" />
                    @foreach($door_direction as $value)
                        <x-option :value="$value" :title="$value" />
                    @endforeach
                </x-select>
            </div>
        </div>
        <!-- bedroom -->
        <div class="col-md-3 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Phòng ngủ') }}:</label>
                <x-input type="number" name="bedroom" :value="old('bedroom', 1)" placeholder="{{ __('Phòng ngủ') }}"/>
            </div>
        </div>
        <!-- toilet -->
        <div class="col-md-3 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Nhà vệ sinh') }}:</label>
                <x-input type="number" name="toilet" :value="old('toilet', 1)" placeholder="{{ __('Nhà vệ sinh') }}"/>
            </div>
        </div>
        <!-- floor -->
        <div class="col-md-3 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Tầng') }}:</label>
                <x-input type="number" name="floor" :value="old('floor', 1)" placeholder="{{ __('Tầng') }}"/>
            </div>
        </div>
        <!-- road_house -->
        <div class="col-md-3 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Đường trước nhà rộng') }}: <small>( m <sup>2</sup> )</small></label>
                <x-input name="road_house" :value="old('road_house')" placeholder="{{ __('Đường trước nhà rộng') }}" data-parsley-type="number" data-parsley-type-message="{{ __('Trường này phải là số.') }}"/>
            </div>
        </div>
        <!-- Area -->
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Diện tích') }}:</label>
                <x-input name="area" :value="old('area')" :placeholder="__('Diện tích')" :required="true" data-parsley-type="number" data-parsley-type-message="{{ __('Trường này phải là số.') }}"/>
            </div>
        </div>
        <!-- price -->
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Giá tiền') }}:</label>
                <x-input name="price" :value="old('price')" :placeholder="__('Giá tiền')" :required="true" data-parsley-type="number" data-parsley-type-message="{{ __('Trường này phải là số.') }}"/>
            </div>
        </div>
        <!-- currency -->
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Tiền tệ') }}:</label>
                <x-select name="currency" :required="true">
                    @foreach($currency as $value)
                        <x-option :value="$value" :title="$value" />
                    @endforeach
                </x-select>
            </div>
        </div>
         <!-- district -->
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Chọn quận/huyện') }}:</label>
                <x-select name="district_id" class="select2bs4" :required="true">
                </x-select>
            </div>
        </div>
        <!-- ward -->
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Chọn phường/xã') }}:</label>
                <x-select name="ward_id" class="select2bs4" :required="true">
                </x-select>
            </div>
        </div>
        <!-- address -->
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <label class="control-label">{{ __('Địa chỉ') }}:<small class="text-danger">( {{ __('Không bao gồm quận/huyện và phường/xã') }} )</small></label>
                <x-input name="address" :value="old('address')" placeholder="{{ __('Số nhà, đường') }}"/>
            </div>
        </div>
        <!-- note -->
        <div class="col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Ghi chú') }}:</label>
                <x-textarea name="note" :placeholder="__('Ghi chú')">{{ old('note') }}</x-textarea>
            </div>
        </div>
        <!-- content -->
        <div class="col-12">
            <div class="form-group">
            <label for="">{{ __('Nội dung') }}</label>
                <x-textarea name="content" class="ckeditor">{{ old('content') }}</x-textarea>
            </div>
        </div>
        <!-- avatar -->
        <div class="col-12 col-md-4">
            <div class="form-group">
                <label class="control-label">{{ __('Ảnh đại diện') }}:</label>
                <x-input-image showImage="avatar" name="avatar" :value="old('avatar')" />
            </div>
        </div>
        <!-- gallery -->
        <div class="col-12">
            <div class="form-group">
                <label class="control-label">{{ __('Thư viện ảnh') }}:</label>
                <x-input-gallery name="image" />
            </div>
            
        </div>
    </div>
    
    <div class="form-group">
        <x-button.submit :title="__('Thêm')" />
    </div>
</x-form>