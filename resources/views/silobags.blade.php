@extends('layout/app')

@section('title', 'Silobolsas')

@if (empty($lands))

  @section('content')
  
          <section>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-xs-12 col-lg-12">
                    <div class="card bg-danger">
                      <div class="card-body pv">
                        <div class="clearfix">
                          <div class="pull-left">
                            <h4 class="m0 text-thin">No hay Campos</h4>
                            <small class="m0 text-muted">
                              @if (session('user')['admin'])
                              Para utilizar las silobolsas debes agregar al menos un campo
                              @else
                              Para utilizar las silobolsas debes agregar al menos un campo. Por favor contacte con el Administrador de la Cuenta, dado que él tiene permisos suficientes para agregar un Campo al sistema.
                              @endif
                            </small>
                          </div>
                          @if (session('user')['admin'])
                          <div class="pull-right">
                            <a href="/lands">
                              <button class="btn text-black" type="button">Agregar un campo</button>
                            </a>
                          </div>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </section>

  @endsection

@elseif (empty($list) && !session('user')['admin'])


  @section('content')
  
          <section>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-xs-12 col-lg-12">
                    <div class="card bg-danger">
                      <div class="card-body pv">
                        <div class="clearfix">
                          <div class="pull-left">
                            <h4 class="m0 text-thin">No hay Silobolsas</h4>
                            <small class="m0 text-muted">
                              Por favor contacte con el Administrador de la Cuenta, dado que él tiene permisos suficientes para agregar una Silobolsa al sistema.
                            </small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </section>

  @endsection


@else

  @section('content')

          <section>
              <div class="container-fluid">

                  <div class="card">
                    <div class="card-body">
                      <table class="table-datatable table table-striped table-hover mv-lg" id="datatable1">
                        <thead>
                          <tr>
                            <th class="sort-numeric">ID</th>
                            <th>Silobolsa</th>
                            <th>Campo</th>
                            <th>Alta</th>
                          @if (session('user')['admin'])
                            <th>Eliminar</th>
                          @endif
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $land)
                          @foreach ($land['silobags'] as $silobag)
                            <tr class="row-{{ $silobag['id'] }}">
                              <td>{{ $silobag['id'] }}</td>
                              <td>{{ $silobag['description'] }}</td>
                              <td>{{ $land['description'] }}</td>
                              <td>{{ $silobag['createdAt'] }}</td>
                            @if (session('user')['admin'])
                              <td>
                                <a data-id="{{ $silobag['id'] }}" class="btn ion-android-delete delete-silobag" href="#"></a>
                              </td>
                            @endif
                            </tr>
                          @endforeach
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>

            @if (session('user')['admin'])

                  <div class="floatbutton">
                    <ul class="mfb-component--br mfb-zoomin">
                      <li class="mfb-component__wrap">
                              <a class="mfb-component__button--main" id="compose" href="#">
                                  <i class="mfb-component__main-icon--resting ion-edit"></i>
                                  <i class="mfb-component__main-icon--active ion-edit"></i>
                              </a>
                              <ul class="mfb-component__list"></ul>
                          </li>
                    </ul>
                  </div>

                  <div class="modal fade modal-compose" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-body">
                          <form class="form-ajax" action="/silobags" method="POST" id="formSilobags">
                              <div class="mda-form-group">
                                  <div class="mda-form-control">
                                      <select class="form-control" name="land" id="land">
                                        @foreach ($lands as $land)
                                          <option value="{{ $land['id'] }}">{{ $land['description'] }}</option>
                                        @endforeach
                                      </select>
                                      <div class="mda-form-control-line"></div>
                                      <label>Seleccionar Campo:</label>
                                  </div>
                              </div>
                              <div class="mda-form-group">
                                  <div class="mda-form-control">
                                      <input class="form-control" type="text" tabindex="0" name="description">
                                      <input type="hidden" name="active" value="1">
                                      <div class="mda-form-control-line"></div>
                                      <label>Nombre de la Silobolsa:</label>
                                  </div>
                              </div>
                              <button class="btn btn-success" type="button" id="modal-submit">
                                <span id="buttonlabel">Agregar Silobag</span>
                                <div class="loader-inner ball-pulse"></div>
                              </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

            @endif

              </div>
          </section>

  @endsection

@endif