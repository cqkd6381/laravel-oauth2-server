<?php


namespace App\Transformer;


class UserTransformer extends Transformer
{
    /**
     * @param $user
     * @return array
     */
    public function transform($user)
    {

        return [
            'username' => $user['name'],
            'email' => $user['email'],
            'created_time' => $user['created_at'],
        ];
    }
}
