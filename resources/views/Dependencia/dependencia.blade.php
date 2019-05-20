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
                  <h3 class="card-title">Gestion de dependencias</h3>
                  <a href="{{ Route('dependencia.create') }}" class="btn btn-success ml-auto">Nuevo</a>
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
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Sector</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Siglas</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 130.88px;">Dependencia</th>                       
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Direccion</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Referencias</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Estado</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Municipio</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Ciudad</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Seleccion</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($dependencias as $dep)
                      <tr>
                      <th>{{ $dep->id_dependencia }}</th>
                      <th>{{ $dep->nombre_sector }}</th>
                      <th>{{ $dep->siglas_dependencia }}</th>
                      <th>{{ $dep->nombre_dependencia }}</th>                      
                      <th>{{ $dep->calle_num.' '.$dep->cruzamientos.' '.$dep->colonia.' '.$dep->cp }}</th>
                      <th>{{ $dep->referencias }}</th>
                      <th>{{ $dep->estado }}</th>
                      <th>{{ $dep->municipio }}</th>
                      <th>{{ $dep->ciudad }}</th>                      
                      <th>
                      <a href="{{ Route('dependencia.edit', $dep->id_dependencia) }}" class="btn btn-warning ml-auto">Editar</a>
                      <a href="javascript: document.getElementById('delete-{{ $dep->id_dependencia }}').submit()" class="btn btn-danger ml-auto">Eliminar</a>
                            <form id="delete-{{ $dep->id_dependencia }}" action="{{ route('dependencia.destroy', $dep->id_dependencia) }}" method="POST">
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
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 130.88px;">Nombre</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Siglas</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Direccion</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Estado</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Municipio</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Ciudad</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Sector</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Accion</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($depe as $depen)
                      <tr>
                      <th>{{ $depen->id_dependencia }}</th>
                      <th>{{ $depen->nombre_dependencia }}</th>
                      <th>{{ $depen->siglas_dependencia }}</th>
                      <th>{{ $depen->calle_num.' '.$dep->cruzamientos.' '.$dep->colonia.' '.$dep->cp.' '.$dep->referencias }}</th>
                      <th>{{ $depen->estado }}</th>
                      <th>{{ $depen->municipio }}</th>
                      <th>{{ $depen->ciudad }}</th>
                      <th>{{ $depen->nombre_sector }}</th>
                      <th>
                        <a href="javascript: document.getElementById('update-{{ $depen->id_dependencia }}').submit()" class="btn btn-info ml-auto">Activar</a>
                            <form id="update-{{ $depen->id_dependencia }}" action="{{ route('dependencia.updatestatus', $depen->id_dependencia) }}" method="POST">                              
                             
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