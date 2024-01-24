<html>

@include('admin.contract.pdf.header')
<h4 class="text-center fs-15 mt" style="margin-bottom: 0;">
    HỢP ĐỒNG THUÊ CĂN HỘ <br><i class="fs-15">APARTMENT LEASE CONTRACT</i>
</h4>
<p class="bold fs-9 text-center">MÃ SỐ CĂN HỘ/ APARTMENT NO: {{ $data->rental_land_code }}</p>
<span>Hợp đồng này được thành lập ngày
    {{ date('d', strtotime($data->rental_date_create)) }} tháng
    {{ date('m', strtotime($data->rental_date_create)) }} năm
    {{ date('Y', strtotime($data->rental_date_create)) }} tại thành phố Hồ Chí Minh giữa:</span><br>
<span class="bold"><i>This contract is made on
        {{ date('d', strtotime($data->rental_date_create)) }}/{{ date('m', strtotime($data->rental_date_create)) }}/{{ date('Y', strtotime($data->rental_date_create)) }}
        in Ho Chi Minh City (HCMC), between:</i></span>
<br>
<p><span class="bold under">BÊN CHO THUÊ CĂN HỘ (Bên A) /<span class="bold"><i>LANDLORD(Party A):</i></span></p>
<div>
    <ul>
        <li>Họ và tên <span class="bold"><i>/ Full name :</i></span><span
                class="bold">{{ $data->rental_owner_fullname }}</span></li>
        <li>CCCD <span class="bold"><i>/ ID no :</i></span> {{ $data->rental_owner_id_number }}</li>
        <li>Cấp ngày <span class="bold"><i>/ Issue date : </i></span>
            {{ date('d/m/Y', strtotime($data->rental_owner_id_date)) }} - Tại:
            {{ $data->rental_owner_id_location }}</li>
        <li>Hiện cư trú tại <span class="bold"><i>/ Permanent address :</i></span> {{ $data->rental_owner_location }}
        </li>
    </ul>
</div>
<div class="my">
    <!--  Tên bất động sản cần thì add thêm vào {{ $data->rental_land_title }}  -->
    <p>Hiện là chủ sở hữu căn hộ số: {{ $data->rental_land_title }} {{ $data->rental_land_address }}</span></p>
    <p class="bold"><i>Is the owner of the apartment No : {{ $data->rental_land_address }}</i></p>
</div>
<p><span class="bold under">BÊN THUÊ CĂN HỘ (Bên B)/ <i>TENANT (Party B):</i></span></p>
<div>
    @if (
        $data->rental_customer_fullname ||
            $data->rental_customer_id_number ||
            $data->rental_customer_id_location ||
            $data->rental_customer_id_location)
        <ul>
            <li>Họ và tên<span class="bold"><i> / Full name :</i></span> <span
                    class="bold">{{ $data->rental_customer_fullname }}</span></li>
            <li>Số Passport<span class="bold"><i> / Passport no : </i></span> {{ $data->rental_customer_id_number }}
            </li>
            <li>Cấp ngày <span class="bold"><i>/ Issue date : </i></span>
                {{ date('d/m/Y', strtotime($data->rental_customer_id_date)) }}</li>
            <li>Quốc tịch <span class="bold"><i> / Nationality : </i></span> {{ $data->rental_customer_id_location }}
            </li>
            <li>Hiện cư trú tại <span class="bold"><i>/ Permanent address :</i></span>
                {{ $data->rental_customer_location }}</li>
        </ul>
    @else
        <ul>
            <li><span class="bold">{{ $data->rental_customer_company }}</span></li>
            <li>ADD/ Địa chỉ :{{ $data->rental_customer_address }}</li>
            <li>Mã sô thuế / tax code :{{ $data->rental_customer_code }}</li>
            <li>Người đại diện / Representative: <span class="bold">{{ $data->rental_customer_represent }}</span>
            </li>
            <li>Chức vụ/position: {{ $data->rental_customer_position }}</li>
            <li>Telephone/ Điện thoại: {{ $data->rental_customer_phone }}</li>
            <li>Email:{{ $data->rental_customer_email }}</li>
        </ul>
    @endif
