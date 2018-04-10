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
                          <th>Email</th>
                          <th>Rol</th>
                          <th>Alta</th>
                          <th>Eliminar</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($users as $user)
                        <tr class="row-{{ $user['id'] }}">
                          <td>{{ $user['id'] }}</td>
                          <td>{{ $user['fullname'] }}</td>
                          <td>{{ $user['email'] }}</td>
                          <td>{{ $user['type']['description'] }}</td>
                          <td>{{ $user['createdAt'] }}</td>
                          <td><a data-id="{{ $user['id'] }}" class="btn ion-android-delete delete-user" href="#"></a></td>
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
                        <form class="form-ajax" action="/users" method="POST" id="formUsers">
                          <input type="hidden" name="organization" value="1">
                          <input type="hidden" name="active" value="1">
                          <div class="mda-form-group">
                            <div class="mda-form-control">
                              <input class="form-control" type="text" tabindex="0" name="fullname">
                              <div class="mda-form-control-line"></div>
                              <label>Nombre y Apellido:</label>
                            </div>
                          </div>
                          <div class="mda-form-group">
                            <div class="mda-form-control">
                              <input class="form-control" type="text" tabindex="1" name="email">
                              <div class="mda-form-control-line"></div>
                              <label>Email:</label>
                            </div>
                          </div>
                          <div class="mda-form-group">
                            <div class="mda-form-control">
                              <input class="form-control" type="password" tabindex="2" name="password1">
                              <div class="mda-form-control-line"></div>
                              <label>Password:</label>
                            </div>
                          </div>
                          <div class="mda-form-group">
                            <div class="mda-form-control">
                              <input class="form-control" type="password" tabindex="3" name="password2">
                              <div class="mda-form-control-line"></div>
                              <label>Re-ingresar Password:</label>
                            </div>
                          </div>
                          <div class="mda-form-group">
                            <div class="mda-form-control">
                              <select class="form-control" name="user_type" tabindex="4">
                                <option value="1">Control total</option>
                                <option value="2" selected>Solo lectura</option>
                              </select>
                              <div class="mda-form-control-line"></div>
                              <label>Permisos:</label>
                            </div>
                          </div>
                          <button class="btn btn-success" type="button" id="modal-submit">
                            <span id="buttonlabel">Agregar Usuario</span>
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