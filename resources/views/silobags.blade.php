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
                              Para utilizar las silobolsas debes agregar al menos un campo
                            </small>
                          </div>
                          <div class="pull-right">
                            <a href="/lands">
                              <button class="btn text-black" type="button">Agregar un campo</button>
                            </a>
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
                            <th>Eliminar</th>
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
                              <td><a data-id="{{ $silobag['id'] }}" class="btn ion-android-delete delete-silobag" href="#"></a></td>
                            </tr>
                          @endforeach
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>

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

              </div>
          </section>

  @endsection

@endif