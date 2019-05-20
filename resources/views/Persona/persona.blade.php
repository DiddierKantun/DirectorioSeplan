@extends('layout.admin')

@section('menubar')
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="{{ Route('welcome') }}" class="nav-link"><i class="fe fe-home"></i> Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ Route('sector.index') }}" class="nav-link"><i class="fe fe-file-text"></i> Sector</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ Route('dependencia.index') }}" class="nav-link"><i class="fe fe-file-text"></i> Dependencia</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ Route('persona.index') }}" class="nav-link"><i class="fe fe-users"></i> Personas</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ Route('enlace.index') }}" class="nav-link"><i class="fe fe-link-2"></i> Enlace</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ Route('usuario.index') }}" class="nav-link"><i class="fe fe-user"></i> Usuario</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
@stop

@section('contenido')
<div class="col-12">
                <form action="" method="" class="card">
                @csrf
                  <div class="card-header">
                  <h3 class="card-title">Gestion de personas</h3>
                  <a href="{{ Route('persona.create') }}" class="btn btn-success ml-auto">Nuevo</a>
                  </div>
                  
                   @if(Session::has('message'))
                  <div class="card-body">
                  <div class="alert alert-info">{{ Session::get('message') }}</div>
                  </div>
                  @endif

              </form>                    
            </div>


<div class="col-12">
                <div class="card">
                  <div class="table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"><table class="table card-table table-vcenter text-nowrap datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                      <thead>
                        <tr role="row">
                        <th class="w-1 sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Clave: activate to sort column descending" style="width: 45.28px;">Clave.</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 130.88px;">Cargo</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Titulo</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Nombre completo</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Correo institucional</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Correo personal</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Telefono institucional</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Telefono personal</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Fecha de nacimiento</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Notas</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Dependencia</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Tipo enlace</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Seleccion</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($personas as $persona)
                      <tr>
                      <th>{{ $persona->id_persona }}</th>
                      <th>{{ $persona->cargo_persona }}</th>
                      <th>{{ $persona->titulo_persona }}</th>
                      <th>{{ $persona->nombre_persona.' '.$persona->apepat_persona.' '.$persona->apemat_persona }}</th>
                      <th>{{ $persona->correo_institucional }}</th>
                      <th>{{ $persona->correo_personal }}</th>
                      <th>{{ $persona->tel_institucional }}</th>
                      <th>{{ $persona->tel_personal }}</th>
                      <th>{{ $persona->fecha_nac }}</th>
                      <th>{{ $persona->notas }}</th>
                      <th>{{ $persona->nombre_dependencia }}</th>
                      <th>{{ $persona->nombre_enlace }}</th>
                      <th>
                        <a href="{{ route('persona.edit', $persona->id_persona) }}" class="btn btn-warning ml-auto">Editar</a>
                        <a href="javascript: document.getElementById('delete-{{ $persona->id_persona }}').submit()" class="btn btn-danger ml-auto">Eliminar</a>
                            <form id="delete-{{ $persona->id_persona }}" action="{{ route('persona.destroy', $persona->id_persona) }}" method="POST">
                              @method('DELETE')
                              @csrf
                            </form>
                      </th>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
                    <script>
                      require(['datatables', 'jquery'], function(datatable, $) {
                      	    $('.datatable').DataTable();
                      	  });
                    </script>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="card">
                  <div class="table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"><table class="table card-table table-vcenter text-nowrap datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                      <thead>
                        <tr role="row">
                        <th class="w-1 sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Clave: activate to sort column descending" style="width: 45.28px;">Clave.</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 130.88px;">Cargo</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Titulo</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Nombre completo</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Correo institucional</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Correo personal</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Telefono institucional</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Telefono personal</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Fecha de nacimiento</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Notas</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Dependencia</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Tipo enlace</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Seleccion</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($per as $pers)
                      <tr>
                      <th>{{ $pers->id_persona }}</th>
                      <th>{{ $pers->cargo_persona }}</th>
                      <th>{{ $pers->titulo_persona }}</th>
                      <th>{{ $pers->nombre_persona.' '.$pers->apepat_persona.' '.$pers->apemat_persona }}</th>
                      <th>{{ $pers->correo_institucional }}</th>
                      <th>{{ $pers->correo_personal }}</th>
                      <th>{{ $pers->tel_institucional }}</th>
                      <th>{{ $pers->tel_personal }}</th>
                      <th>{{ $pers->fecha_nac }}</th>
                      <th>{{ $pers->notas }}</th>
                      <th>{{ $pers->nombre_dependencia }}</th>
                      <th>{{ $pers->nombre_enlace }}</th>
                      <th>
                      <a href="javascript: document.getElementById('update-{{ $pers->id_persona }}').submit()" class="btn btn-info ml-auto">Activar</a>
                            <form id="update-{{ $pers->id_persona }}" action="{{ route('persona.updatestatus', $pers->id_persona) }}" method="POST">                              
                             
                              @csrf
                            </form>
                      </th>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
@stop