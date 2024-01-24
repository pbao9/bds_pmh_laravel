<html>

@include('admin.contract.pdf.header')
<h4 class="text-center fs-15 mt">
    HỢP ĐỒNG THUÊ CĂN HỘ
</h4>
<p class="bold fs-9 text-center">MÃ SỐ CĂN HỘ: {{ $data->rental_land_code }}</p>
<span>Hợp đồng này được thành lập ngày
    {{ date('d', strtotime($data->rental_date_create)) }} tháng
    {{ date('m', strtotime($data->rental_date_create)) }} năm
    {{ date('Y', strtotime($data->rental_date_create)) }} tại thành phố Hồ Chí Minh giữa:</span>

<p class="under"><span class="bold">BÊN CHO THUÊ CĂN HỘ (Bên A):</span></p>
<div>
    <ul>
        <li>Họ và tên: <span class="bold">{{ $data->rental_owner_fullname }}</span></li>
        <li>CMND/ CCCD: {{ $data->rental_owner_id_number }}</li>
        <li>Cấp ngày: {{ date('d/m/Y', strtotime($data->rental_owner_id_date)) }} - Tại: CA. TP.
            {{ $data->rental_owner_id_location }}</li>
        <li>Hiện cư trú tại: {{ $data->rental_owner_location }}</li>
    </ul>
</div>
<div class="my">
    <!--  Tên bất động sản cần thì add thêm vào{{ $data->rental_land_title }}  -->
    <p>Hiện là chủ sở hữu căn hộ số: <span class="bold">{{ $data->rental_land_address }}</span></p>
</div>
<p class="under"><span class="bold">BÊN THUÊ CĂN HỘ (Bên B):</span></p>
<div>
    <ul>
        <li>Họ và tên: <span class="bold">{{ $data->rental_customer_fullname }}</span></li>
        <li>CMND/ CCCD: {{ $data->rental_customer_id_number }}</li>
        <li>Cấp ngày: {{ date('d/m/Y', strtotime($data->rental_customer_id_date)) }} - Tại: CA. TP.
            {{ $data->rental_customer_id_location }}</li>
        <li>Hiện cư trú tại: {{ $data->rental_customer_location }}</li>
    </ul>
</div>
<p class="mt under"><span class="bold">BÊN LÀM CHỨNG (Bên C):</span></p>
<div>
    <ul>
        <li><span class="bold">CÔNG TY TNHH TM- DV – TƯ VẤN BĐS NHÀ AN VIỆT (VIETHOUSE)</span></li>
        <li>ADD/ Địa chỉ : 1016/19 (SC19-2) Sky Garden 2, Nguyễn Văn Linh, Tân Phong, Quận 7 HCM</li>
        <li>Mã sô thuế : 0313319570</li>
        <li>Người đại diện: <span class="bold">{{ $data->rental_performer_represent }}</span></li>
        <li>Chức vụ/position: {{ $data->rental_performer_position }}</li>
        <li>Telephone: 0908.916.985</li>
        <li>Email: viethouse0111@gmail.com</li>
        <li>Người thực hiện: {{ $data->rental_performer_fullname }}</li>
    </ul>
</div>
<div class="my">
    <p>Bên A và Bên B đồng ý ký kết Hợp đồng thuê Căn hộ theo các điều kiện và điều khoản sau :</p>
</div>
<p class="under"><span class="bold">ĐIỀU 1: CĂN HỘ CHO THUÊ :</span></p>
<p><span class="bold">1.</span> Bên A đồng ý cho Bên B thuê căn hộ số: <span class="bold">
        {{ $data->rental_land_address }} </span> với đầy đủ các trang thiết bị, máy móc, đồ gỗ gia dụng…
    theo liệt kê trong bảng nội thất đính kèm.</p>
<p><span class="bold">2.</span> Mục đích thuê: {{ $data->rental_purpose }}</p><br>
<p class="mt under"><span class="bold ">ĐIỀU 2: THỜI HẠN THUÊ :</span></p>
<p>Thời hạn thuê căn hộ là {{ $data->rental_time }} tháng, bắt đầu từ
    {{ date('d/m/Y', strtotime($data->rental_time_start)) }} đến hết ngày
    {{ date('d/m/Y', strtotime('+' . $data->rental_time . ' months' . $data->rental_time_start)) }} Thời hạn này có
    thể được gia hạn tùy theo sự thỏa thuận của hai bên trước ngày kết thúc 30 ngày.</p><br>
