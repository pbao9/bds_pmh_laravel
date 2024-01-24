<html>

@include('admin.contract.pdf.header')

<h4 class="text-center fs-15 mt">
    HỢP ĐỒNG THUÊ CĂN HỘ
</h4>
<p class="text-center fs-15 noto-bold">아파트 임대 계약서</p>
<p class=" fs-9 text-center"><span class="bold">MÃ SỐ CĂN HỘ</span> /<span class="noto-bold">아파트 주소</span>:
    <span class="bold"> {{ $data->rental_land_code }}</span>
</p>
<p style="text-align: right; font-size: 13px;">Tp.HCM, Ngày {{ date('d', strtotime($data->rental_date_create)) }} tháng
    {{ date('m', strtotime($data->rental_date_create)) }} năm {{ date('Y', strtotime($data->rental_date_create)) }}</p>
<p style="text-align: right; font-size: 13px;"><span class="noto" style="text-align: right; font-size: 13px;">호치민시
        {{ date('d', strtotime($data->rental_date_create)) }} 년 {{ date('m', strtotime($data->rental_date_create)) }} 월
        {{ date('Y', strtotime($data->rental_date_create)) }} 일</span></p>
<p class="under"><span class="bold">BÊN CHO THUÊ CĂN HỘ (Bên A)</span>/LANDLORD<span class="noto-bold">(Bên A -
        주인)</span>:</p>
<div>
    <ul>
        <li>Họ và tên <span class="noto">/ 성 명:</span><span class="bold">{{ $data->rental_owner_fullname }}</span>
        </li>
        <li>CMND <span class="noto">/ 주민번호</span>: {{ $data->rental_owner_id_number }}</li>
        <li>Hiện cư trú tại <span class="noto">/ 주 소</span>: {{ $data->rental_owner_location }}</li>
    </ul>
</div>
<div class="my">
    <!--  Tên bất động sản cần thì add thêm vào{{ $data->rental_land_title }}  -->
    <p>Hiện là chủ sở hữu căn hộ số<span class="noto-bold">/ 아파트</span>: <span
            class="bold">{{ $data->rental_land_address }}</span></p>

</div>
<p class="under"><span class="bold">BÊN THUÊ CĂN HỘ (Bên B)</span><span class="noto-bold">/ 임대인</span></p>
<div>
    <ul>
        <li>Họ và tên <span class="noto">/ 성 명:</span><span
                class="bold">{{ $data->rental_customer_fullname }}</span></li>
        <li>Số Passport <span class="noto">/ 여권번호:</span> {{ $data->rental_customer_id_number }}</li>
        <li>Quốc tịch <span class="noto">/ 국적:</span> {{ $data->rental_customer_id_location }}</li>
    </ul>
</div>
<p class="mt under"><span class="bold">BÊN LÀM CHỨNG (Bên C)</span><span class="noto-bold">/부동산 중개인</span>:</p>
<div>
    <ul>
        <li><span class="bold">CÔNG TY TNHH TM- DV – TƯ VẤN BĐS NHÀ AN VIỆT (VIETHOUSE)</span></li>
        <li>Địa chỉ <span class="noto">/ 주 소</span>: 1016/19 (SC19-2) Sky Garden 2, Nguyễn Văn Linh, Tân Phong
            Ward, Dis 7, HCM</li>
        <li>Mã sô thuế/tax code : 0313319570</li>
        <li>Người đại diện <span class="noto">/ 대표자</span>: <span
                class="bold">{{ $data->rental_performer_represent }}</span></li>
        <li>Chức vụ/position: {{ $data->rental_performer_position }}</li>
        <li>Telephone <span class="noto">/전화</span>: 0908.916.985</li>
        <li>Người thực hiện/ performer: {{ $data->rental_performer_fullname }}</li>
    </ul>
</div>
<div class="my">
    <p class="bold">Bên A và Bên B đồng ý ký kết Hợp đồng thuê Căn hộ theo các điều kiện và điều khoản sau :</p>
    <p class="noto">임대인과 임차인은 아래 조항에 상호 동의한다.</p>
