<html>

@include('admin.contract.pdf.header')
<h4 class="text-center fs-15 mt" style="margin-bottom: 0;">
    HỢP ĐỒNG ĐẶT CỌC CHUYỂN NHƯỢNG
</h4>
<p class="bold fs-9 text-center">ĐỊA CHỈ: {{ $data->transfer_land_title }},
    {{ $data->transfer_land_address }}</p>
<p>Hôm nay ngày
    {{ date('d', strtotime($data->transfer_date_create)) }} tháng
    {{ date('m', strtotime($data->transfer_date_create)) }} năm
    {{ date('Y', strtotime($data->transfer_date_create)) }} Chúng tôi gồm:</p>

<p class="mt under"><span class="bold">BÊN CHUYỂN NHƯỢNG (GỌI TẮT LÀ BÊN A):</span></p>
<div>
    <ul>
        <li>Ông/bà: <span class="bold">{{ $data->transfer_owner_fullname }}</span></li>
        <li>CMND số: {{ $data->transfer_owner_id_number }} - Cấp ngày:
            {{ date('d/m/Y', strtotime($data->transfer_owner_id_date)) }} - Tại:
            {{ $data->transfer_owner_id_location }}</li>
        <li>Địa chỉ : {{ $data->transfer_owner_address }}</li>
        <li>Số TK ngân hàng số: {{ $data->transfer_owner_bank }}</li>
    </ul>
</div>
<p>Hiện là chủ tài sản: <span class="bold">{{ $data->transfer_land_title }} 
    {{ $data->transfer_land_address }}</span></p>
<p class="mt under"><span class="bold">BÊN NHẬN CHUYỂN NHƯỢNG (GỌI TẮT LÀ BÊN B):</span></p>
<div>
    <ul>
        <li>Ông/bà: <span class="bold">{{ $data->transfer_customer_fullname }}</span></li>
        <li>CMND số: {{ $data->transfer_customer_id_number }} - Cấp ngày:
            {{ date('d/m/Y', strtotime($data->transfer_customer_id_date)) }} - Tại:
            {{ $data->transfer_customer_id_location }}</li>
        <li>Địa chỉ: {{ $data->transfer_customer_address }}</li>
    </ul>
</div>
<p class="mt under"><span class="bold">BÊN LÀM CHỨNG (BÊN C ):</span></p>
<div>
    <ul>
        <li><span class="bold">CÔNG TY TNHH TM- DV – TƯ VẤN BĐS NHÀ AN VIỆT (VIETHOUSE)</span></li>
        <li>ADD/Địa chỉ: 1016/19 (SC19-2) Sky Garden 2, Nguyễn Văn Linh, Tân Phong Ward, Dis 7, HCM</li>
        <li>Mã sô thuế: 0313319570</li>
        <li>Người đại diện: <span class="bold">{{$data->transfer_performer_represent}}</span></li>
        <li>Chức vụ/position: {{$data->transfer_performer_position}}</li>
        <li>Telephone: 0908.916.985 - 0917.541.232</li>
        <li>Email: viethouse0111@gmail.com</li>
        <li>Người thực hiện: {{ $data->transfer_performer_fullname }}</li>
    </ul>
</div>
<p class="mt">Sau khi tìm hiểu và được giới thiệu rõ ràng, Bên B đồng ý nhận chuyển nhượng lại và Bên A đồng ý
    chuyển nhượng tài sản
    dưới đây theo thỏa thuận sau:</p><br>
<ul>
    <li>Tài sản được chuyển nhượng: <span class="bold">{{ $data->transfer_land_title }} 
            {{ $data->transfer_land_address }} </span> , Có Diện tích
        sàn: <span class="bold">{{ $data->transfer_land_area }}m2</span></li>
    <li>Căn cứ vào giấy chứng nhận chủ quyền số: <span
            class="bold">{{ $data->transfer_land_certification_number }}</span>, số vào sổ:
        <span class="bold">{{ $data->transfer_land_certification_input_number }}</span>, thửa đất số: <span
            class="bold">{{ $data->transfer_land_number }}</span>, Tờ
        bản đồ số: <span class="bold">{{ $data->transfer_land_map_number }}</span>, Ký ngày:
        <span class="bold">{{ date('d/m/Y', strtotime($data->transfer_land_certification_date)) }}</span> do ủy ban
        nhân dân quận 7 cấp
    </li>
</ul><br><br><br>
<p class="mt"><span class="bold under">ĐIỀU 1: </span><span class="bold">GIÁ BÁN</span></p>
<div>
    <ul>
        <li>Tổng giá trị chuyển nhượng tài sản là: <span
                class="bold">{{ number_format($data->transfer_price_number) }}
                VND (Bằng chữ:{{ $data->transfer_price_text }})</span> để mua căn hộ: <span class="bold">{{ $data->transfer_land_title }}</span>
            <p><span class="bold"><i>Giá chuyển nhượng này KHÔNG bao gồm: phí chuyển nhượng tại phòng công chứng, thuế thu
                nhập cá nhân theo qui định của chi cục thuế quận 7, phí môi giới. Chi phí này được Bên B thanh toán thay cho Bên A.</i></span></p>
            <p><span class="bold"><i>Bên B chịu phí trước bạ theo qui định của nhà nước.</i></span></p>    
        </li>
        <p>- Giá này là cố định và không thay đổi trong trường hợp giá thị trường thay đổi lên hay xuống .</p>
        <p>- Nhà hoàn thiện kèm đủ nội thất theo hiện trạng Bên B đã xem.</p>
        <p>- Giá bán trên hợp đồng mua bán công chứng theo giá qui định của nhà nước.</p>
    </ul>
