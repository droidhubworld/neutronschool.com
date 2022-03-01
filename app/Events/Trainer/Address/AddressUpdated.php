<?php

namespace App\Events\Trainer\Address;

use Illuminate\Queue\SerializesModels;

/**
 * Class AddressUpdated.
 */
class AddressUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $address;

    /**
     * @param $address
     */
    public function __construct($address)
    {
        $this->address = $address;
    }
}

