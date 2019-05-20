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
                <form action="{{ Route('dependencia.store') }}" method="POST" class="card">
                @csrf
                  <div class="card-header">
                    <h3 class="card-title">Gestion de dependencias</h3>
                  </div>
                  <div class="card-body">
                  <form class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-label">Siglas</label>
                        <input type="text" class="form-control" name="siglas" placeholder="Ingrese las siglas..." value="">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-5">
                      <div class="form-group">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre de la dependencia..." value="">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class = "form-group">
							<label>Sector</label>
							<select  id = "sector" name = "sector"  class = "form-control">
								<option value = "">Selecciona un sector...</option>
                                @foreach($sector as $sectores)
                              <option value="{{ $sectores->id_sector }}"> {{ $sectores->nombre_sector }}</option>
                              @endforeach
							</select>
						</div>
                    </div>
                    <div class="col-sm-6 col-md-12">
                      <div class="form-group">
                        <label class="form-label">Domicilio</label>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                      <div class="form-group">
                        <label class="form-label">Calle y No.</label>
                        <input type="text" class="form-control" name ="calleNo" placeholder="" value="">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Cruzamientos</label>
                        <input type="text" class="form-control" name ="cruzamientos" placeholder="" value="">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-5">
                      <div class="form-group">
                        <label class="form-label">Colonia</label>
                        <input type="text" class="form-control" name ="colonia" placeholder="" value="">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                      <div class="form-group">
                        <label class="form-label">Codigo postal</label>
                        <input type="text" class="form-control" name ="codpostal" placeholder="" value="">
                      </div>
                    </div>                    
                    <div class="col-md-6">
                      <div class="form-group mb-0">
                        <label class="form-label">Referencias</label>
                        <textarea rows="5" class="form-control" name ="referencias" placeholder="" value="">
                            
                        </textarea>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <div class = "form-group">
							<label>Estado</label>
                            <input type="text" class="form-control" name ="estado" placeholder="" value="">
						</div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <div class = "form-group">
							<label>Ciudad</label>
                            <input type="text" class="form-control" name ="ciudad" placeholder="" value="">
						</div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <div class = "form-group">
							<label>Municipio</label>
                            <input type="text" class="form-control" name ="municipio" placeholder="" value="">
						</div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary ml-auto">Guardar</button>
                    <a href="{{ route('dependencia.index') }}" class="btn btn-danger ml-auto">Cancelar</a>
                </div>
              </form>
                </div>
              </form>
            </div>
@stop