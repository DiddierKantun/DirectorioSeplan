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
                  <h3 class="card-title">Gestion de enlaces</h3>
                  <a href="{{ Route('enlace.create') }}" class="btn btn-success ml-auto">Nuevo</a>
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
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 130.88px;">Nombre</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Accion</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($enlaces as $enlace)
                      <tr>
                      <th>{{ $enlace->id_tipoenlace }}</th>
                      <th>{{ $enlace->nombre_enlace }}</th>
                      <th>
                        <a href="{{ route('enlace.edit', $enlace->id_tipoenlace) }}" class="btn btn-warning ml-auto">Editar</a>
                        <a href="javascript: document.getElementById('delete-{{ $enlace->id_tipoenlace }}').submit()" class="btn btn-danger ml-auto">Eliminar</a>
                            <form id="delete-{{ $enlace->id_tipoenlace }}" action="{{ route('enlace.destroy', $enlace->id_tipoenlace) }}" method="POST">
                              @method('delete')
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

              <div class="col-12">
                <div class="card">
                  <div class="table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"><table class="table card-table table-vcenter text-nowrap datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                      <thead>
                        <tr role="row">
                        <th class="w-1 sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Clave: activate to sort column descending" style="width: 45.28px;">Clave.</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 130.88px;">Nombre</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Seleccion: activate to sort column ascending" style="width: 98.88px;">Accion</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($enlac as $enla)
                      <tr>
                      <th>{{ $enla->id_tipoenlace }}</th>
                      <th>{{ $enla->nombre_enlace }}</th>
                      <th>
                        <a href="javascript: document.getElementById('update-{{ $enla->id_tipoenlace }}').submit()" class="btn btn-info ml-auto">Activar</a>
                            <form id="update-{{ $enla->id_tipoenlace }}" action="{{ route('enlace.updatestatus', $enla->id_tipoenlace) }}" method="POST">                              
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
@stop