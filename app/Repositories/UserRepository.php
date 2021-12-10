<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function getUserBySocId(\Laravel\Socialite\Contracts\User $user,string $socName) {
        if ($user->email) {
            $userInSystem = User::query()
                ->where('email', $user->email)
                ->first();
        }
        else {
            $userInSystem = User::query()
                ->where('id_in_soc', $user->id)
                ->where('type_auth', $socName)
                ->first();
        }


        if (is_null($userInSystem)) {
            $userInSystem = new User();


            $userInSystem->fill([
                'name' => $user->getNickname() ?? '',
                'email' => $user->getEmail() ?? '',
                'password' => '',
                'id_in_soc' => $user->getId() ?? '',
                'type_auth' => $socName,
                'email_verified_at' => now(),
                'avatar' => $user->getAvatar() ?? '',

            ]);
            $userInSystem->save();
        }

        return $userInSystem;
    }
}
