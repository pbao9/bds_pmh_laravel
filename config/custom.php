<?php

return [
    'storage' => [
        'disk' => 'uploads'
    ],
    'images' => [
        'default' => '/public/images/default-image.png',
        'favicon' => '/public/images/logo.png',
        'logo' => '/public/images/logo.png',
        'avatar' => '/public/images/avatar5.png',
    ],
    'admin' => [
        'role' => [
            'dev' => 'Admin Dev',
            'admin' => 'Admin',
            'employee' => 'Nhân viên'
        ]
    ],
    'house_owner' => [
        'purpose' => ['Đang ở', 'Thuê', 'Bán', 'Đang cho thuê']
    ],
    'category' => [
        'status' => [
            1 => 'Hiện', 
            0 => 'Ẩn'
        ]
    ],
    'land' => [
        'type' => [
            'Nhà đất', 'Biệt thự', 'Căn hộ chung cư'
        ],
        'purpose' => [
            'can-ban' => 'Cần bán',
            'cho-thue' => 'Cho thuê'
        ],
        'status' => [
            'Trống', 'Đã thuê', 'Đã bán'
        ],
        'furniture' => [
            'Có', 'Không'
        ],
        'door_direction' => [
            'Đông', 'Tây', 'Nam', 'Bắc'
        ],
        'currency' => [
            'vnđ'
        ]
    ],
    'post' => [
        'status' => [
            1 => 'Hiện', 
            2 => 'Ẩn'
        ],
     ],
    'contract' => [
        'type' => [
            1 => [ 
                'name' => 'Hợp đồng cho thuê Việt - Việt',
                'form_type' => 1,
                'view' => 'admin.contract.pdf.contract_rental_vn',
                ],
            2 => [ 
                'name' => 'Hợp đồng cho thuê Hàn - Việt',
                'form_type' => 1,
                'view' => '',
                ],
            3 => [ 
                'name' => 'Hợp đồng cho thuê Anh - Việt',
                'form_type' => 1,
                'view' => '',
                ],
            4 => [ 
                'name' => 'Hợp đồng bán không bao gồm thuế',
                'form_type' => 2,
                'view' => '',
                ],
            5 => [ 
                'name' => 'Hợp đồng bán bao gồm thuế',
                'form_type' => 2,
                'view' => '',
                ],
        ],
        'pdf_view' => [
            1 => 'admin.contract.pdf.vn_vn',
            2 => 'admin.contract.pdf.kr_kr',
            3 => 'admin.contract.pdf.vn_en',
            4 => 'admin.contract.pdf.no_tax',
            5 => 'admin.contract.pdf.tax'
        ]

    ],
];
