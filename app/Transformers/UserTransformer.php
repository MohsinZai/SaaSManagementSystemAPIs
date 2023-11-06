<?php

namespace App\Transformers;

use App\Http\Controllers\Admin\AdminController; 
use App\Models\User;
use League\Fractal\TransformerAbstract;


class UserTransformer extends TransformerAbstract {
    public function transform(User $user) {
        return [
            "id" => (int) $user->id,
        ];
    }
}