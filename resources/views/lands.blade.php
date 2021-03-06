@extends('layout/app')

@section('title', 'Campos')

@section('content')

        <section>
            <div class="container-fluid">

                <div class="card">
                  <div class="card-body">
                    <table class="table-datatable table table-striped table-hover mv-lg" id="datatable1">
                      <thead>
                        <tr>
                          <th class="sort-numeric">ID</th>
                          <th>Nombre</th>
                          <th>Alta</th>
                        @if (session('user')['admin'])
                          <th>Eliminar</th>
                        @endif
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($lands as $land)
                        <tr class="row-{{ $land['id'] }}">
                          <td>{{ $land['id'] }}</td>
                          <td><a href="/lands/{{ $land['id'] }}">{{ $land['description'] }}</a></td>
                          <td>{{ $land['createdAt'] }}</td>
                        @if (session('user')['admin'])
                          <td>
                            <a data-id="{{ $land['id'] }}" class="btn ion-android-delete delete-land" href="#"></a>
                          </td>
                        @endif
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

            @if (!empty($extraLands))

                <div class="card">
                  <div class="card-body">
                    <div class="card-title">Campos de otras Organizaciones</div>
                    <table class="table-datatable table table-striped table-hover mv-lg" id="datatable3">
                      <thead>
                        <tr>
                          <th class="sort-numeric">ID</th>
                          <th>Nombre</th>
                          <th>Dueño</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($extraLands as $land)
                        <tr class="row-{{ $land['id'] }}">
                          <td>{{ $land['id'] }}</td>
                          <td><a href="/lands/{{ $land['id'] }}">{{ $land['description'] }}</a></td>
                          <td>{{ $land['organization']['description'] }}</td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

            @endif

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
                        <form class="form-ajax" action="/lands" method="POST" id="formLands">
                          <div class="mda-form-group">
                            <div class="mda-form-control">
                              <input class="form-control" type="text" tabindex="0" name="description">
                              <input type="hidden" name="active" value="1">
                              <div class="mda-form-control-line"></div>
                              <label>Nombre del Campo:</label>
                            </div>
                          </div>
                          <button class="btn btn-success" type="button" id="modal-submit">
                            <span id="buttonlabel">Agregar Campo</span>
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