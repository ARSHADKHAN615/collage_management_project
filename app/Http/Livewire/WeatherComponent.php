<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
class WeatherComponent extends Component
{
    public $locationName;
    public $Temp;
    public $image;
    public $localtime;

    public function getWeather()
    {
        $this->clientIP = Request::getClientIp(true);
        $response = Http::get('http://api.weatherapi.com/v1/current.json?key=6a8bf500e522454f967112501221303&q='.$this->clientIP.'&aqi=yes')->collect();
        $this->locationName = $response['location']['name'];
        $this->Temp =  $response['current']['temp_c'];
        $this->localtime = Carbon::parse($response['location']['localtime'])->isoFormat('lll');
        $this->image =  $response['current']['condition']['icon'];
    }

    public function mount()
    {
        $this->getWeather();
    }
    public function updateWeather()
    {
        $this->getWeather();
        $this->dispatchBrowserEvent('toast', [
            'type' => 'success',
            'icon' => 'bx-check-circle',
            'message' => "Updated Successfully!"
        ]);
    }

    public function render()
    {
        return view('livewire.weather-component');
    }
}
