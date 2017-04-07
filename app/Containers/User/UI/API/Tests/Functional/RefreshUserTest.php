<?php

namespace App\Containers\User\UI\API\Tests\Functional;

use App\Containers\User\Models\User;
use App\Containers\User\Tests\TestCase;

/**
 * Class RefreshUserTest.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class RefreshUserTest extends TestCase
{

    protected $endpoint = 'post@v1/users/{id}/refresh';

    protected $access = [
        'roles'       => '',
        'permissions' => 'refresh-users',
    ];

    public function testRefreshUserById_()
    {
        $user = $this->getTestingUser();

        // send the HTTP request
        $response = $this->injectId($user->id)->makeCall();

        // assert response status is correct
        $response->assertStatus(200);
    }

    public function testRefreshAnotherUserById_()
    {
        $anotherUser = factory(User::class)->create();

        // send the HTTP request
        $response = $this->injectId($anotherUser->id)->makeCall();

        // assert response status is correct
        $response->assertStatus(403);
    }

}
