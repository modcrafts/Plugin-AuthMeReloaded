<?php

namespace Azuriom\Plugin\Authme\Controllers;

use Azuriom\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function click2login(Request $request)
    {
        $user = $request->user();
        if (isset($request['renew']) || $user->authme_hasSession == 0 || $user->authme_last_login_at < time() * 1000 - 7200000) {
            $user->forceFill([
                'authme_hasSession'    => 1,
                'authme_last_login_at' => time() * 1000,
                'last_login_ip'        => $request->ip(),
            ])->save();

            return redirect()->back()->with('success', trans('authme::messages.click2login.success'));
        } elseif (isset($request['unlogin'])) {
            $user->forceFill([
                'authme_hasSession' => 0,
            ])->save();

            return redirect()->back()->with('success', trans('authme::messages.click2login.cancelled'));
        }

        return redirect()->back()->with('success', trans('authme::messages.click2login.exist'));
    }
}
