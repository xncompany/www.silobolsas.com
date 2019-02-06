@extends('layout/app')

@section('title', 'Lanzas')


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
                            <h4 class="m0 text-thin">No hay Silobolsas</h4>
                            <small class="m0 text-muted">
                              @if (session('user')['admin'])
                              Para utilizar las lanzas debes agregar al menos una silobolsa
                              @else
                              Para utilizar las lanzas debes agregar al menos una silobolsa. Por favor contacte con el Administrador de la Cuenta, dado que él tiene permisos suficientes para agregar una Silobolsa al sistema.
                              @endif
                            </small>
                          </div>
                          @if (session('user')['admin'])
                          <div class="pull-right">
                            <a href="/silobags">
                              <button class="btn text-black" type="button">Agregar una Silobolsa</button>
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
                            <h4 class="m0 text-thin">No hay Lanzas</h4>
                            <small class="m0 text-muted">
                              Por favor contacte con el Administrador de la Cuenta, dado que él tiene permisos suficientes para agregar una Lanza al sistema.
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

                  @if ($chart)
                      <script type="text/javascript">
                        var idSilobag = {!! $id !!};
                        var days = {!! $days !!};
                        var unit = {!! $unit !!};
                      </script> 
                      <div class="card">
                      <div class="card-heading" style="margin-bottom: 10px;">
                        <!-- START dropdown-->
                          <div class="pull-left">
                            @if ($unit == 1)
                              <a class="btn btn-primary" href="/silobags/{!! $id !!}?days={!! $days !!}&unit=1" role="button">Temperatura</a>
                            @else
                              <a class="btn btn-default" href="/silobags/{!! $id !!}?days={!! $days !!}&unit=1" role="button">Temperatura</a>
                            @endif
                            @if ($unit == 2)
                              <a class="btn btn-primary" href="/silobags/{!! $id !!}?days={!! $days !!}&unit=2" role="button">Humedad</a>
                            @else
                              <a class="btn btn-default" href="/silobags/{!! $id !!}?days={!! $days !!}&unit=2" role="button">Humedad</a>
                            @endif
                            @if ($unit == 3)
                              <a class="btn btn-primary" href="/silobags/{!! $id !!}?days={!! $days !!}&unit=3" role="button">CO2</a>
                            @else
                              <a class="btn btn-default" href="/silobags/{!! $id !!}?days={!! $days !!}&unit=3" role="button">CO2</a>
                            @endif
                          </div>
                        <div class="pull-right dropdown">
                          <button class="btn btn-flat btn-flat-icon" type="button" data-toggle="dropdown"><em class="ion-clock"></em></button>
                          <ul class="dropdown-menu md-dropdown-menu dropdown-menu-right" role="menu">
                            <li><a href="/silobags/{!! $id !!}?unit={!! $unit !!}&days=7">Última Semana</a></li>
                            <li><a href="/silobags/{!! $id !!}?unit={!! $unit !!}&days=15">Últimos 15 días</a></li>
                            <li><a href="/silobags/{!! $id !!}?unit={!! $unit !!}&days=90">Últimos 3 meses</a></li>
                            <li><a href="/silobags/{!! $id !!}?unit={!! $unit !!}&days=180">Últimos 6 meses</a></li>
                            <li><a href="/silobags/{!! $id !!}?unit={!! $unit !!}&days=365">Último Año</a></li>
                          </ul>
                        </div>
                      </div>
                        <div class="card-body">
                          <div class="flot-chart flot-chart-lg" id="line-flotchart"></div>
                        </div>
                        <div class="card-footer">
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Seleccionar Lanzas: </label>
                            <div class="col-sm-10">
                            @foreach ($list as $land)
                              @foreach ($land['silobags'] as $silobag)
                                @foreach ($silobag['devices'] as $device)                                
                                  <label class="checkbox checkbox-inline" style="margin-top: 0;">
                                    <input class="checkboxChart" id="inlineCheckbox{{$device['id']}}" type="checkbox" checked="checked" value="{{$device['idLess']}}"> {{$device['idLess']}}
                                  </label>
                                @endforeach
                              @endforeach
                            @endforeach
                            </div>
                          </div>
                        </div>
                      </div>
                  @endif

                    <div class="card">
                      <div class="card-body">
                        <table class="table-datatable table table-striped table-hover mv-lg" id="datatable1">
                          <thead>
                            <tr>
                              <th class="sort-numeric">ID</th>
                              <th>Lanza</th>
                              <th>Silobolsa</th>
                              <th>Campo</th>
                              <th>Alta</th>
                              <th>Eliminar</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach ($list as $land)
                            @foreach ($land['silobags'] as $silobag)
                              @foreach ($silobag['devices'] as $device)
                                <tr class="row-{{ $device['id'] }}">
                                  <td>{{ $device['id'] }}</td>
                                  <td><a href="/spears/{{ $device['id'] }}">{{ $device['idLess'] }}</a></td>
                                  <td>{{ $silobag['description'] }}</td>
                                  <td>{{ $land['description'] }}</td>
                                  <td>{{ $device['createdAt'] }}</td>
                                  <td><a data-id="{{ $device['id'] }}" class="btn ion-android-delete delete-device" href="#"></a></td>
                                </tr>
                              @endforeach
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
                            <form class="form-ajax" action="/spears" method="POST" id="formDevices">
                                <div class="mda-form-group">
                                    <div class="mda-form-control">
                                        <select class="form-control" name="silobag" id="silobag">
                                          @foreach ($lands as $land)
                                            <optgroup label="{{ $land['description'] }}">
                                              @foreach ($land['silobags'] as $silobag)
                                                <option value="{{ $silobag['id'] }}">{{ $silobag['description'] }}</option>
                                              @endforeach
                                            </optgroup>
                                          @endforeach
                                        </select>
                                        <div class="mda-form-control-line"></div>
                                        <label>Seleccionar Silobolsa:</label>
                                    </div>
                                </div>
                                <div class="mda-form-group">
                                    <div class="mda-form-control">
                                        <input class="form-control" type="text" tabindex="0" name="less_id">
                                        <input type="hidden" name="active" value="1">
                                        <input type="hidden" name="type" value="1">
                                        <div class="mda-form-control-line"></div>
                                        <label>Código de la Lanza:</label>
                                    </div>
                                </div>
                                <div class="mda-form-group">
                                    <div class="mda-form-control">
                                        <input class="form-control" type="text" tabindex="0" name="description">
                                        <div class="mda-form-control-line"></div>
                                        <label>Descripción</label>
                                    </div>
                                </div>
                                <div class="mda-form-group">
                                    <div class="mda-form-control">
                                        <input class="form-control" type="text" tabindex="0" name="latitude">
                                        <div class="mda-form-control-line"></div>
                                        <label>Latitude</label>
                                    </div>
                                </div>
                                <div class="mda-form-group">
                                    <div class="mda-form-control">
                                        <input class="form-control" type="text" tabindex="0" name="longitude">
                                        <div class="mda-form-control-line"></div>
                                        <label>Longitude</label>
                                    </div>
                                </div>
                                <button class="btn btn-success" type="button" id="modal-submit">
                                  <span id="buttonlabel">Agregar Lanza</span>
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