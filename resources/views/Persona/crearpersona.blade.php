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
                <form action="{{ Route('persona.store') }}" method="POST" class="card">
                @csrf
                  <div class="card-header">
                    <h3 class="card-title">Gestion de personas</h3>
                  </div>
                  <div class="card-body">
                  <form class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Cargo</label>
                        <input type="text" class="form-control" name="cargo" placeholder="Ingrese el nombre del cargo..." value="">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="form-group">
                        <label class="form-label">Titulo</label>
                        <input type="text" class="form-control" name="titulo" placeholder="Ingrese el titulo..." value="">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre..." value="">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Apellido paterno</label>
                        <input type="text" class="form-control" name="apellidoP" placeholder="Ingrese apellido paterno..." value="">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Apellido materno</label>
                        <input type="text" class="form-control" name="apellidoM" placeholder="Ingrese apellido materno..." value="">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label class="form-label">Fecha de nacimiento</label>
                        <input type="text" name="fechaNac" class="form-control" data-mask="00/00/0000" data-mask-clearifnotmatch="true" placeholder="00/00/0000" autocomplete="off" maxlength="10">
                      </div>
                    </div>                    
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Correo institucional</label>
                        <input type="text" class="form-control" name="correoIns" placeholder="Ingrese correo intitucional..." value="">
                      </div>
                    </div>                    
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Correo personal</label>
                        <input type="text" class="form-control" name="correoPer" placeholder="Ingrese correo personal..." value="">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Telefono institucional</label>
                        <input type="text" class="form-control" name="telIns" placeholder="Ingrese telefiono intitucional..." value="">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Telefono personal</label>
                        <input type="text" class="form-control" name="telPer" placeholder="Ingrese telefono personal..." value="">
                      </div>
                    </div>                    
                    <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Dependencia</label>
                        <div class="row gutters-xs">
                            <select name="dependencia" class="form-control custom-select">
                            <option value="">Seleccione...</option>
                              @foreach($dependencias as $depen)
                              <option value="{{ $depen->id_dependencia }}"> {{ $depen->nombre_dependencia }}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                      </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Tipo enlace</label>
                        <div class="row gutters-xs">
                            <select name="tipoenlace" class="form-control custom-select">
                            <option value="">Seleccione...</option>
                              @foreach($tipo_de_enlace as $enlace)
                              <option value="{{ $enlace->id_tipoenlace }}"> {{ $enlace->nombre_enlace }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>                
                    <div class="col-md-6">
                      <div class="form-group mb-0">
                        <label class="form-label">Notas</label>
                        <textarea rows="5" class="form-control" name="notas" placeholder="" value="Mike">
                            
                        </textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary ml-auto">Guardar</button>
                    <a href="{{ route('persona.index') }}" class="btn btn-danger ml-auto">Cancelar</a>
                </div>
              </form>
                </div>
              </form>
            </div>
@stop