<p class="mt under"><span class="bold ">ĐIỀU 3: GIÁ THUÊ VÀ PHƯƠNG THỨC THANH TOÁN :</span></p>
<p><span class="bold">1. </span><span class="bold under">Giá thuê/ <i>Rental</i>:</span></p>
<ul>
    <li>
        <p>Giá thuê là: {{ $data->rental_price_vnd }} (Bằng chữ: {{ $data->rental_price_text }} )</p>
    </li>
    <li>
        <p>Giá thuê trên không bao gồm các khoản thuế liên quan đến việc cho thuê nhà.</p>
    </li>
    <li>
        <p>Giá thuê không bao gồm các chi phí như điện, nước, phí quản lý, internet và các chi phí sinh hoạt…..
            các chi phí này Bên B phải thanh toán cho cơ quan hữu quan</p>
    </li>
    <li>
        <p>Giá thuê cố đinh trong suốt thời hạn thuê</p><br>
    </li>
</ul>
<p><span class="bold">2. </span><span class="bold under">Phương thức đặt cọc & thanh toán :</span></p>
<ul>
    <li>
        <p>Bên B đặt cọc cho Bên A số tiền tương đương {{ $data->rental_month_earnest }} tháng tiền thuê nhà là để đảm
            bảo
            việc thực hiện xuyên suốt hợp đồng.</p>
    </li>
    <li>
        <p>Tiền đặt cọc không tính lãi và sẽ được Bên A giữ lại suốt thời hạn hợp đồng.</p>
    </li>
    <li>
        <p>Khoản tiền cọc này sẽ được trả lại cho Bên B cùng một loại tiền tệ sau khi hợp đồng hết hạn và đã
            bàn giao lại Căn hộ cho Bên A sau khi trừ các chi phí tiện ích mà Bên B chưa thanh toán, các khoản phạt vi
            phạm hợp
            đồng, các khoản hư hỏng trang thiết bị (ngoại trừ hao mòn thông thường), các khoản bồi thường tổn thất (nếu
            có).</p>
    </li>
    <li>
        <p>Bên B sẽ trả tiền thuê nhà: {{ $data->rental_month_pay }} tháng một lần trong vòng 05 (năm) ngày của đợt
            thanh
            toán (từ ngày {{ $data->rental_pay_start }} đến ngày {{ $data->rental_pay_end }}) .
            Bên B thanh toán trực tiếp bằng tiền mặt hoặc chuyển khoản.</p>
    </li>
</ul>
<p class="mt under"><span class="bold ">ĐIỀU 4: QUYỀN VÀ NGHĨA VỤ CỦA HAI BÊN:</span></p>
<p><span class="bold">4.1 </span><span class="bold under">Bên A có các quyền và nghĩa vụ sau:</span></p><br>
<ul>
    <li>
        <p>Đảm bảo thời gian cho thuê là {{ $data->rental_time }} tháng. Trong trường hợp Bên A bán căn hộ cho Bên thứ
            ba thì
            phải bảo đảm cho Bên B được tiếp tục sử dụng cho đến khi Hợp đồng này chấm dứt. Nếu
            Bên A muốn chấm dứt hợp đồng trước thời hạn thì Bên A phải hoàn trả toàn bộ tiền đặt cọc
            cho Bên B và bên A sẽ bị phạt thêm số tiền tương đương với số tiền đã nhận cọc. Tuy nhiên
            Bên A phải báo trước 30 ngày cho Bên B trước ngày muốn kết thúc trước hạn</p>
    </li>
    <li>
        <p>Sửa chữa kịp thời những hư hỏng về cấu trúc xây dựng chính của căn nhà và tòa nhà như: mái nhà, nền nhà, hệ
            thống
            thoát nước và thiết bị điện lạnh... mà không phải lỗi do bên thuê gây ra.</p>
    </li>
    <li>
        <p>Giao căn hộ, trang thiết bị và tiện nghi cho Bên B đúng ngày đã định trong hợp đồng.</p>
    </li>
    <li>
        <p>Có trách nhiệm đăng ký tạm trú lần đầu cho Bên B với các cơ quan hữu quan.</p>
    </li>
    <li>
        <p>Báo cho Bên B trước 24 giờ bằng điện thoại trong trường hợp Bên A muốn vào kiểm tra căn hộ (ngoại
            trừ
            trong trường hợp khẩn cấp).</p>
    </li>
