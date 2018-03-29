@extends('layout/app')

@section('title', 'Lanzas')

@section('content')

        <section>
            <div class="container-fluid">

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
                                    <select class="form-control" name="silobag">
                                      <option value="" disabled selected>...</option>
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
                                    <input type="hidden" name="user" value="1">
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

            </div>
        </section>

@endsection