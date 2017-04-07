<?php

namespace App\Containers\User\Data\Repositories;

use App\Containers\User\Contracts\UserRepositoryInterface;
use App\Ship\Parents\Repositories\Repository;

/**
 * Class UserRepository.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UserRepository extends Repository implements UserRepositoryInterface
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'  => 'like',
        'id'    => '=',
        'email' => '=',
    ];

}