</div>
<p class="mt"><span class="bold under">BÊN LÀM CHỨNG (Bên C) / <i>WIRTTEN (Party C):</i></span></p>
<div>
    <ul>
        <li><span class="bold">CÔNG TY TNHH TM- DV – TƯ VẤN BĐS NHÀ AN VIỆT (VIETHOUSE)</span></li>
        <li>ADD/ Địa chỉ : 1016/19 (SC19-2) Sky Garden 2, Nguyễn Văn Linh, Tân Phong Ward, Dis 7, HCM</li>
        <li>Mã sô thuế / tax code : 0313319570</li>
        <li>Người đại diện / Representative: <span class="bold">{{ $data->rental_performer_represent }}</span></li>
        <li>Chức vụ/position: {{ $data->rental_performer_position }}</li>
        <li>Telephone/ Điện thoại: 0908.916.985</li>
        <li>Email:viethouse0111@gmail.com</li>
        <li>Người thực hiện /performer: {{ $data->rental_performer_fullname }}</li>
    </ul>
</div>
<div>
    <p>Bên A và Bên B đồng ý ký kết Hợp đồng thuê Căn hộ theo các điều kiện và điều khoản sau :</p>
    <p class="bold"><i>Party A & Party B agree to enter into this Lease Contract with the following terms and
            conditions:</i></p>
</div><br><br>
<p><span class="bold under">ĐIỀU 1: CĂN HỘ CHO THUÊ / <i>Leased Premises:<i></span></p>
<p><span class="bold">1.</span> Bên A đồng ý cho Bên B thuê căn hộ số: {{ $data->rental_land_title }},
    {{ $data->rental_land_address }} với đầy đủ các trang thiết bị,
    máy móc, đồ gỗ gia dụng… theo liệt kê trong bảng nội thất đính kèm.</p>
<p class="bold"><i>Party A hereby leases to Party B the apartment No: {{ $data->rental_land_title }},
        {{ $data->rental_land_address }} as described
        hereunder together with the fixtures, fittings, furniture, equipments, installations all as more fully set forth
        in attached hereto.</i></p>
<p><span class="bold">2.</span> Mục đích thuê: {{ $data->rental_purpose }}</p>
<p class="bold"><i>Lease purpose: {{ $data->rental_purpose_lang }}</i></p><br>
<p class="mt"><span class="bold under">ĐIỀU 2: THỜI HẠN THUÊ / <i>Lease Term:</i></span></p>
<p>Thời hạn thuê căn hộ là {{ $data->rental_time }} tháng, bắt đầu từ
    {{ date('d/m/Y', strtotime($data->rental_time_start)) }} đến hết ngày
    {{ date('d/m/Y', strtotime('+' . $data->rental_time . ' months' . $data->rental_time_start)) }} Thời hạn này có
    thể được gia hạn tùy theo sự thỏa thuận của hai bên trước ngày kết thúc 30 ngày.</p>
<p class="bold"><i>The lease term: {{ $data->rental_time }} month, shall begin on
        {{ date('d/m/Y', strtotime($data->rental_time_start)) }} and expire on
        {{ date('d/m/Y', strtotime('+' . $data->rental_time . ' months' . $data->rental_time_start)) }} The lease term
        shall be extended subject to the agreement by both parties before deadline 30 days.</i></p><br>