</div>

<div class=" break-page"></div>
<p class="under"><span class="bold">ĐIỀU 1: CĂN HỘ CHO THUÊ - </span><span class="noto-bold">임대부동산의 표시</span>:</p>
<p>Bên A đồng ý cho Bên B thuê căn hộ số: {{ $data->rental_land_address }}</p>
<p style="padding-left: 25px"><span class="noto">임대인은 다음 주소의 아파트 전체를 임차인에게 임대하기로 한다.</span>:
    {{ $data->rental_land_address }}</p>
<ul>
    <li>
        <p>Mục đích thuê: {{ $data->rental_purpose }}</p>
        <p style="padding-left: 25px"><span class="noto">임차목적: {{ $data->rental_purpose_lang }}</span></p>
    </li>
    <li>
        <p>Tổng diện tích: {{ $data->rental_land_area }} <span class="bold">m<sup
                    style="font-size: 10px;">2</sup></span></p>
        <p style="padding-left: 25px"><span class="noto">총면적</span>: {{ $data->rental_land_area }} <span
                class="bold">m<sup style="font-size: 10 px;">2</sup></span>
    </li>
    <li>
        <p>Vật dụng trong căn hộ: có phụ lục đính kèm</p>
        <p style="padding-left: 25px"><span class="noto">아파트 내 설비 및 가정용품: 부록에 첨부</span></p>
    </li>
</ul>

<p class="mt under"><span class="bold ">ĐIỀU 2: THỜI HẠN THUÊ </span><span class="noto-bold">임대 기간</span>:</p>
<p>Thời hạn thuê: {{ $data->rental_time }} tháng, bắt đầu từ
    {{ date('d/m/Y', strtotime($data->rental_time_start)) }} đến hết ngày
    {{ date('d/m/Y', strtotime('+' . $data->rental_time . ' months' . $data->rental_time_start)) }}</p>
<p style="padding-left: 25px"><span class="noto-bold">임대기간</span> {{ $data->rental_time }} :
    {{ date('Y', strtotime($data->rental_time_start)) }}<span class="noto-bold">년</span>
    {{ date('m', strtotime($data->rental_time_start)) }}<span class="noto-bold">월</span>
    {{ date('d', strtotime($data->rental_time_start)) }}<span class="noto-bold">일 부터 부터</span>
    {{ date('Y', strtotime('+' . $data->rental_time . ' months' . $data->rental_time_start)) }}<span
        class="noto-bold">년</span>
    {{ date('m', strtotime('+' . $data->rental_time . ' months' . $data->rental_time_start)) }}<span
        class="noto-bold">월</span>
    {{ date('d', strtotime('+' . $data->rental_time . ' months' . $data->rental_time_start)) }}<span
        class="noto-bold">일
        까지 01년로 한다</span>.</p>

<p class="mt under"><span class="bold ">ĐIỀU 3: GIÁ CHO THUÊ </span><span class="noto-bold">임대료</span>:</p>
<ul>
    <li>
        <p>Giá cho thuê là:
            <span class="noto">
                {{ number_format($data->rental_price_vnd ?? $data->rental_price_kr) }}
                {{ $data->rental_price_vnd !== null ? 'VND/tháng' : '원/월' }} (
                {{ $data->rental_price_text ?? $data->rental_price_kr_text }} )</span>
            . <span style="color: red">Không bao gồm các khoản
                thuế . Nếu có phát sinh bất cứ các khoản nào về thuế thì Bên B phải trả </span>
        </p>
        <p><span class="noto">임대료는</span>
            <span class="noto">
                {{ number_format($data->rental_price_kr ?? $data->rental_price_vnd) }}
                {{ $data->rental_price_kr !== null ? '원/월' : 'VND/tháng' }} (
                {{ $data->rental_price_kr_text ?? $data->rental_price_text }} )
            </span>
            <span class="noto">이며 임차인의 요구로 세금계산서가 필요할 때에는 임차인이 경비를 부담한다</span>.
        </p>
    </li>
    <li>
        <p>Giá thuê trên không thay đổi trong suốt thời hạn thuê.</p>
        <p style="padding-left: 25px"><span class="noto">상기 임대료는 계약 기간 중에는 바꾸지 않는다.</span></p>
    </li>
    <li>
        <p>Giá thuê trên không bao gồm thuế, ADSL, điện, điện thoại, nước, truyền hình cáp, gas nấu ăn, phí quản lý và
            phí
            sinh hoạt khác. Bên B sẽ trả các khoản phí này theo hóa đơn sử dụng</p>
        <p style="padding-left: 25px"><span class="noto">상기 임대료는 인터넷, 전화, 전기, 수도, 유선방송, GAS, 관리비, 각 생활 경비 등은 포함하지 않는다.
                임차인이
                실사용 경비를 지불한다.</span></p>
    </li>
