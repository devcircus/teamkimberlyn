<?php

namespace App\Http\Responders\User;

use PerfectOblivion\ActionServiceResponder\Responders\Responder;

class DeleteUserResponder extends Responder
{
    /**
     * Send a response.
     *
     * @return mixed
     */
    public function respond()
    {
        flash('success', 'User deleted!');

        return redirect()->back(303);
    }
}
