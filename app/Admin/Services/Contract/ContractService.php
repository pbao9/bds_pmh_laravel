<?php

namespace App\Admin\Services\Contract;

use App\Admin\Services\Contract\ContractServiceInterface;
use  App\Repositories\Contract\ContractRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContractService implements ContractServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;
    /**
     * Current Object instance
     *
     * @var object|array|mixed
     */
    protected $instance;

    protected $repository;

    public function __construct(ContractRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {
        $this->data = $request->validated();

        // $dateFields = [
        //     'rental_date_create' => 'd/m/Y',
        //     'rental_owner_id_date' => 'd/m/Y',
        //     'rental_customer_id_date' => 'd/m/Y',
        //     'rental_time_start' => 'd/m/Y',
        //     'transfer_date_create' => 'd/m/Y',
        //     'transfer_owner_id_date' => 'd/m/Y',
        //     'transfer_customer_id_date' => 'd/m/Y',
        //     'transfer_land_certification_date' => 'd/m/Y',
        //     'transfer_payment1_date' => 'd/m/Y',
        //     'transfer_payment2_date' => 'd/m/Y',
        // ];

        // foreach ($dateFields as $field => $format) {
        //     if ($request->has($field)) {
        //         $value = $request->input($field);
        //         $date = \DateTime::createFromFormat($format, $value);
        //         if (!$date) {
        //             return response('Ngày tháng không hợp lệ, vui lòng nhập lại theo định dạng dd/mm/yyyy', 400);
        //         }
        //         $this->data[$field] = $date->format('Y-m-d');
        //     }
        // }

        return $this->repository->create($this->data);
    }

    public function update(Request $request)
    {

        $this->data = $request->validated();

        $dateFields = [
            'rental_date_create' => 'd/m/Y',
            'rental_owner_id_date' => 'd/m/Y',
            'rental_customer_id_date' => 'd/m/Y',
            'rental_time_start' => 'd/m/Y',

            'transfer_date_create' => 'd/m/Y',
            'transfer_owner_id_date' => 'd/m/Y',
            'transfer_customer_id_date' => 'd/m/Y',
            'transfer_land_certification_date' => 'd/m/Y',
            'transfer_payment1_date' => 'd/m/Y',
            'transfer_payment2_date' => 'd/m/Y',

        ];

        foreach ($dateFields as $field => $format) {
            if ($request->has($field)) {
                $value = $request->input($field);
                $date = Carbon::createFromFormat($format, $value);
                if (!$date || $date->format($format) != $value) {
                    return 'Ngày tháng không hợp lệ, vui lòng nhập lại theo định dạng dd/mm/yyyy';
                }
                $this->data[$field] = $date->format('Y-m-d');
            }
        }
        return $this->repository->update($this->data['id'], $this->data);
    }

    public function destroy($id)
    {

        return $this->repository->delete($id);
    }

    public function actionMultipleRecord(Request $request)
    {
        $this->data = $request->validated();
        if ($this->data['action'] == 'delete') {

            foreach ($this->data['id'] as $value) {
                $this->destroy($value);
            }
            return true;
        }

        return false;
    }
}