</ul>
<br>
<p class="mt under"><span class="bold">ĐIỀU 4: PHƯƠNG THỨC THANH TOÁN </span><span class="noto-bold">보증금과 임차료
        지불</span>:</p>
<p><span class="bold">4.1</span> Tiền đặt cọc: {{ $data->rental_month_earnest }} tháng với số tiền
    <span
        class="noto">{{ number_format($data->rental_month_earnest * ($data->rental_price_vnd ?: $data->rental_price_kr)) . ($data->rental_price_vnd !== null ? ' VND' : ' 원') }}
    </span>. Số tiền này sẽ được Bên A hoàn trả
    cho bên B ngay sau khi thanh lý Hợp Đồng, khi Bên B đã thanh toán hết chi phí đã sử dụng như : điện, nước, phí quản
    lý , truyền hình cáp, điện thoại, internet....và sẽ khấu trừ nếu có những hư hỏng về thiết bị nội thất trong nhà (
    trừ tự nhiên mài mòn) tính đến thời điểm trả nhà.
</p>
<p style="padding-left: 25px"><span class="noto">보증금: {{ $data->rental_month_earnest }} 개월 임차료에 해당하는
        {{ number_format($data->rental_month_earnest * ($data->rental_price_kr ?: $data->rental_price_vnd)) . ($data->rental_price_kr !== null ? ' 원' : ' VND') }}.
        보증금은 이 계약이 종료되어 아파트를 돌려주는 시점에
        임차인이 사용한 인터넷, 전화, 유선방송, 관리비, 전기, 수도 등과 같은 사용 경비가 모두 정산 되었을 때 즉시 임차인에게 환불한다. 만약 집을 돌려주는 시점에 설비 또는 실내 장식의 손상이 있으면
        이 보증금에서 제한다. (자연마모는 제외한다.)</span></p>
<p><span class="bold">4.2</span> Thanh toán tiền thuê nhà: {{ $data->rental_month_pay }} tháng / lần với số tiền là:
    <span
        class="noto">{{ number_format($data->rental_month_pay * ($data->rental_price_vnd ?: $data->rental_price_kr)) . ($data->rental_price_vnd !== null ? ' VND' : ' 원') }}
    </span>. Tiền thuê nhà được thanh toán vào ngày
    {{ $data->rental_pay_start }} đến ngày {{ $data->rental_pay_end }} mỗi kỳ. Nếu Bên B
    thanh toán chậm trong vòng 5 ngày, từ sau ngày {{ $data->rental_pay_start }} của mỗi kỳ thanh toán Bên A có quyền
    hủy hợp đồng mà không hoàn
    trả lại tiền cọc.
</p>

