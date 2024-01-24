<?php

namespace App\Admin\Services\Admin;
use Illuminate\Http\Request;

interface AdminServiceInterface
{
    /**
     * Tạo mới
     * 
     * @var Illuminate\Http\Request $request
     * 
     * @return mixed
     */
    public function store(Request $request);
    /**
     * Cập nhật
     * 
     * @var Illuminate\Http\Request $request
     * 
     * @return boolean
     */
    public function update(Request $request);
    /**
     * Cập nhật
     * 
     * @var Illuminate\Http\Request $request
     * 
     * @return array
     */
    public function moveCustomer(Request $request);
    /**
     * So sánh mật khẩu
     * 
     * @param string $password
     * @param string $password The password to encrypt
     * 
     * @return boolean
     */
    public function CheckSamePassword($password, $hashPassword);
    /**
     * Xóa
     *  
     * @param int $id
     * 
     * @return boolean
     */
    public function destroy($id);

}