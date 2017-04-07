<?php

namespace App\Ship\Features\Payment\Contracts;

/**
 * Interface ChargeableInterface.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
interface ChargeableInterface
{

    /**
     * @param $amount
     * @param $currency
     *
     * @return  mixed
     */
    public function charge($amount, $currency);
}
