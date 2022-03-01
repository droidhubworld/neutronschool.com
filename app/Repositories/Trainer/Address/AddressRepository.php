<?php

namespace App\Repositories\Trainer\Address;

use App\Models\Address;
use App\Repositories\BaseRepository;
use App\Models\Auth\User;
use DB;
use App\Events\Trainer\Address\AddressDeleted;
use App\Events\Trainer\Address\AddressCreated;
use App\Events\Trainer\Address\AddressUpdated;
use App\Exceptions\GeneralException;
/**
 * Class AddressRepository.
 */
class AddressRepository extends BaseRepository
{
      /**
     * Associated Repository Model.
     */
    const MODEL = Address::class;

   /**
     * Sortable.
     *
     * @var array
     */
    private $sortable = [
        'id',
        'user_id',
        'address1',
        'address2',
        'city',
        'state',
        'post_code',
        'country_id',
        'lat',
        'lng',
        'public',
        'primary',
        'billing',
        'shipping',
        'created_at',
        'updated_at',
    ];

    /**
     * Retrieve List.
     *
     * @var array
     * @return Collection
     */
    public function retrieveList(array $options = [])
    {
        $perPage = isset($options['per_page']) ? (int) $options['per_page'] : 20;
        $orderBy = isset($options['order_by']) && in_array($options['order_by'], $this->sortable) ? $options['order_by'] : 'created_at';
        $order = isset($options['order']) && in_array($options['order'], ['asc', 'desc']) ? $options['order'] : 'desc';
        $query = $this->query()
            ->orderBy($orderBy, $order);

        if ($perPage == -1) {
            return $query->get();
        }
        
        return $query->paginate($perPage);
    }
     /**
     * @return mixed
     */
    public function getForDataTable()
    {
        $data = $this->query()
            ->leftjoin('users', 'users.id', '=', 'address.user_id')
            ->select([
                'address.id',
                'address.address1',
                'address.city',
                'address.state',
                'address.post_code',
                'users.first_name as created_by',
                'address.created_at',
                'address.status',
            ]);
        return $data;
            //dd($data);
    }

    /**
     * @param User $user
     * @param array $data
     *
     * @throws \Exception
     * @throws \Throwable
     * @return \Illuminate\Database\Eloquent\Model|mixed
     */
    public function create(array $input)
    {
        if ($this->query()->where('address1', $input['address1'])->first()) {
            throw new GeneralException(__('exceptions.backend.pages.already_exists'));
        }

        $input['user_id'] = auth()->user()->id;
      
        if ($address = Address::create($input)) {
            event(new AddressCreated($address));

            return $address->fresh();
        }

        throw new GeneralException(__('exceptions.backend.pages.create_error'));
      
        // $address = $this->createAddressStub($user, $input);
        // DB::transaction(function () use ($address) {
        //     if ($address->save()) {   
        //         return true;
        //     }
        //     throw new GeneralException(__('exceptions.address.create_error'));
        // });
    }

    /**
     * Update Address.
     *
     * @param \App\Models\Address $address
     * @param array $input
     */
    public function update(Address $address, array $input)
    {
        if ($this->query()->where('address1', $input['address1'])->where('id', '!=', $address->id)->first()) {
            throw new GeneralException(__('exceptions.backend.pages.already_exists'));
        }

        $input['user_id'] = auth()->user()->id;

        if ($address->update($input)) {
            event(new AddressUpdated($address));

            return $address;
        }

        throw new GeneralException(
            __('exceptions.backend.pages.update_error')
        );
    }


 /**
     * @param \App\Models\Address $address
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Address $address)
    {
        if ($address->delete()) {
            event(new AddressDeleted($address));

            return true;
        }

        throw new GeneralException(__('exceptions.backend.pages.delete_error'));
    }
    
    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createAddressStub($user, $input)
    {
        $address = self::MODEL;
        $address = new $address();
        $address->address1 = $input['address1'];
        $address->address2 = $input['address2'];
        $address->city = $input['city'];
        $address->state = $input['state'];
        $address->post_code = $input['post_code'];
        $address->country_id = $input['country_id'];
        $address->lat = array_key_exists("lat", $input) ? $input['lat'] : null;
        $address->lng = array_key_exists("lng", $input) ? $input['lng'] : null;
        $address->user_id = $user->id;

        return $address;
    }
}