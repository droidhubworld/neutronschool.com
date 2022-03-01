<?php

namespace App\Http\Controllers\Trainer\Address;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Trainer\Address\AddressRequest;
use App\Http\Requests\Trainer\Address\ManageAddressRequest;
use App\Http\Requests\Trainer\Address\DeleteAddressRequest;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Address;
use App\Repositories\Trainer\Address\AddressRepository;
use Illuminate\Support\Facades\View;

class AddressController extends Controller
{
      /**
     * @var \App\Repositories\Trainer\Address\AddressRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Trainer\Address\AddressRepository $repository
     */
    public function __construct(AddressRepository $repository)
    {
        $this->repository = $repository;
        View::share('js', ['address']);
    }

    /**
     * @param \App\Http\Requests\Common\ManageAddressRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageAddressRequest $request)
    {
        return new ViewResponse('trainer.profile.address_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

   /**
     * @param \App\Http\Requests\Common\AddressRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(AddressRequest $request)
    {
        $this->repository->create($request->except(['_token', '_method']));

        return new RedirectResponse(route('trainer.address.index'), ['flash_success' => __('alerts.backend.pages.created')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param \App\Http\Requests\Common\DeleteAddressRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Address $address, DeleteAddressRequest $request)
    {
        $this->repository->delete($address);

        return new RedirectResponse(route('trainer.address.index'), ['flash_success' => __('alerts.backend.pages.deleted')]);
    }

    /**
     * @param AddressRequest $request
     *
     * @throws \App\Exceptions\GeneralException
     * @return mixed
     */
    public function save(AddressRequest $request)
    {

        $output = $this->repository->create(
            $request->user(),
            $request->only('address1', 'address2', 'city', 'state', 'post_code', 'country_id', 'lat', 'lng')
        );
      
        // return redirect()->route('trainer.myaccount.setting')->withFlashSuccess(__('strings.address.profile_added'));
      
        return new RedirectResponse(route('trainer.myaccount.setting'), ['flash_success' => __('alerts.backend.pages.created')]);
    }
}
