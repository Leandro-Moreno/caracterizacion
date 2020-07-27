<?php

namespace App\Http\Controllers;

use App\Correo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Command;

class CorreoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $correo = Correo::first();
        return view('correo.index', compact('correo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Correo  $correo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Correo $correo)
    {
        $correo->host = $request->host;
        $correo->driver = $request->driver;
        $correo->port = $request->port;
        $correo->encryption = $request->encryption;
        $correo->username = $request->username;
        $correo->password = $request->password;
        $correo->address = $request->address;
        $correo->name = $request->name;
        $correo->save();

        $cambio=false;
        $this->setEnv('MAIL_HOST',$correo->host)?$cambio=true:false;
        $this->setEnv('MAIL_PORT',$correo->port)?$cambio=true:false;
        $this->setEnv('MAIL_USERNAME',$correo->username)?$cambio=true:false;
        $this->setEnv('MAIL_PASSWORD',$correo->password)?$cambio=true:false;
        $this->setEnv('MAIL_FROM_ADDRESS',$correo->username)?$cambio=true:false;
        $this->setEnv('FROM_ADDRESS',$correo->adress)?$cambio=true:false;
        $this->setEnv('MAIL_FROM_EMAIL',$correo->adress)?$cambio=true:false;
        $cambio?$this->actualizarEnv():false;
        return redirect()->route('correo')->withStatus(__('Usuario actualizado con éxito.'));
    }
    private function setEnv($key, $value)
    {
      // dd($key);
      if(env($key)!=$value){
        file_put_contents(app()->environmentFilePath(), str_replace(
          $key . '=' . env($key),
          $key . '=' . $value,
          file_get_contents(app()->environmentFilePath())
        ));
        return true;
      }
      return false;
    }
    private function actualizarEnv(){
      Artisan::call('config:clear');
    }
}