</div>
<br>
<p class="mt"><span class="bold under">ĐIỀU 2: </span><span class="bold">LỊCH THANH TOÁN</span></p><br>
<div>
    <ul>
        <li><span class="bold">Đợt 1 : </span>Ngày {{ date('d', strtotime($data->transfer_payment1_date)) }} tháng
            {{ date('m', strtotime($data->transfer_payment1_date)) }} năm
            {{ date('Y', strtotime($data->transfer_payment1_date)) }}. Bên B đặt cọc cho Bên A số tiền là : <span
                class="bold">{{ number_format($data->transfer_payment1_price_number) }} VND (Bằng chữ:
                {{ $data->transfer_payment1_price_text }})</span> để mua căn hộ: <span class="bold">{{ $data->transfer_buy_apartment }}</span></li>
        <li><span class="bold">Đợt 2 : </span> Ngày {{ date('d', strtotime($data->transfer_payment2_date)) }} tháng
            {{ date('m', strtotime($data->transfer_payment2_date)) }} năm
            {{ date('Y', strtotime($data->transfer_payment2_date)) }}, Bên A và Bên B cùng ký công chứng làm hợp
            đồng mua bán tại phòng công chứng. Tại thời điểm này, Bên A bàn giao tất cả các giấy tờ bản gốc có liên
            quan đến tài sản gồm: giấy chứng nhận chủ quyền, bản vẽ, thông báo nộp thuế trước bạ cho Bên B. Và Bên B
            thanh toán cho Bên A số tiền là: <span
                class="bold">{{ number_format($data->transfer_payment2_price_number) }}VND
                (Bằng Chữ: {{ $data->transfer_payment2_price_text }})</span></li>
    </ul>
</div><br>
<p class="mt"><span class="bold under">ĐIỀU 3: </span><span class="bold">TRÁCH NHIỆM VÀ QUYỀN HẠN CỦA BÊN A</span></p><br>
<div>
    <ul>
        <li>Bảo đảm tài sản trên thuộc sở hữu hợp pháp của bên A và không có bất kỳ tranh chấp khiếu kiện nào.</li>
        <li>Nhận đủ số tiền thanh toán theo điều II.</li>
        <li>Hoàn thành thủ tục sang tên cho bên B tại cơ quan nhà nước có thẩm quyền theo điều II.</li>
        <li>Sau khi bên A nhận <span class="bold">{{ number_format($data->transfer_earnest_price_number) }}VND, ( Bằng
                chữ: {{ $data->transfer_earnest_price_text }} )</span> tiền đặt cọc của bên B mà bên A đổi ý, từ
            chối không bán hoặc không hợp tác để làm thủ tục chuyển nhượng căn nhà trên thì bên A phải
            trả lại tiền đặt cọc <span
                class="bold">{{ number_format($data->transfer_earnest_price_number) }}VND ( Bằng
                chữ : {{ $data->transfer_earnest_price_text }} )</span> cho bên B và chịu phạt thêm số
            tiền: <span class="bold">{{ number_format($data->transfer_fine_price_number) }}VND ( Bằng chữ:
                {{ $data->transfer_fine_price_text }} )</span> . Tổng cộng là:
            <span class="bold">{{ number_format($data->transfer_fine_all_price_number) }}VND ( Bằng
                chữ: ({{ $data->transfer_fine_all_price_text }}) )</span>
        </li>
        <li>Bên A phải đảm bảo trong thời gian chưa hoàn tất mọi thủ tục sang tên tài sản nói trên cho bên B
            thì bên A không được thế chấp, bán, hoặc hứa chuyển nhượng tài sản trên cho bất cứ một người
            nào khác ngoài bên B.</li>
        <li>Bàn giao toàn bộ giấy tờ bản chính tài sản trên cho bên B ngay sau khi bên A nhận đủ số tiền đợt
            2 để bên B đi đăng bộ</li>
        <li>Bên A sẽ bàn giao tài sản cho bên B ngay sau khi 2 bên ký công chứng thanh toán đợt 2.</li>
    </ul>
