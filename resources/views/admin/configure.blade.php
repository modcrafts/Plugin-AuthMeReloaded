@extends('admin.layouts.admin')

@section('title', trans('authme::admin.configure.title'))

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <p>@lang('authme::admin.configure.download')</p>
            <div class="mb-3">
                <label class="form-label" for="disablePermissions">{{ trans('authme::admin.configure.permissions-info') }}</label>
                    <code id="disablePermissions"><br>
                        authme.player.email.change <br>
                        authme.player.totpadd <br>
                        authme.player.totpremove <br>
                        authme.player.unregister <br>
                    </code>
            </div>
            <div class="mb-3">
                <p>@lang('authme::admin.configure.config-info')</p>
                <p style="color:#dc3545;font-size:20px;font-weight:bold">{{ trans('authme::admin.configure.sample-warn') }}</p>
                <code>
                    backend: MYSQL <br>
                    caching: false <br>
                    mySQLHost: {{config('database.connections.mysql.host')}} <br>
                    mySQLPort: {{config('database.connections.mysql.port')}} <br>
                    mySQLUsername: {{config('database.connections.mysql.username')}} <br>
                    mySQLPassword: 'password' <br>
                    mySQLDatabase: {{config('database.connections.mysql.database')}} <br>
                    mySQLTablename: users <br>
                    mySQLColumnId: id <br>
                    mySQLColumnName: authme_username <br>
                    mySQLRealName: name <br>
                    mySQLColumnPassword: password <br>
                    mySQLColumnSalt: '' <br>
                    mySQLColumnEmail: email <br>
                    mySQLColumnLogged: authme_isLogged <br>
                    mySQLColumnHasSession: authme_hasSession <br>
                    mySQLtotpKey: two_factor_secret <br>
                    mySQLColumnIp: last_login_ip <br>
                    mySQLColumnLastLogin: authme_last_login_at <br>
                    mySQLColumnRegisterDate: authme_created_at <br>
                    mySQLColumnRegisterIp: authme_regip <br>
                    mySQLlastlocX: authme_x <br>
                    mySQLlastlocY: authme_y <br>
                    mySQLlastlocZ: authme_z <br>
                    mySQLlastlocWorld: authme_world <br>
                    mySQLlastlocYaw: authme_yaw <br>
                    mySQLlastlocPitch: authme_pitch <br>
                    mySQLPlayerUUID: game_id <br>
<div style="white-space:pre">
ExternalBoardOptions:
    mySQLColumnGroup: authme_activated
    nonActivedUserGroup: 0
</div>
<div style="white-space:pre">
settings: 
    security: 
        passwordHash: {{strtoupper(config('hashing.driver'))}} 
    registration: 
        enabled: false 
                    </div>
                </code>
            </div>
        </div>
    </div>
@endsection
