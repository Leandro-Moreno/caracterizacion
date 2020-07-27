@component('mail::message')
Cordial saludo, {{$nombreAsistente}}

Gracias por asistir a los Seminarios Virtuales de Excelencia de la Facultad de Ingeniería de la Universidad de los Andes.

Tu cuenta ya ha sido creada, para activar la cuenta debes restablecer la contraseña,
<?php
$url=url('/password/reset');
?>
@component('mail::button', ['url' => $url])
Activa tu cuenta AQUÍ
@endcomponent
<?php
$url=url('/login');
?>
Si ya tienes una cuenta activa,
@component('mail::button', ['url' => $url])
Descargue su certificado AQUÍ
@endcomponent

Atentamente,<br>
Facultad de Ingeniería<br>
Universidad de Los Andes<br>
Bogotá D.C., Colombia<br>
@endcomponent
