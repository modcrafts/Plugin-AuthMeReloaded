<form action="{{ route('authme.click2login') }}" method="GET">
    <div class="mb-3">
        <label class="form-label">@lang('authme::messages.click2login.info')</label><br>
        <label class="form-label">{{ trans('authme::messages.click2login.status.info') }}</label> 
        @if($user->authme_hasSession == 1)
            @if($user->authme_last_login_at + 7200000 > time()*1000 && $user->last_login_ip == Request::ip())
                <font color="#1cbb8c"> {{ trans('authme::messages.click2login.status.vaild') }}{{ trans('authme::messages.click2login.status.expire-date', ['date' => format_date_compact(Carbon\Carbon::parse(($user->authme_last_login_at + 7200000) / 1000))]) }} </font>
            @elseif($user->last_login_ip != Request::ip() && $user->authme_last_login_at + 7200000 > time()*1000)
                <font color="#1cbb8c"> {{ trans('authme::messages.click2login.status.vaild') }} </font><font color="#dc3545">{{ trans('authme::messages.click2login.status.unavailable') }}</font>
            @else
                <font color="#dc3545"> {{ trans('authme::messages.click2login.status.expired') }} </font>
            @endif
        @else
            <font color="#dc3545"> {{ trans('authme::messages.click2login.status.invaild') }} </font>
        @endif
    </div>
    @csrf
    @if($user->authme_hasSession == 0 || $user->authme_last_login_at + 7200000 < time()*1000)
    <button type="submit" class="btn btn-primary">
        <i class="bi bi-box-arrow-in-right"></i> {{ trans('authme::messages.click2login.actions.login') }}
    </button>
    @else 
    <button type="submit" class="btn btn-danger" name="unlogin">
        <i class="bi bi-clipboard-x"></i> {{ trans('authme::messages.click2login.actions.unlogin') }}
    </button>
    <button type="submit" class="btn btn-secondary" name="renew">
        <i class="bi bi-arrow-repeat"></i> {{ trans('authme::messages.click2login.actions.renew') }}
    </button>
    @endif
</form>