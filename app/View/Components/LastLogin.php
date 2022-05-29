<?php

namespace App\View\Components;

use Carbon\Carbon;
use Illuminate\View\Component;
use Rappasoft\LaravelAuthenticationLog\Models\AuthenticationLog;

class LastLogin extends Component
{
    public $lastLogin;
    public $lastLoginFromState;
    public $lastLoginFromCountry;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $data = AuthenticationLog::where(['authenticatable_id' => auth()->user()->id])->orderBy('id', 'desc')->get()->slice(1)->first();
        
        if (!$data) {
            $data = AuthenticationLog::where(['authenticatable_id' => auth()->user()->id])->orderBy('id', 'desc')->first();
        }
        $data->toArray();
        $this->lastLogin =  Carbon::parse($data['login_at'])->isoFormat('lll');
        $this->lastLoginFromState =  $data['location']['state_name'];
        $this->lastLoginFromCountry =  $data['location']['country'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.last-login');
    }
}