<p style="padding-left: 25px">
    <span class="noto">월세 한달에 한번 지급합니다. 월세는
        <span
            class="noto">{{ number_format($data->rental_month_pay * ($data->rental_price_kr ?: $data->rental_price_vnd)) . ($data->rental_price_kr !== null ? ' 원' : ' VND') }}
        </span> 월세 한달에 한번 지급합니다. 월세는
        {{ $data->rental_pay_start }}
        일부터 {{ $data->rental_pay_end }} 일까지 내입급합니다 . 만약 월세 미지급이 {{ $data->rental_pay_start }}일 후 5일 경과시 계약은 무효로 고 보증금을
        환볼하지 아닙니다.
    </span>
</p>

<p class="mt under"><span class="bold ">ĐIỀU 5: TRÁCH NHIỆM CỦA BÊN A </span><span class="noto-bold">임대인의 의무</span>:
</p>
<div>
    <ul>
        <li>
            <p>Giao nhà cho Bên B vào ngày {{ date('d/m/Y', strtotime($data->rental_time_start)) }}.</p>
            <p style="padding-left: 25px"><span class="noto">아파트를 인도한다
                    {{ date('d/m/Y', strtotime($data->rental_time_start)) }}.</span></p>
        </li>
        <li>
            <p>Đảm bảo căn hộ không tranh chấp trong thời gian cho thuê.</p>
            <p style="padding-left: 25px"><span class="noto">임대기간 중에 분쟁을 야기시키지 아니함을 보증한다.</span></p>
        </li>
        <li>
            <p>Tạo điều kiện thuận lợi cho Bên B sử dụng căn hộ.</p>
            <p style="padding-left: 25px"><span class="noto">임차인이 아파트를 편리하게 사용할 수 있도록 조건을 조성한다.</span></p>
        </li>
        <li>
            <p>Sửa chữa kịp thời những hư hỏng về cấu trúc xây dựng chính của căn nhà và tòa nhà như: mái nhà, nền nhà,
                hệ thống
                thoát nước và thiết bị điện lạnh mà không phải lỗi do bên thuê gây ra.</p>
            <p style="padding-left: 25px"><span class="noto">임대인은 임차인에게 서면으로 통보 한 후 지붕, 기초, 누수와 같은 아파트의 주요 공사와 관련된 모든
                    피해를 신속히
                    수리한다. 임차인이 본 아파트에 손해를 입히는 경우 임차인은 수리에 대한 책임을 진다 .</span></p>
        </li>
        <li>
            <p>Có trách nhiệm đăng ký tạm trú lần đầu cho Bên B với các cơ quan hữu quan</p>
            <p style="padding-left: 25px"><span class="noto">임대인은 임차인이 임시 거주 등록을 할 수 있게 한다.</span></p>
        </li>
        <li>
            <p>Báo cho Bên B trước 24 giờ bằng điện thoại trong trường hợp Bên A muốn vào căn hộ.</p>
            <p style="padding-left: 25px"><span class="noto">본 아파트에 방문하길 원한다면 긴급한 경우를 제외하고 전화로24시간 이전에 통보한다.</span>
            </p>
        </li>
        <li>
            <p class="bold" style="color:red"><i>Nếu chủ nhà cũ sang nhượng lại cho chủ nhà mới thì chủ nhà mới phải
                    thực hiện theo những qui định trong hợp đồng
                    trên.</i></p>
            <p style="padding-left: 25px"><span class="noto-bold" style="color:red">만약 임대인이 새로운 주인에게 주택을 판매할 경우에 새
                    주인도 본 계약의 규정을 준수한다.</span></p>
        </li>
    </ul>
</div>

