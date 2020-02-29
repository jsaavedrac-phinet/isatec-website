<?php

namespace App\Http\View\Composers;

use App\Setting;
use Illuminate\View\View;

class SettingComposer
{
    protected $telefono;
    protected $direccion;
    protected $correo;
    protected $facebook;
    protected $youtube;
    protected $navegador;

    public function __construct()
    {
        $this->telefono = Setting::where('type','telefono')->first();
        $this->direccion = Setting::where('type','direccion')->first();
        $this->correo = Setting::where('type','correo')->first();
        $this->facebook = Setting::where('type','facebook')->first();
        $this->youtube = Setting::where('type','youtube')->first();

        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $this->navegador = "no-safari";
        if (stripos( $user_agent, 'Safari') !== false){
        $this->navegador = "Safari";
        }

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view
        ->with('telefono', $this->telefono)
        ->with('direccion', $this->direccion)
        ->with('correo', $this->correo)
        ->with('facebook', $this->facebook)
        ->with('youtube', $this->youtube)
        ->with('navegador', $this->navegador)
        ;
    }
}
