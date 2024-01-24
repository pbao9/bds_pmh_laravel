<?php

namespace App\Admin\Services\Land;
use Illuminate\Http\Request;

interface LandServiceInterface
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
     * Khôi phục
     * 
     * @param int $id
     * 
     * @return boolean
     */
    public function restore($id);
    /**
     * Xóa
     *  
     * @param int $id
     * 
     * @return boolean
     */
    public function destroy($id);
    /**
     * Xóa vĩnh viễn
     *  
     * @param int $id
     * 
     * @return boolean
     */
    public function delete($id);
    /**
     * Cập nhật multi
     * 
     * @var Illuminate\Http\Request $request
     * 
     * @return boolean
     */
    public function actionMultipleRecode(Request $request);

}