<div class=" break-page"></div>
<p class="mt under"><span class="bold ">ĐIỀU 6: TRÁCH NHIỆM CỦA BÊN B </span><span class="noto-bold">임차인의 의무</span>:
</p>
<div>
    <ul>
        <li>
            <p>Thanh toán tiền thuê nhà đúng hạn.</p>
            <p style="padding-left: 25px"><span class="noto">정확한 날짜에 임차료를 지불한다.</span></p>
        </li>
        <li>
            <p>Bên B được phép chuyển nhượng cho bên thứ 3 nếu được sự đồng ý của Bên A bằng văn bản xác nhận sự đồng ý.
                (by
                document)</p>
            <p style="padding-left: 25px"><span class="noto">임차인은 문서에 의한 임대인의 동의 하에 제 3자에게 양도할 수 있다.</span></p>
        </li>
        <li>
            <p>Tự thanh toán các khoản phí như : phí quản lý, điện , nước, điện thoại, truyền hình cáp, internet....phát
                sinh
                trong thời gian thuê.</p>
            <p style="padding-left: 25px"><span class="noto">다음과 같은 각 경비를 결제한다; 임대 기간 동안에 발생하는 관리비, 전기, 수도, 전화,
                    유선방송, 인터넷,
                    …</span></p>
        </li>
        <li>
            <p>Bảo quản trang thiết bị, vật dụng của căn hộ, sử dụng căn hộ đúng mục đích đã thỏa thuận. Trong thời gian
                thuê nhà,
                nếu có hư hỏng những vật dụng nhỏ như: bóng đèn, vòi nước....thì Bên B phải tự sữa chữa.</p>
            <p style="padding-left: 25px"><span class="noto">주택 내의 가구, 설비 등을 보관하며 목적에 맞게 사용한다. 임대 기간 중 수도 꼭지, 전구 등의
                    사소한 고장은 임차인이
                    수리한다.</span></p>
        </li>
        <li>
            <p>Không được sữa chữa, thay đổi thiết kế trang trí của căn hộ khi chưa có sự đồng ý của Bên A. Phải có sự
                đồng ý của
                Bên A thì Bên B mới được phép đục lỗ khoang tường...</p>
            <p style="padding-left: 25px"><span class="noto">임대인의 동의가 없으면 아파트 내부 시설의 설치나 변경을 할 수 없다. 임대인의 동의 하에 벽에 못
                    등을 박을 수
                    있다...</span></p>
        </li>
        <li>
            <p>Chịu trách nhiệm về những hư hỏng, mất mát của đồ gỗ, vật dụng và tài sản trong căn hộ và sẽ chịu bồi
                thường băng
                những sản phẩm có mẫu mã chất lượng tương tự hay sẽ sửa chữa .</p>
            <p style="padding-left: 25px"><span class="noto">가전 제품 및 가구에 대하여 분실 및 훼손시 책임져야 한다. 동일한 모델의 중고 제품이나 수리로
                    변상함을 원칙으로
                    한다.</span></p>
        </li>
        <li>
            <p>Không mang chất cấm, chất gây nổ vào nơi đang thuê.</p>
            <p style="padding-left: 25px"><span class="noto">금지 된 물질이나 폭발물을 임대 아파트에 들이지 않는다.</span></p>
        </li>
        <li>
            <p>Khi kết thúc hợp đồng thuê, Bên B phải trả lại nhà nguyên vẹn hiện trạng như ban đầu lúc Bên A giao nhà.
            </p>
            <p style="padding-left: 25px"><span class="noto">계약 종료시 임대인은 임대 아파트를 최초 임대 상태 그대로 임대인에게 반환해야 한다.</span>
            </p>
        </li>
        <li>
            <p>Chấp hành nghiêm chỉnh nội quy khu dân cư, quy định địa phương, giữ gìn an ninh trật tự, phòng chống cháy
                nổ</p>
            <p style="padding-left: 25px"><span class="noto">주거 지역 규칙, 지역 규정, 보안 및 질서 유지, 화재 및 폭발 방지를 철저히 준수해야
                    한다.</span></p>
        </li>
    </ul>
