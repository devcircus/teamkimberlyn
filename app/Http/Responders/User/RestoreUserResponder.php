<?php

namespace App\Http\Responders\User;

use PerfectOblivion\ActionServiceResponder\Responders\Responder;

class RestoreUserResponder extends Responder
{
    /**
     * Send a response.
     *
     * @return mixed
     */
    public function respond()
    {
        flash('success', 'User restored!');

        return redirect()->back(303);
    }
}
