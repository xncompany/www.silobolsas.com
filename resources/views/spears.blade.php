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

                        <div class="pull-right dropdown">
                          <button class="btn btn-flat btn-flat-icon" type="button" data-toggle="dropdown" aria-expanded="false"><em class="ion-stats-bars"></em></button>
                          <ul class="dropdown-menu md-dropdown-menu dropdown-menu-right" role="menu">
                            <li><a href="/silobags/{!! $id !!}?unit=0">Temperatura & Humedad & CO2</a></li>
                            <li><a href="/silobags/{!! $id !!}?unit=1">Temperatura</a></li>
                            <li><a href="/silobags/{!! $id !!}?unit=2">Humedad</a></li>
                            <li><a href="/silobags/{!! $id !!}?unit=3">CO2</a></li>
                          </ul>
                        </div>

                        <div class="pull-left">
                          <div class="rel-wrapper ui-datepicker ui-datepicker-popup dp-theme-success" id="example-datepicker-container-5" style="width: 200px;">
                            <div class="input-daterange input-group mda-input-group" id="example-datepicker-5">
                              <div class="mda-form-control" style="padding-top: 0px;">
                                <input class="form-control" type="text" name="start" value="{{$start}}" style="padding-left: 0;">
                                <div class="mda-form-control-line"></div>
                              </div>
                              <span class="input-group-addon">to</span>
                              <div class="mda-form-control" style="padding-top: 0px;">
                                <input class="form-control" type="text" name="end" value="{{$end}}" style="padding-left: 0;">
                                <div class="mda-form-control-line"></div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="pull-left">
                          <button class="btn btn-default" id="goChart" type="button" style="margin-left: 20px;">Go!</button>
                        </div>

                      </div>
                        <div class="card-body" style="min-height: 360px;">
                          @if ($unit == 0)
                          <div class="form-group">
                            <div class="col-sm-4 col-lg-4">
                              <p style="padding: 10px;">Temperatura</p>
                              <div class="flot-chart flot-chart-lg" id="line-flotchart1"></div>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                              <p style="padding: 10px;">Humedad</p>
                              <div class="flot-chart flot-chart-lg" id="line-flotchart2"></div>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                              <p style="padding: 10px;">CO2</p>
                              <div class="flot-chart flot-chart-lg" id="line-flotchart3"></div>
                            </div>
                          </div>
                          @else
                            <div class="flot-chart flot-chart-lg" id="line-flotchart"></div>
                          @endif
                        </div>
                        <div class="card-footer">
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Seleccionar Lanzas: </label>
                            <div class="col-sm-10">
                            @foreach ($list as $land)
                              @foreach ($land['silobags'] as $silobag)
                                @foreach ($silobag['devices'] as $device)
                                <label class="checkbox-inline c-checkbox" style="margin-top: 0;">
                                  <input type="checkbox" checked="" class="checkboxChart" value="{{$device['idLess']}}">
                                  <span class="ion-checkmark" id="inlineCheckbox{{$device['idLess']}}"></span> {{$device['idLess']}}
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