</div>
<div class=" break-page"></div>
<p class="mt under"><span class="bold ">ĐIỀU 7 : ĐIỀU KHOẢN CHUNG </span><span class="noto-bold">일반적인 사항</span>:</p>
<div>
    <ul>
        <li style="padding-bottom: 10px">
            <p>Trong thời gian hợp đồng còn hiệu lực, hai bên không có quyền đơn phương chấm dứt hợp đồng</p>
            <p style="padding-left: 25px"><span class="noto">계약기간 안에는 효력이 있으며 어느 일방이 일방적으로 계약을 중지할 권한이 없다.</span>
            </p>
        </li>
        <li style="padding-bottom: 10px">
            <p>Trường hợp nếu Bên A hủy hợp đồng trước thời hạn ( kể từ ngày ký hợp đồng) thì Bên A sẽ phải trả lại số
                tiền cọc
                là:
                <span class="noto">
                    {{ number_format($data->rental_month_earnest * ($data->rental_price_vnd ?? $data->rental_price_kr)) }}
                    {{ $data->rental_price_vnd !== null ? 'VND/tháng' : '원/월' }} và bồi
                    thường thêm cho Bên B 02 (hai) tháng tiền cọc tương đương với số tiền là
                    {{ number_format($data->rental_month_earnest * ($data->rental_price_vnd ?? $data->rental_price_kr)) }}
                    {{ $data->rental_price_vnd !== null ? 'VND/tháng' : '원/월' }}
                </span>
            </p>
            <!-- {{ number_format($data->rental_month_earnest * $data->rental_month_earnest * $data->rental_price_vnd) }} -->
            <p style="padding-left: 25px"><span class="noto">임대인이 본 계약만료 전에 계약을 해지할 경우에는(계약 개시일부터 바로 적용된다) 임대인은 보증금
                    {{ number_format($data->rental_month_earnest * ($data->rental_price_kr ?? $data->rental_price_vnd)) }}
                    원 을 돌려주며,
                    보증금에 해당하는 금액
                    {{ number_format($data->rental_month_earnest * ($data->rental_price_kr ?? $data->rental_price_vnd)) }}
                    원 을 보상한다.</span>
            </p>
        </li>
        <li style="padding-bottom: 10px">
            <p>Ngược lại nếu Bên B hủy hợp đồng trước thời hạn (kể từ ngày ký hợp đồng) thì Bên B sẽ mất số tiền đã đặt
                cọc cho
                Bên A tương đương là
                <span class="noto">
                    {{ number_format($data->rental_month_earnest * ($data->rental_price_vnd ?? $data->rental_price_kr)) }}
                    {{ $data->rental_price_vnd !== null ? 'VND/tháng' : '원/월' }}. Một trong hai bên phải báo trước
                    cho
                    bên còn lại trước 01
                    (một) tháng.
                </span>
            </p>
            <p style="padding-left: 25px">
                <span class="noto">반대로 만일 임차인이 계약만료 전에 계약을 파기한다면 (계약 개시일부터 바로 적용된다) 임차인은
                    {{ number_format($data->rental_month_earnest * ($data->rental_price_kr ?? $data->rental_price_vnd)) }}
                    원 에 해당하는
                    보증금을 포기한다. 그리고 양당사자는 1개월 전에 미리 통보한다.
                </span>
            </p>
        </li>
        <li style="padding-bottom: 10px">
            <p>Sau khi kết thúc hợp đồng, nếu Bên B có nhu cầu tiếp tục hợp đồng thuê trên và được sự đồng ý của Bên A,
                hai bên có
                thể thương lượng với nhau về giá cả, thời gian thuê cùng với các điều khoản khác được thể hiện trên hợp
                đồng, phải
                thông báo cho bên A trước 1 (một) tháng trước khi kết thúc hợp đồng. Ngược lại, nếu bên B không muốn
                tiếp tục hợp
                đồng thuê phải thông báo cho bên A trước 1 tháng và tạo điều kiện cho khách xem nhà.</p>
            <p style="padding-left: 25px"><span class="noto">본 계약이 끝난 후 임차인이 계약을 갱신할 의사가 있고 임대인의 동의가 있다면 양자는 가격, 기간과
                    함께 새로운 계약
                    조건에 대하여 서로 상의할 수 있다. 임차인은 계약만료1개월 전에 계약종료나 재계약 여부를 임대인에게 통보해야 한다.
                    만약 임차인이 계약 갱신을 원하지 않는 경우 1개월 전 임대인에게 통보하고 임대인이
                    다음 임차인을 구할 수 있게 부동산이 고객을 데려올 경우 아파트를 볼 수 있게 한다.</span></p>
        </li>
        <li style="padding-bottom: 10px">
            <p>Hai bên cam kết thực hiện đầy đủ các điều khoản đã ghi trên. Nếu có tranh chấp phát sinh sẽ giải quyết
                bằng thương lượng.
                Nếu không đạt được thỏa thuận như mong muốn vụ việc sẽ đưa ra toàn án nhân dân và phát quyết của tòa án
                có giá trị chung ràng buộc các bên.</p>
            <p style="padding-left: 25px"><span class="noto">양자는 여기 기재되어 있는 모든 조항을 충분히 숙지하고 이행할 것을 서약한다.
                    계약 기간 중 분쟁이 발생한다면 서로 상의하여 해결한다. 만약 서로 합의하지 못하면 분쟁사항에 관해 법원에 제소할 수 있고 이후 법원의 판결은 양자를 구속할 효력을
                    가진다.</span></p>
        </li>
        <li style="padding-bottom: 10px">
            <p>Thỏa thuận khác/<span class="noto">사적 계약: <br>{{ $data->rental_condition }}</span></p>
        </li>
        <li style="padding-bottom: 10px">
            <p>Hợp đồng này có hiệu lực kể từ ngày ký và được lập thành ba bản có giá trị như nhau, mỗi bên giữ một bản
                để làm
                bằng chứng và cùng thực hiện.</p>
            <p style="padding-left: 25px"><span class="noto">이 계약서는 서명을 함으로써 효력이 발생하며 본 계약의 증서로서 총3부를 작성하여 임대인,임차인,
                    중개인이 각자 계약
                    이행을 위해 보관한다.</span></p>
        </li>
    </ul>