</div>
<p class="mt"><span class="bold under">ĐIỀU 4: </span><span class="bold">TRÁCH NHIỆM VÀ QUYỀN HẠN CỦA BÊN B</span></p>
<div>
    <ul>
        <li>Thanh toán đúng số tiền theo điều II.</li>
        <li>Đóng thuế trước bạ.</li>
        <li>Đóng thay Thuế TNCN, phí công chứng, phí môi giới thay cho Bên A.</li>
        <li>Sau khi bên B đặt cọc cho bên A, nếu bên B đổi ý, từ chối không mua hoặc không hợp tác để làm
            thủ tục chuyển nhượng tài sản trên thì bên B sẽ mất số tiền đã đặt cọc cho bên A là: <span
                class="bold">{{ number_format($data->transfer_earnest_price_number) }}VND (Bằng chữ:
                {{ $data->transfer_earnest_price_text }})</span></li>
        <li>Bên B được quyền chỉ định người khác đứng tên thay trên hợp đồng mua bán
            giữa hai bên.</li>
    </ul>
</div><br>

<p class="mt"><span class="bold under">ĐIỀU 5: </span><span class="bold">NGHĨA VỤ CỦA BÊN C</span></p><br>
<div>
    <ul>
        <li>Soạn thảo hợp đồng</li>
        <li>Làm trung gian môi giới, tư vấn và thương lượng giữa bên A và bên B đi đến thỏa thuận giá mua bán.</li>
        <li>Hướng dẫn hai bên làm thủ tục chuyển nhượng theo quy định của pháp luật.</li>
        <li>Công ty Nhà An Việt với vai trò làm chứng sẽ hổ trợ tối đa giúp đỡ khách hàng trong phạm vi các thông tin có được.</li>
        <li>Nhận đủ số tiền môi giới từ bên A</li>
        <li>Công ty Nhà An Việt chịu trách nhiệm về tính chính xác các thông tin cung cấp cho khách hàng mua và bán.
            Công ty Nhà An Việt hoàn toàn không chịu trách nhiệm về các việc làm không đúng pháp luật của các bên dẫn
            đến việc gây thiệt hại cho đối tác trong giao dịch.</li>
        <li>Hổ trợ đăng bộ, kê khai và nộp thuế liên quan đến chuyển nhượng tài sản cho hai bên.</li>
    </ul>
</div><br>
<p class="mt under"><span class="bold under">ĐIỀU 6: </span><span class="bold">CÁC ĐIỀU KHOẢN CHUNG</span></p><br>

<div>
    <ul>
        <li>Hai bên cam kết thực hiện theo nội dung của hợp đồng này, và bên bán tiến hành thực hiện các thủ tục đặt cọc
            mua bán với bên mua, bên bán không giao dịch hoặc ký mua bán với người thứ ba.</li>
        <li>Trường hợp bên nào cố tình vi phạm thì phải chịu trách nhiệm trước pháp luật và phải gửi thông báo cho bên
            kia theo quy định.</li>
        <li>Các vướng mắc, tranh chấp, khiếu nại  liên quan đến hợp đồng đặt cọc này  sẽ được các bên giải quyết trước 
            hết bằng thương lượng trên tinh thần hữu nghị và thiện chí . Sau mọi hòa giải nếu một bên nhận thấy tranh chấp không thể giải quyết 
            thông qua hòa giải, thì bên này phải gửi một thông báo tranh chấp cho bên kia, nếu sau 7 ngày kể từ ngày gửi thông báo mà tranh chấp 
            vẫn không thê giải quyết bằng hòa giải thì một trong hai bên có quyền đề nghị Tòa Án có thẩm quyền tại TPHCM giải quyết.</li>
        <li>Thuế và lệ phí liên quan đến việc chuyển nhượng căn nhà trên thì thuế bên nào bên đó đóng cho cơ quan nhà
            nước.</li>
        <li>Thỏa Thuận riêng:{{$data->transfer_condition}}</li>
    </ul>
    <p><i>Hợp đồng này lập thành 3 bản chính. Mỗi bên giữ 01 bản và có giá trị pháp lý như nhau, có hiệu lực kể từ ngày ký.</i></p>
</div>

<table class="mt break-page-auto" style="margin-bottom: 200px">
    <tbody>
        <tr>
            <td style="width: 50%;" class="text-center"><span class="bold">Bên A</span></td>
            <td style="width: 50%;" class="text-center"><span class="bold">Bên C</span></td>
            <td style="width: 50%;" class="text-center"><span class="bold">Bên B</span></td>
        </tr>

    </tbody>
</table>
<div class="break-page">
    <p class="text-center"><span class="bold">BIÊN NHẬN THANH TOÁN</span></p>
    <p class="text-center"><span class="bold">Địa chỉ: ...........................</span></p>
    <table class="tb-bordered mt">
        <tbody>
            <tr>
                <td>STT</td>
                <td>NGÀY</td>
                <td>ĐỢT THANH TOÁN</td>
                <td>SỐ TIỀN</td>
                <td>BÊN B</td>
                <td>BÊN A</td>
                <td>GHI CHÚ</td>
            </tr>
            <tr>
                <td style="height: 150px">1</td>
                <td>.....................</td>
                <td>ĐỢT 1</td>
                <td><span class="bold">.................. VND </span></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="height: 150px">2</td>
                <td>.......................</td>
                <td>ĐỢT 2</td>
                <td><span class="bold">.................. VND</span></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

@include('admin.contract.pdf.footer')
