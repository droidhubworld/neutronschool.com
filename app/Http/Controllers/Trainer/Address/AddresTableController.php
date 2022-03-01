<?php

namespace App\Http\Controllers\Trainer\Address;

use App\Http\Controllers\Controller;
use App\Repositories\Trainer\Address\AddressRepository;
use App\Http\Requests\Trainer\Address\ManageAddressRequest;

use Yajra\DataTables\Facades\DataTables;

class AddresTableController extends Controller
{
   /**
     * @var \App\Http\Requests\Trainer\Address\AddressRepository
     */
    protected $repository;

    /**
     * @param \App\Http\Requests\Trainer\Address\AddressRepository $repository
     */
    public function __construct(AddressRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Http\Requests\Trainer\Address\ManageAddressRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageAddressRequest $request)
    {
//dd($request);

        return Datatables::of($this->repository->getForDataTable())
        ->filterColumn('status', function ($query, $keyword) {
            if (in_array(strtolower($keyword), ['active', 'inactive'])) {
                $query->where('address.status', (strtolower($keyword) == 'active') ? 1 : 0);
            }
        })
        ->filterColumn('created_by', function ($query, $keyword) {
            $query->whereRaw('address.post_code like ?', ["%{$keyword}%"]);
        })
        ->editColumn('status', function ($address) {
            return $address->status_label;
        })
        ->editColumn('created_at', function ($address) {
            
            return $address->created_at->toDateString();
        })
        ->addColumn('actions', function ($address) {
            
            return $address->action_buttons;
        })
        ->escapeColumns(['title'])
        ->make(true);
    }
}
