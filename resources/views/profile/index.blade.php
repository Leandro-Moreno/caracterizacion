@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Profile')])
@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
         <div style="margin-top: 150px;"  class="card">
            <div class="card-header card-header-primary">
               <h4 class="card-title ">{{ __('Perfil de Empleado') }}</h4>
            </div>
            @if (session('status'))
            <div class="alert alert-success">
               {{ session('status') }}
            </div>
            @endif
            <div class="card-body  text-center">
               <img style="width: 150px;" src="/imagenescarcterizacion/avatar.jpg" alt="{{ $user->name }}" class="user-avatar">
               <dl class="user-info">
                  <dt>
                     Nombre de Empleado 
                  </dt>
                  <dd>
                     {{ $user->name }}
                  </dd>
                  <dt>
                     Nombre completo
                  </dt>
                  <dd>
                     {{ $user->name}} {{ $user->apellido}} 
                  </dd>
                  <dt>
                     Email
                  </dt>
                  <dd>
                     {{ $user->email }}
                  </dd>
               </dl>
               <div  class="col-12 text-center">
                  <a href="{{ route('profile.edit' , $user) }}" class="btn btn-sm btn-primary">{{ __('Editar  Pefil') }}</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection