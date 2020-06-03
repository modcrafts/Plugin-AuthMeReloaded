@extends('admin.layouts.admin')

@section('title', 'Admin plugin home')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <p>Download AuthMeReloaded : https://www.spigotmc.org/resources/authmereloaded.6269/</p>
            <p>In your minecraft server, edit the config file <code>/plugins/AuthMe/config.yml</code> with the following</p>
            <code>
                backend: MYSQL <br>
                mySQLHost: {{config('database.connections.mysql.host')}} <br>
                mySQLPort: {{config('database.connections.mysql.port')}} <br>
                mySQLUsername: {{config('database.connections.mysql.username')}} <br>
                mySQLPassword: '{{config('database.connections.mysql.password')}}' <br>
                mySQLDatabase: {{config('database.connections.mysql.database')}} <br>
                mySQLTablename: users <br>
                mySQLColumnName: authme_username <br>
                mySQLRealName: name <br>
                mySQLColumnLogged: authme_isLogged <br>
                mySQLColumnHasSession: authme_hasSession <br>
                mySQLColumnLastLogin: authme_last_login_at <br>
                mySQLColumnRegisterDate: authme_created_at <br>
                mySQLtotpKey: google_2fa_secret <br>
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
                minPasswordLength: 8 <br>
                passwordHash: {{strtoupper(config('hashing.driver'))}} <br>
                secondArg: EMAIL_MANDATORY
            </code> <br>
            The connection with email in password with AuthMe is : <code>/register password email</code>
        </div>
    </div>
@endsection
