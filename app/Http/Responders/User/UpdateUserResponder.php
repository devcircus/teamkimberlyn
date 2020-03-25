<?php

namespace App\Http\Responders\User;

use PerfectOblivion\ActionServiceResponder\Responders\Responder;

class UpdateUserResponder extends Responder
{
    /**
     * Send a response.
     *
     * @return mixed
     */
    public function respond()
    {
        flash('success', 'User successfully updated!');

        return redirect()->back(303);
    }
}