<p class="mt"><span class="bold under">ĐIỀU 3: GIÁ THUÊ VÀ PHƯƠNG THỨC THANH TOÁN / Rental and Payment Terms:</span>
</p>
<p><span class="bold">3.1. </span><span class="bold under">Giá thuê / Rental:</span></p>
<ul>

    @if ($data->rental_price_vnd && $data->rental_price_usd)
        <li>
            <p>
                Số tiền thuê tính theo tỷ giá hiện tại là: {{ $data->rental_price_vnd }}
                {{ '(' . $data->rental_price_text . ')' }}.
                Giá thuê được tính theo theo tỷ giá bán ra của ngân hàng Vietcombank tại thời điểm thanh toán.
                Giá thuê trên không bao gồm các khoản thuế liên quan đến việc xuất hóa đơn tài chính (Hóa đơn đỏ). Trong
                trường
                hợp Bên B yêu cầu Bên A xuất hóa đơn tài chính thì Bên B phải thanh toán toàn bộ các khoản thuế cho việc
                xuất hóa đơn.
            </p>
            <p class="bold"><i>
                    Rental fee amount at the current rate: {{ $data->rental_price_usd }}
                    {{ '(' . $data->rental_price_usd_text . ')' }}.
                    The rental fee will be belongs at the exchange rate of Vietcombank selling at the time of payment.
                    And it does not include taxes to issue VAT invoice (Red invoice). In case Party B asks Party A to
                    issue
                    an official invoice, Party B shall be liable for all taxes arising therefore.</i>
            </p><br>
            <p>Giá thuê không bao gồm các chi phí như điện, nước, phí quản lý, internet và các chi phí sinh hoạt…..các
                chi phí này Bên B phải thanh toán cho cơ quan hữu quan</p>
            <p class="bold"><i>The rental price does not include costs such as electricity, water, management fees,
                    internet and living expenses... these costs must be paid by Party B to the relevant authorities</i>
            </p>
        </li>
    @else
        {{-- number_format($data->rental_price_vnd/23290 , 2, '.', ',' --}}
        {{-- ($data->rental_price_vnd || $data->rental_price_text) --}}
        <li>
            <p>
                Số tiền thuê tính theo hiện tại là: {{ $data->rental_price_vnd }}
                {{ '(' . $data->rental_price_text . ')' }}.
                Giá thuê được tính theo tại thời điểm thanh toán.
                Giá thuê trên không bao gồm các khoản thuế liên quan đến việc xuất hóa đơn tài chính (Hóa đơn đỏ). Trong
                trường
                hợp Bên B yêu cầu Bên A xuất hóa đơn tài chính thì Bên B phải thanh toán toàn bộ các khoản thuế cho việc
                xuất hóa đơn.
            </p>
            <p class="bold"><i>
                    Rental fee amount at the current rate: {{ number_format($data->rental_price_usd) }} đ/month
                    {{ '(' . $data->rental_price_usd_text . ')' }}.
                    The rental fee will be the time of payment.
                    And it does not include taxes to issue VAT invoice (Red invoice). In case Party B asks Party A to
                    issue
                    an official invoice, Party B shall be liable for all taxes arising therefore.</i>
            </p><br>
            <p>Giá thuê không bao gồm các chi phí như điện, nước, phí quản lý, internet và các chi phí sinh hoạt…..các
                chi phí này Bên B phải thanh toán cho cơ quan hữu quan</p>
            <p class="bold"><i>The rental price does not include costs such as electricity, water, management fees,
                    internet and living expenses... these costs must be paid by Party B to the relevant authorities</i>
            </p>
        </li>
    @endif
</ul>
<p><span class="bold">3.2. </span><span class="bold under">Phương thức đặt cọc & thanh toán / Security Deposit &
        Payment Terms:</span></p>
<ul>
    <li>
        <p>Bên B đặt cọc cho Bên A số tiền tương đương {{ $data->rental_month_earnest }} tháng tiền thuê nhà là để đảm
            bảo
            việc thực hiện xuyên suốt hợp đồng.
        </p>
        <p class="bold"><i>A security deposit equivalence of {{ $data->rental_month_earnest }} months rent fee shall
                be paid by
                Party B to Party A to secure the due observance & performance of the contract.</i></p><br>
    </li>
    <li>
        <p>Tiền đặt cọc không tính lãi và sẽ được Bên A giữ lại suốt thời hạn hợp đồng.</p>
        <p class="bold"><i>The deposit shall be retained by Party A through the terms free of any interest.</i></p>
        <br>
    </li>
    <li>
        <p>Khoản tiền cọc này sẽ được trả lại cho Bên B cùng một loại tiền tệ hoặc cùng tỉ giá sau khi hợp đồng hết hạn
            và đã
            bàn giao lại Căn hộ cho Bên A sau khi trừ các chi phí tiện ích mà Bên B chưa thanh toán, các khoản phạt vi
            phạm hợp
            đồng, các khoản hư hỏng trang thiết bị (ngoại trừ hao mòn thông thường), các khoản bồi thường tổn thất (nếu
            có).</p>
        <p class="bold"><i>The deposit which is the same currency or rate exchange as Party B deposited shall then be
                fully refunded to
                Party B from the termination date at the end of the contract and Party A shall have the right to deduct
                from the security
                deposit the amount of any unpaid utilities expenses, any damaged of the equipments (fair wear & tear
                excepted),
                any fine and damage incurred in consequence of the breach of the Contract by Party B.</i></p><br>
    </li>
    <li>
        <p>Bên B sẽ trả tiền thuê nhà: {{ $data->rental_month_pay }} tháng một lần trong vòng 05 (năm) ngày của đợt
            thanh
            toán (từ ngày {{ $data->rental_pay_start }} đến ngày {{ $data->rental_pay_end }}).</p>
        </p>
        <p class="bold"><i>Payment will be made in advance for every {{ $data->rental_month_pay }} months within the
                first 05
                (year) days of
                each two months (from {{ $data->rental_pay_start }} to {{ $data->rental_pay_end }} ).</i></p>
        <br>
    </li>
</ul>
<p class="mt under"><span class="bold ">ĐIỀU 4: QUYỀN VÀ NGHĨA VỤ CỦA HAI BÊN / <i>Rights and Obligations of both
            parties:</i></span></p>
<p><span class="bold">4.1 <span><span class="bold under">Bên A có các quyền và nghĩa vụ sau / <i>Party A shall have
                    the following rights anf obligations
                    to: </i></span></p>
<ul>
    <li>
        <p>Đảm bảo thời gian cho thuê là {{ $data->rental_time }} tháng.
            Trong trường hợp Bên A bán căn hộ cho Bên thứ ba thì phải bảo đảm cho Bên B được tiếp tục sử dụng cho đến
            khi Hợp đồng này chấm dứt.
            Nếu Bên A muốn chấm dứt hợp đồng trước thời hạn thì Bên A phải hoàn trả toàn bộ tiền đặt cọc cho Bên B và
            bên A sẽ bị phạt thêm số tiền tương đương với số tiền đã nhận cọc.
            Tuy nhiên Bên A phải báo trước 30 ngày cho Bên B trước ngày muốn kết thúc trước hạn.
            Và đồng thời trả lại tiền nhà mà Bên B chưa sử dụng.</p>
        <p class="bold"><i>Ensure the lease term is {{ $data->rental_time }} month. In case Party A sells the
                Apartment to a third party,
                Party A shall ensure that Party B can continue to use the Apartment until the expiration of the Lease
                Term.
                If Party A unilateral terminate the contract, Party A shall refund the security deposit to Party B and
                pay to
                Party B an amount equivalence of the deposit. However, from deadline Party A must have to notify to
                Party B before 30 days.
                And at the same time, return the house rent that Party B has not used.</i></p>
    </li>
    <li>
        <p>Sửa chữa kịp thời những hư hỏng về cấu trúc xây dựng chính của căn nhà và tòa nhà như: mái nhà, nền nhà, hệ
            thống
            thoát nước và thiết bị điện lạnh mà không phải lỗi do bên thuê gây ra.</p>
        <p class="bold"><i>To promptly repair all the damage related to the main construction of the rental house and
                building such as roof,
                foundation, leakage after being informed in writing to the lessee.
                In case that the lessee causes damage to the premises, then the lessee shall be responsible for such
                repair</i></p>
    </li>
    <li>
        <p>Giao căn hộ, trang thiết bị và tiện nghi cho Bên B đúng ngày đã định trong hợp đồng.</p>
        <p class="bold"><i>Hand over the Apartment, its furniture and appliances to Party B in accordance with the
                Contract.</i></p>
    </li>
    <li>
        <p>Có trách nhiệm đăng ký tạm trú lần đầu cho Bên B với các cơ quan hữu quan.</p>
        <p class="bold"><i>Shall support the Party B for temporary residence registration.</i></p>
    </li>
    <li>
        <p>Báo cho Bên B trước 24 giờ bằng điện thoại trong trường hợp Bên A muốn vào kiểm tra căn hộ (ngoại
            trừ
            trong trường hợp khẩn cấp).</p>
        <p class="bold"><i>Enter the Apartment to view its condition, but must notify to Party B 24 hours in advance (
                except in
                case of emmergency).</i></p>
    </li>
</ul><br>
<p><span class="bold">4.2 <span><span class="bold under">Bên B có các quyền và nghĩa vụ sau /<i>Tenant (Party B)’s
                    Obligations:</i></span></p>
<ul>
    <li>
        <p>Đảm bảo thời gian thuê là {{ $data->rental_time }} tháng. Nếu Bên B chấm dứt Hợp đồng trước thời hạn
            {{ $data->rental_time }} tháng sẽ bị mất toàn bộ tiền đặt
            cọc. Thông báo cho Bên A trước 01 tháng kể từ ngày hết hạn hợp đồng nếu bên B không thể tiếp tục gia hạn hợp
            đồng.
        </p>
        <p class="bold"><i>Ensure the Lease terms is {{ $data->rental_time }} month. If Party B early terminates the
                Contract before {{ $data->rental_time }} month ,
                the security deposit shall be lost. Notify to Party A before 01 month from expiration date of contract
                if
                Party B cannot continue to extend the contract. </i></p>
    </li>
    <li>
        <p>Trả tiền thuê đúng thời hạn. Nếu trả tiền thuê căn hộ chậm quá 10 ngày (làm việc) kể từ ngày đến hạn phải
            thanh
            toán, Bên A có quyền chấm dứt hợp đồng, thu toàn bộ tiền đặt cọc và Bên B không được bồi thường bất cứ một
            khoản chi
            phí nào.</p>
        <p class="bold"><i>To pay the rent in time. If payment is 10 days delayed after the last day of the payment
                circle as agreed in Article 3. If Party B pays rental fee later than 10 days (working day)
                from limited date of payment, Party A can end contract, collect all the security deposit and
                Party B shall not be conspensated any expenses.</i></p>
    </li>
    <li>
        <p>Thanh toán đúng hạn các chi phí điện, nước, điện thoại, internet, tivi cable, phí quản lý ..v..v.. theo hoá
            đơn
            của cơ quan hữu quan.</p>
        <p class="bold"><i>Pay any utilities fees, Management fees to the relevant service providers on time.</i></p>
    </li>
    <li>
        <p>Không được chuyển nhượng hợp đồng, hoặc cho thuê lại Căn hộ nếu không có sự đồng ý của bên A. Nếu vi phạm,
            Bên A
            có quyền chấm dứt hợp đồng và Bên B không được bồi thường bất cứ một khoản chi phí nào.</p>
        <p class="bold"><i>Not to transfer or sublease the Contract, in whole or in part, without Party A’s prior
                written consent.
                If Party B breach the Contract, Party A shall have the right to early terminate the Contract, and
                Party B shall have no right to claim any expenditure refund.</i></p>
    </li>
    <li>
        <p>Thông báo kịp thời cho Bên A nếu Bên B có khách đến ở tạm thời tại căn hộ đang thuê để Bên A đăng ký tạm trú
            với
            chính quyền địa phương. Khi sổ tạm trú hết hạn, Bên B phải chủ động gia hạn tạm trú. Bên A sẽ không chịu
            trách nhiệm
            với các cơ quan hữu quan nếu Bên B bị các cơ quan hữu quan kiểm tra và bị phạt vì: không đăng ký tạm trú;
            hết hạn
            tạm trú hoặc có người không đăng ký tạm trú.</p>
        <p class="bold"><i>Notifying the landlord in time about guests who temporarily residence at the rented
                apartment so that
                the landlord registers to the authorities. When the Temporarily Residence expire, Party B automatically
                extend.
                Party A shall not be responsible for the related authorities if Party B was checked for and penalty: not
                temporary residence registration;
                expiration of temporary residence or temporary residence registration.</i></p>
    </li>
    <li>
        <p>Khi cần sửa chữa cải tạo Căn hộ phải được sự đồng ý trước bằng văn bản của Bên A và sự chấp thuận của Công ty
            LD
            Phú Mỹ Hưng.</p>
        <p class="bold"><i>Get the prior consent of Party A in written and permission of Phu My Hung Co.Ltd, should
                Party B wish
                to any repair at the Premises.</i></p>
    </li>
    <li>
        <p>Chịu trách nhiệm sửa chữa và đền bù cho Bên A hư hỏng, mất mát các tài sản, trang thiết bị được trang bị
            trong Căn
            hộ. Chịu trách nhiệm đối với các tổn thất, thiệt hại gây ra cho Bên A trong quá trình sử dụng Căn hộ (ngoại
            trừ
            trường hợp hư hỏng từ kết cấu bão, lũ, thiên tai...).</p>
        <p class="bold"><i>Be responsible for any damage to or loss of Party A’s assets, equipments, and be
                responsible for any
                damage caused, willfully or negligently, to any third party arising from Party B use of the Apartment
                (Except for structural damage from storms, floods and natural disasters...).</i></p>
    </li>
    <li>
        <p>Thực hiện về các quy định về phòng cháy, chữa cháy.</p>
        <p class="bold"><i>To implement the stipulations on fire protection and fire fighting.</i></p>
    </li>
    <li>
        <p>Gìn giữ Căn hộ luôn sạch, đẹp, sửa chửa kịp các trang thiết bị, máy móc bị hư hỏng trong quá trình sử dụng
            Căn hộ
            do lỗi của Bên B.</p>
        <p class="bold"><i>Keep the Premises in good, clean and proper repair and properly preserved Party A’s
                equipments, fit
                out during the term of this Lease if by Party B fault.</i></p>
    </li>
    <li>
        <p>Bàn giao nhà và trang thiết bị nội thất trong tình trạng hoạt động bình thường và nguyên vẹn như lúc nhận
            (ngoại
            trừ những hao mòn tự nhiên) cho Bên A khi hết hạn hợp đồng. Nếu có hư hỏng nào Bên A sẽ trừ vào tiền đặt
            cọc.</p>
        <p class="bold"><i>To return the house and interior furniture to Party A on usual condition of operation and
                undamaged
                (except the natural attrition) for Party A when the contract has expired. If there is any heavily broken
                interior,
                the owner can ask for being repaired or minus into the deposit.</i></p>
    </li>
</ul><br>
<p class="mt under"><span class="bold ">ĐIỀU 5: CAM KẾTCHUNG/ <i>Committement of the two parties</i></span></p>
<p><span class="bold">5.1 </span><span>Thực hiện đúng các điều khoản đã thoả thuận trong hợp đồng này</span></p>
<p class="bold"> <i>Parties shall strictly carry out the terms and conditions set forth in this lease contract.</i>
</p><br>
<p><span class="bold">5.2 </span><span>Trường hợp có tranh chấp hoặc có một bên vi phạm hợp đồng thì cùng nhau bàn bạc
        thống nhất trên tinh thần hòa giải. Nếu không giải quyết được thì yêu cầu tòa án có thẩm quyền xét xử theo quy
        định của luật pháp Việt Nam.</span></p>
<p class="bold"><i>In the event a dispute arises in connection with this Agreement, both parties shall attempt to
        revolve
        such a dispute through friendly consultations. If no settlement can be reached through friendly consultations,
        the dispute shall be settled by the competent court in acordance with the Vietnamse Laws and Regulations.</i>
</p>
<p class="mt under"><span class="bold ">ĐIỀU 6 : CHẤM DỨT HỢP ĐỒNG/ Termination of Contract</span></p>
<p><span class="bold">6.1 </span><span>Hợp đồng chấm dứt trong các trường hợp sau:</span></p>
<p class="bold">The lease contract shall be terminated in the following cases:</p>
<ul>
    <li>
        <p>Hết hạn hợp đồng.</p>
        <p class="bold"><i>The contract is expired.<i></p>
    </li>
    <li>
        <p>Căn hộ cho thuê bị ảnh hưởng thiên tai (bão, lũ, động đất…) hoặc phá dỡ theo quyết định của cơ quan có thẩm
            quyền.</p>
        <p class="bold"><i>The Apartment have been impacted by Force majeure case (storms, floods, earthquakes) or
                demolished by
                orders of authorised government bodies.</i></p>
    </li>
</ul><br>

<p><span class="bold">6.2 </span><span>Bên A có quyền đơn phương chấm dứt Hợp đồng trước thời hạn, thu hồi Căn hộ và
        yêu cầu Bên B bồi thường thiệt hại trong trường hợp Bên B có một trong những hành vi sau:</span></p>
<p class="bold"><i>Party A shall be entitled to unilaterally suspend its performancethe contract,
        re-enter the Premises and demand compensation for any damage when Party B commits one of the following acts:</i>
</p>
<ul>
    <li>
        <p>Trễ hạn thanh toán quá 10 ngày.</p>
        <p class="bold"><i>Failing to pay rent or any amount due for 10 days after becoming due.</i></p>
    </li>
    <li>
        <p>Sử dụng Căn hộ không đúng mục đích thuê.</p>
        <p class="bold"><i>Not using the Apartment in accordance with the purpose as specified in Article 1 herein.<i>
        </p>
    </li>
    <li>
        <p>Sửa chữa thay đổi thiết kế Căn hộ khi chưa được sự Bên A chấp thuận trước bằng văn bản.</p>
        <p class="bold"><i>Repairing, changing the design of the Apartment without prior consent of Party A in
                written.</i></p>
    </li>
    <li>
        <p>Chuyển nhượng Hợp đồng, hoặc cho thuê lại Căn hộ mà không có sự đồng ý trước bằng văn bản của Bên A.</p>
        <p class="bold"><i>Transferring the Contract or subleasing the Apartment without prior written consent of
                Party A.</i></p>
    </li>
    <li>
        <p>Vi phạm luật pháp Việt Nam.</p>
        <p class="bold"><i>Infringing the Vietnam Laws and Regulations.</i></p>
    </li>
    <li>
        <p>Trong trường hợp này Bên B sẽ mất toàn bộ số tiền cọc</p>
        <p class="bold"><i>In this case party B lost all deposit</i></p>
    </li>
    <li>
        <p>Điều khoản thỏa thuận riêng <span class="bold">/ <i>Additional terms of agreement</i></span>:
            <br> {{ $data->rental_condition }}
        </p>
    </li>
</ul><br>
<p class="mt">Hợp đồng thuê Căn hộ này có hiệu lực kể từ ngày hai bên ký kết, được lập thành 03 (ba) bản
    và bằng 02 thứ tiếng có giá trị như nhau, Mỗi bên giữ 01 bản có giá trị như nhau.</p>
<p class="bold"><i>This Lease Contract shall become effective on signing date, and is made in three (03) original
        copies in both two (02) languages, each party keep one copy. Have same value.</i></p>
<table class="mt break-page-auto" style="margin-bottom: 100px">
    <tbody>
        <tr>
            <td style="width: 50%;" class="text-center">Bên A/<span class="bold"><i>The Landlord (Party A)</i></span>
            </td>
            <td style="width: 50%;" class="text-center">Bên B/<span class="bold"><i>The Tenant (Party B)</i></span>
            </td>
        </tr>
    </tbody>
</table>
<table>
    <tbody>
        <tr>
            <td style="width: 100%;" class="text-center">Bên C/<span class="bold"><i>The Written (Party
                        C)</i></span></td>
        </tr>
    </tbody>
</table>
<div class="break-page">
    <p class="text-center"><span class="bold">BIÊN NHẬN THANH TOÁN</span></p>
    <p class="text-center"><span class="bold"><i>RECEIPT OF PAYMENT</i></span></p><br>
    <p class="text-center">Địa chỉ căn hộ/add:</p><br>
    <p class="text-center">................</p>
    <table class="table-3col tb-bordered mt">
        <tbody>
            <tr>
                <td>Ngày/<span class="bold"><i>Date</i></span></td>
                <td>Ngày.........</td>
                <td>Ngày.........</td>
            </tr>
            <tr>
                <td>Số tiền thanh toán<br><span class="bold"><i>Amount</i></span></td>
                <td>
                    <span class="bold">……………… VND
                        (tương đương ………… USD)</span>

                </td>
                <td>
                    <span class="bold">…………….. VND
                        (tương đương ……..USD)</span>
                </td>
            </tr>
            <tr>
                <td>Về khoản<br><span class="bold"><i>For</i></span></td>
                <td>Thanh toán ……… tháng tiền cọc
                    <br>
                    <span class="bold"><i>Payment of ……. months deposit</i></span>
                </td>
                <td>
                    Thanh toán …. tháng tiền nhà đợt đầu tiên
                    <br>
                    <span class="bold"><i>Payment of …..month frist rental cost.</i></span>

                </td>
            </tr>
            <tr>
                <td>Bên thuê xác nhận đã giao tiền<br><span class="bold"><i>Signed by Party A <i></span></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Bên cho thuê xác nhận đã nhận tiền <br><span class="bold"><i>Signed by Party B</i></span></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Bên Làm Chứng xác nhận chứng kiến <br><span class="bold"><i> Signed by Party witness</i></span>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Ghi chú <br><span class="bold"><i>Remarks</i></span></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
@include('admin.contract.pdf.footer')
