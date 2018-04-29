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
                          <th>Eliminar</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($lands as $land)
                        <tr class="row-{{ $land['id'] }}">
                          <td>{{ $land['id'] }}</td>
                          <td>{{ $land['description'] }}</td>
                          <td>{{ $land['createdAt'] }}</td>
                          <td><a data-id="{{ $land['id'] }}" class="btn ion-android-delete delete-land" href="#"></a></td>
                        </tr>
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

            </div>
        </section>

@endsection