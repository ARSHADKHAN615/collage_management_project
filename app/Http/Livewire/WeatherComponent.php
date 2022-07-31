<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Filament\Notifications\Notification;
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
        $this->clientIP = $this->clientIP == '127.0.0.1' ? '2402:3a80:8c8:59af:9595:1265:6c0d:a17d': $this->clientIP;
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
        Notification::make() 
        ->title('Saved successfully')
        ->success()
        ->icon('heroicon-o-badge-check')
        ->send();
    }

    public function render()
    {
        return view('livewire.weather-component');
    }
}
