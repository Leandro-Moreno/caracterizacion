@extends('layouts.app', ['activePage' => 'asistentes', 'titlePage' => __('asistentes')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{$evento->nombre}}</h4>
                <p class="card-category"> {{ __('Aquí puedes generar los certificados') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-6 text-left">
                    <div id="notifi" href="{{ url('certificado/asistentes/'.$evento->id)}} " class="btn btn-sm btn-success " >{{ __('Enviar notificación') }}</div>
                  </div>
                  @push('js')
                  <script type="text/javascript">
                    console.log("hola");
              $("#notifi").click(function(e){
                Swal.fire(
'Las notificaciones se están enviando',
'Espera dos segundos...',
'success'
);
e.preventDefault();
        window.location = "{{ url('certificado/asistentes/'.$evento->id)}}";
                });

  </script>
  @endpush
                  <div class="col-6 text-right">
                    <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#asistentesAdd">{{ __('Añadir asistente') }}</a>
                    <a href="{{ route('asistentes') }}" class="btn btn-sm btn-primary">{{ __('Volver a la lista') }}</a>
                  </div>
                </div>
                <div class="modal fade bd-example-modal-lg" id="asistentesAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="asistentesAddLabel">Añadir asistente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <span class="bmd-form-group">
                          <div class="input-group no-border">
                          <input type="email" value="" class="form-control" placeholder="Buscar por correo" id="correoBuscar">
                          <button type="button" class="btn btn-white btn-round btn-just-icon" id="buscarAsistente">
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                          </button>
                          </div>
                        </span>

                        <form action="{{url('add/asistenteexistente/'.$evento->id)}}" method="post" style="display: none;" id="formAsistenteExistente">
                          @csrf
                          <small class="form-text text-muted" style="color: blue!important;" >Resultado:</small>
                          <input type="text" class="form-control" id="InputnombreCompleto" aria-describedby="nameHelp" disabled>
                          <input type="text" class="form-control" id="InputCorreo" aria-describedby="nameHelp" disabled>
                          <input type="hidden" id="Inputid" name="usuario" >
                          <div class="modal-footer">

                              <button type="submit" class="btn btn-primary">Añadir asistente</button>
                          </div>
                        </form>
                        <form action="{{url('add/asistentes/'.$evento->id)}}" method="post" style="display: none;" id="formAsistente" >
                          @csrf
                           <small class="form-text text-muted" style="color: red!important;" >Correo no encontrado, Ingrese nuevos datos</small>
                           <div class="form-row">
                           <div class="col">
                             <input type="email" class="form-control" id="Inputemail" aria-describedby="emailHelp" placeholder="Confirmar correo" name="email">
                           </div>
                           </div>
                          <div class="form-row">
                           <div class="col">
                             <input type="text" class="form-control" id="Inputname" aria-describedby="nameHelp" placeholder="Primer nombre" name="name">
                           </div>
                           <div class="col">
                             <input type="text" class="form-control" id="Inputname2" aria-describedby="name2Help" placeholder="Segundo nombre" name="name2">
                           </div>
                           <div class="col">
                             <input type="text" class="form-control" id="Inputapellido" aria-describedby="apellidoHelp" placeholder="Segundo apellido" name="apellido">
                           </div>
                           </div>
                           <div class="form-row">
                             <div class="col">
                               <input type="text" class="form-control" id="Inputapellido2" aria-describedby="apellido2Help" placeholder="Segundo apellido" name="apellido2">
                             </div>
                             <div class="col">
                               <input type="text" class="form-control" id="Inputtipo_doc" aria-describedby="tipo_docHelp" placeholder="Tipo documento" name="tipo_doc">
                             </div>
                           <div class="col">
                             <input type="text" class="form-control" id="Inputdocumento" aria-describedby="documentoHelp" placeholder="Documento" name="documento">
                           </div>
                         </div>
                         <div class="form-row">
                           <div class="col">
                             <input type="text" class="form-control" id="Inputprofesion" aria-describedby="profesionHelp" placeholder="Profesión" name="profesion">
                           </div>
                           <div class="col">
                             <input type="text" class="form-control" id="Inputcargo" aria-describedby="cargoHelp" placeholder="Cargo" name="cargo">
                           </div>
                           <div class="col">
                             <input type="number" class="form-control" id="Inputcelular" aria-describedby="celularHelp" placeholder="Celular" name="celular">
                           </div>
                         </div>
                         <div class="form-row">
                           <div class="col">
                             <input type="text" class="form-control" id="Inputtipo_persona" aria-describedby="tipo_personaHelp" placeholder="Tipo persona" name="tipo_persona">
                           </div>
                           <div class="col">
                             <input type="text" class="form-control" id="Inputasistencia_minima" aria-describedby="asistencia_minimaHelp" placeholder="Asistencia minima" name="asistencia_minima">
                           </div>
                           <div class="col">
                             <input type="text" class="form-control" id="Inputdireccion" aria-describedby="direccionHelp" placeholder="Dirección" name="direccion">
                           </div>
                           <div class="col">
                             <input type="text" class="form-control" id="Inputmedio" aria-describedby="medioHelp" placeholder="Medio" name="medio">
                           </div>
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                             <button type="submit" class="btn btn-primary">Añadir asistente</button>
                           </div>
                         </div>
                         <!-- <div class="form-row">
                           <label class="col-form-label">Acepta uso de imagen</label>
                           <div class="togglebutton">
                              <label>
                                <input name="uso_datos" type="checkbox" checked="" value="1">
                                <span class="toggle"></span>
                              </label>
                            </div>
                        </div> -->
                      </div>

                      </form>
                    </div>
                  </div>

                </div>
                <div class="table-responsive">
                  <table class="table table-striped w-auto">
                    <thead class=" text-primary">
                      <th scope="col">
                          {{ __('Nombres') }}
                      </th>
                      <th scope="col">
                          {{ __('Apellidos') }}
                      </th>
                      <th scope="col">
                          {{ __('Correo') }}
                      </th>
                      <th scope="col">
                          {{ __('Documento') }}
                      </th>
                      <th scope="col" class="text-right">
                        {{ __('Asistentes') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($datos as $dato)
                        <tr>
                          <td>
                            {{ $dato->usuarios->name }} {{ $dato->usuarios->name2 }}
                          </td>
                          <td>
                            {{ $dato->usuarios->apellido }} {{ $dato->usuarios->apellido2 }}
                          </td>
                          <td>
                            {{ $dato->usuarios->email }}
                          </td>
                          <td>
                            {{ $dato->usuarios->tipo_doc }} {{ $dato->usuarios->documento }}
                          </td>
                          <td class="td-actions text-right">
                              <a rel="tooltip" class="btn btn-danger btn-link" href="{{ url('certificados/'.$dato->evento_id.'/'. $dato->user_id) }}" data-original-title="" title="">
                                <i class="material-icons">picture_as_pdf</i> DESCARGAR
                                <div class="ripple-container"></div>
                              </a>
                              <form action="{{ route('asistentes.destroy', $dato) }}" method="post" style="display: inline;">
                                  @csrf
                                  @method('delete')
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("¿Estás seguro de que deseas eliminar a este usuario?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  @push('js')
  <script type="text/javascript">

  $("#correoBuscar").on('input',function(e){
      var correo = $("#correoBuscar").val();
      var csrftoken= "{{ csrf_token() }}";

      $.get("{{ url('find/asistentes')}}", {correo: correo, _token: csrftoken}, function(result){
        if (result.respuesta == 0) {
          $( "#formAsistente" ).show("slow");
          $( "#formAsistenteExistente" ).hide();
        }
        if (result.respuesta !== 0) {
          $( "#InputnombreCompleto" ).val(result.name.concat(" ",result.apellido!=null?result.apellido:""));
          $( "#InputCorreo" ).val(result.email);
          $( "#Inputid" ).val(result.id);
          $( "#formAsistenteExistente" ).show("slow");
          $( "#formAsistente" ).hide();
        }

      });
    });

  </script>
  @endpush
@endsection