</ul><br>
<p><span class="bold">4.2 </span><span class="bold under">Bên B có các quyền và nghĩa vụ sau:</span></p><br>
<ul>
    <li>
        <p>Đảm bảo thời gian thuê là {{ $data->rental_time }} tháng. Nếu Bên B chấm dứt Hợp đồng trước thời hạn
            {{ $data->rental_time }} tháng sẽ bị mất toàn bộ tiền đặt
            cọc. Thông báo cho Bên A trước 01 tháng kể từ ngày hết hạn hợp đồng nếu bên B không thể tiếp tục gia hạn hợp
            đồng.
        </p>
    </li>
    <li>
        <p>Trả tiền thuê đúng thời hạn. Nếu trả tiền thuê chậm quá 10 ngày (làm việc) kể từ ngày đến hạn phải thanh
            toán, Bên A có quyền chấm dứt hợp đồng, thu toàn bộ tiền đặt cọc và Bên B không được bồi thường bất cứ một
            khoản chi
            phí nào.</p>
    </li>
    <li>
        <p>Thanh toán đúng hạn các chi phí điện, nước, điện thoại, internet, tivi cable, phí quản lý ..v..v.. theo hoá
            đơn
            của cơ quan hữu quan.</p>
    </li>
    <li>
        <p>Không được chuyển nhượng hợp đồng, hoặc cho thuê lại nếu không có sự đồng ý của bên A. Nếu vi phạm, Bên A
            có quyền chấm dứt hợp đồng và Bên B không được bồi thường bất cứ một khoản chi phí nào.</p>
    </li>
    <li>
        <p>Thông báo kịp thời cho Bên A nếu Bên B có khách đến ở tạm thời tại căn hộ đang thuê để Bên A đăng ký tạm trú
            với
            chính quyền địa phương. Khi sổ tạm trú hết hạn, Bên B phải chủ động gia hạn tạm trú. Bên A sẽ không chịu
            trách nhiệm
            với các cơ quan hữu quan nếu Bên B bị các cơ quan hữu quan kiểm tra và bị phạt vì: không đăng ký tạm trú;
            hết hạn
            tạm trú hoặc có người không đăng ký tạm trú.</p>
    </li>
    <li>
        <p>Khi cần sửa chữa cải tạo Căn hộ phải được sự đồng ý trước bằng văn bản của Bên A và sự chấp thuận của Công ty
            LD
            Phú Mỹ Hưng.</p>
    </li>
    <li>
        <p>Chịu trách nhiệm sửa chữa và đền bù cho Bên A hư hỏng, mất mát các tài sản, trang thiết bị được trang bị
            trong Căn
            hộ. Chịu trách nhiệm đối với các tổn thất, thiệt hại gây ra cho Bên A trong quá trình sử dụng Căn hộ (ngoại
            trừ
            trường hợp hư hỏng từ kết cấu bão, lũ, thiên tai...).</p>
    </li>
    <li>
        <p>Thực hiện về các quy định về phòng cháy, chữa cháy.</p>
    </li>
    <li>
        <p>Gìn giữ Căn hộ luôn sạch, đẹp, sửa chửa kịp các trang thiết bị, máy móc bị hư hỏng trong quá trình sử dụng
            Căn hộ
            do lỗi của Bên B.</p>
    </li>
    <li>
        <p>Bàn giao nhà và trang thiết bị nội thất trong tình trạng hoạt động bình thường và nguyên vẹn như lúc nhận
            (ngoại
            trừ những hao mòn tự nhiên) cho Bên A khi hết hạn hợp đồng. Nếu có hư hỏng nào Bên A sẽ trừ vào tiền đặt
            cọc.</p>
    </li>
