<?php
return [
    [
        'title' => 'Dashboard',
        'routeName' => 'admin.dashboard',
        'iconClass' => 'nav-icon fas fa-tachometer-alt',
        'role' => [],
        'sub' => []
    ],
    [
        'title' => 'Quản lý danh mục',
        'routeName' => null,
        'iconClass' => 'fas fa-bahai nav-icon',
        'role' => [],
        'sub' => [
            [
                'title' => 'Thêm danh mục',
                'routeName' => 'admin.category.create',
                'iconClass' => 'far fa-circle nav-icon',
                'role' => [],
            ],
            [
                'title' => 'Danh sách danh mục',
                'routeName' => 'admin.category.index',
                'iconClass' => 'far fa-circle nav-icon',
                'role' => [],
            ]
        ]
    ],
    [
        'title' => 'Quản lý BĐS',
        'routeName' => null,
        'iconClass' => 'fas fa-home nav-icon',
        'role' => [],
        'sub' => [
            [
                'title' => 'Thêm BĐS',
                'routeName' => 'admin.land.create',
                'iconClass' => 'far fa-circle nav-icon',
                'role' => [],
            ],
            [
                'title' => 'Danh sách BĐS',
                'routeName' => 'admin.land.index',
                'iconClass' => 'far fa-circle nav-icon',
                'role' => [],
            ],
            [
                'title' => 'Thùng rác',
                'routeName' => 'admin.land.recyclebin.index',
                'iconClass' => 'far fa-circle nav-icon',
                'role' => [],
            ]
        ]
    ],
    [
        'title' => 'Quản lý tin tức',
        'routeName' => null,
        'iconClass' => 'far fa-newspaper nav-icon',
        'role' => [],
        'sub' => [
            [
                'title' => 'Thêm tin tức',
                'routeName' => 'admin.post.create',
                'iconClass' => 'far fa-circle nav-icon',
                'role' => [],
            ],
            [
                'title' => 'Danh sách tin tức',
                'routeName' => 'admin.post.index',
                'iconClass' => 'far fa-circle nav-icon',
                'role' => [],
            ]
        ]
    ],
    [
        'title' => 'Quản lý chủ nhà',
        'routeName' => null,
        'iconClass' => 'fas fa-house-user nav-icon',
        'role' => [],
        'sub' => [
            [
                'title' => 'Thêm chủ nhà',
                'routeName' => 'admin.houseowner.create',
                'iconClass' => 'far fa-circle nav-icon',
                'role' => [],
            ],
            [
                'title' => 'Danh sách chủ nhà',
                'routeName' => 'admin.houseowner.index',
                'iconClass' => 'far fa-circle nav-icon',
                'role' => [],
            ]
        ]
    ],
    [
        'title' => 'Quản lý khách hàng',
        'routeName' => null,
        'iconClass' => 'fas fa-users nav-icon',
        'role' => [],
        'sub' => [
            [
                'title' => 'Thêm khách hàng',
                'routeName' => 'admin.customer.create',
                'iconClass' => 'far fa-circle nav-icon',
                'role' => [],
            ],
            [
                'title' => 'Danh sách khách hàng',
                'routeName' => 'admin.customer.index',
                'iconClass' => 'far fa-circle nav-icon',
                'role' => [],
            ]
        ]
    ],
    [
        'title' => 'Quản lý hợp đồng',
        'routeName' => null,
        'iconClass' => 'fas fa-cog nav-icon',
        'role' => ['dev', 'admin','employee'],
        'sub' => [
            [
                'title' => 'Thêm Hợp đồng',
                'routeName' => 'admin.contract.create',
                'iconClass' => 'far fa-circle nav-icon',
                'role' => [],
            ],
            [
                'title' => 'Danh sách hợp đồng',
                'routeName' => 'admin.contract.index',
                'iconClass' => 'far fa-circle nav-icon',
                'role' => [],
            ]
        ]
    ],
    [
        'title' => 'Quản lý admin',
        'routeName' => null,
        'iconClass' => 'fas fa-user nav-icon',
        'role' => ['dev', 'admin'],
        'sub' => [
            [
                'title' => 'Thêm admin',
                'routeName' => 'admin.admin.create',
                'iconClass' => 'far fa-circle nav-icon',
                'role' => [],
            ],
            [
                'title' => 'Danh sách admin',
                'routeName' => 'admin.admin.index',
                'iconClass' => 'far fa-circle nav-icon',
                'role' => [],
            ]
        ]
    ],
];