<?php

if (!function_exists('getCategoryStatus')) {
    function getCategoryStatus($status)
    {
        return config('custom.category.status')[$status] ?? '';
    }
}
if (!function_exists('getLandPurpose')) {
    function getLandPurpose($purpose)
    {
        return config('custom.land.purpose')[$purpose] ?? '';
    }
}
if (!function_exists('getAllRoleAdmin')) {
    function getAllRoleAdmin($role)
    {
        return config('custom.admin.role')[$role];
    }
}

if (!function_exists('getRoleName')) {
    function getRoleName($role)
    {
        return config('custom.user.role')[$role];
    }
}

if (!function_exists('selected')) {
    function selected($value1, $value2){
        if($value1 == $value2){
            return 'selected';
        }
        return;
    }
}

if (!function_exists('checked')) {
    function checked($value1, $value2){
        if($value1 == $value2){
            return 'checked';
        }
        return;
    }
}

if (!function_exists('showRole')) {
    function showRole($value, $option = 'user'){
        $type = config("custom.{$option}.role");
        return $type[$value];
    }
}

if (!function_exists('status')) {
    function status($value){
        if($value == 1){
            return '<span class="badge badge-success">Hiện</span>';
        }
        return '<span class="badge badge-secondary">Ẩn</span>';

    }
}

if (!function_exists('getConfigLogo')) {
    function getConfigLogo(){
        
        return config('custom.images.logo') ?? '';

    }
}

if (!function_exists('getTypeContract')) {
    function getTypeContract($type = 1){
        $types = config('custom.contract.type');
        return $types[$type]['name'];

    }
}