</ul><br>
<p class="mt under"><span class="bold ">ĐIỀU 5: CAM KẾT CHUNG</span></p>
<p><span class="bold">5.1 </span><span>Thực hiện đúng các điều khoản đã thoả thuận trong hợp đồng này</span></p>
<p><span class="bold">5.2 </span><span>Trường hợp có tranh chấp hoặc có một bên vi phạm hợp đồng thì cùng nhau bàn bạc
        thống nhất trên tinh thần hòa giải. Nếu không giải quyết được thì yêu cầu tòa án có thẩm quyền xét xử theo quy
        định của luật pháp Việt Nam.</span></p><br>
<p class="mt under"><span class="bold ">ĐIỀU 6 : CHẤM DỨT HỢP ĐỒNG</span></p>
<p><span class="bold">6.1 </span><span>Hợp đồng chấm dứt trong các trường hợp sau:</span></p>
<ul>
    <li>
        <p>Hết hạn hợp đồng.</p>
    </li>
    <li>
        <p>Căn hộ cho thuê bị ảnh hưởng thiên tai (bão, lũ, động đất…) hoặc phá dỡ theo quyết định của cơ quan có thẩm
            quyền.
        </p>
    </li>
</ul><br>
<p><span class="bold">6.2 </span><span>Bên A có quyền đơn phương chấm dứt Hợp đồng trước thời hạn, thu hồi Căn hộ và
        yêu cầu Bên B bồi thường thiệt hại trong trường hợp Bên B có một trong những hành vi sau:</span></p>
<ul>
    <li>
        <p>Trễ hạn thanh toán quá 10 ngày.</p>
    </li>
    <li>
        <p>Sử dụng Căn hộ không đúng mục đích thuê;</p>
    </li>
    <li>
        <p>Sửa chữa thay đổi thiết kế Căn hộ khi chưa được sự Bên A chấp thuận trước bằng văn bản.</p>
    </li>
    <li>
        <p>Chuyển nhượng Hợp đồng, hoặc cho thuê lại Căn hộ mà không có sự đồng ý trước bằng văn bản của Bên A.</p>
    </li>
    <li>
        <p>Vi phạm luật pháp Việt Nam.</p>
    </li>
    <li>
        <p>Trong trường hợp này bên B bị mất toàn bộ số tiền cọc</p>
    </li>
    <li>
        <p>Điều kiện thỏa thuận riêng: <br>{{ $data->rental_condition }}</p>
    </li>
</ul><br>

<p class="mt">Hợp đồng thuê Căn hộ này có hiệu lực kể từ ngày hai bên ký kết, được lập thành 03 (ba) bản có giá trị
    như nhau.
    Mỗi bên giữ 01 bản và có hiệu lực kể từ ngày ký</p>
<table class="mt break-page-auto" style="margin-bottom: 80px">
    <tbody>
        <tr>
            <td style="width: 50%;" class="text-center"><span class="bold">Bên A</span></td>
            <td style="width: 50%;" class="text-center"><span class="bold">Bên B</span></td>
        </tr>

    </tbody>
</table>
<table>
    <tbody>
        <tr>
            <td style="width: 100%;" class="text-center"><span class="bold">Bên C</span></td>
        </tr>
    </tbody>
</table>
<div class="break-page">
    <p class="text-center"><span class="bold">BIÊN NHẬN THANH TOÁN</span></p>
    <p class="text-center">ĐỊA CHỈ CĂN HỘ</p>
    <p class="text-center bold">.........................................</p>
    <table class="table-3col tb-bordered mt">
        <tbody>
            <tr>
                <td>Ngày</td>
                <td>Ngày ............</td>
                <td>Ngày ............</td>
            </tr>
            <tr>
                <td>Số tiền thanh toán</td>
                <td>............ VND</td>
                <td>............ VND</td>
            </tr>
            <tr>
                <td>Về khoản</td>
                <td>Thanh toán.......tháng tiền cọc </td>
                <td>Thanh toán.......tháng tiền nhà
                    đợt đầu tiên
                </td>
            </tr>
            <tr>
                <td>Bên thuê xác nhận đã giao tiền</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Bên cho thuê xác nhận đã nhận tiền</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Bên Làm Chứng xác nhận chứng kiến</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Ghi chú</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
@include('admin.contract.pdf.footer')