</div>

<table class="mt break-page-auto" style="margin-bottom: 80px">
    <tbody>
        <tr>
            <td style="width: 50%;" class="text-center"><span class="bold">CHỦ NHÀ </span><span
                    class="noto-bold">(주인)</span></td>
            <td style="width: 50%;" class="text-center"><span class="bold">BÊN THUÊ NHÀ</span><span
                    class="noto-bold">(임대인)</span></td>
        </tr>
    </tbody>
</table>
<table>
    <tbody>
        <tr>
            <td style="width: 100%;" class="text-center"><span class="bold">BÊN LÀM CHỨNG</span><span
                    class="noto-bold">(부동산 중개인)</span></td>
        </tr>
    </tbody>
</table>
<div class="break-page">
    <p class="text-center"><span class="bold">BIÊN NHẬN THANH TOÁN</span></p>
    <p class="text-center"><span class="noto">임대료 지불 절차</span></p>
    <p class="text-center">Căn hộ <span class="noto">아파트 주소</span>:..................</p>
    <table class="table-6col tb-bordered mt">
        <tbody>
            <tr>
                <td>STT<br /><span class="noto">순서</span></td>
                <td>Ngày<br /><span class="noto">날짜</span></td>
                <td>Số tiền thanh toán<br /><span class="noto">결제 금액</span></td>
                <td>Xác nhận của Bên Cho Thuê<br /><span class="noto">임대인의승인</span></td>
                <td>Xác nhận của Bên Thuê<br /><span class="noto">임차인의 승인</span></td>
                <td>Xác nhận của Bên làm chứng<br /><span class="noto">중개인의 승인</span></td>
            </tr>
            <tr>
                <td style="height: 150px">1</td>
                <td>............</td>
                <td>............ <br>
                    <span class="noto">보증금</span>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="height: 150px">2</td>
                <td>............</td>
                <td>............ <br>
                    <span class="noto">월세 두 달 </span>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
@include('admin.contract.pdf.footer')
