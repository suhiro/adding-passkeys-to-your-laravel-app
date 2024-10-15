<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Webauthn\PublicKeyCredentialCreationOptions;
use Webauthn\PublicKeyCredentialRpEntity;
use Webauthn\PublicKeyCredentialUserEntity;

class PasskeyController extends Controller
{
    public function registerOptions(Request $request)
    {
        $options = new PublicKeyCredentialCreationOptions(
            rp: new PublicKeyCredentialRpEntity(
                name:config('app.name'),
                id:parse_url(config('app.url'),PHP_URL_HOST),
            ),
           challenge: Str::random(),
           user: new PublicKeyCredentialUserEntity(
            id:$request->user()->id,
            name:$request->user()->email,
            displayName:$request->user()->name,
           )
        );
        return response()->json($options);
    }
}
