@extends('layout/app')

@section('title', 'Usuarios')

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
                          <th>Password</th>
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
                          @if ($user['id'] == session('user')['id'])
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          @else
                            <td>
                              <a data-id="{{ $user['id'] }}" class="btn ion-android-delete delete-user" href="#"></a>
                            </td>
                            <td>
                              <a data-id="{{ $user['id'] }}" class="btn ion-ios-unlocked reset-password" href="#"></a>
                            </td>
                          @endif
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
                          <input type="hidden" name="active" value="1">
                          <div class="mda-form-group">
                            <div class="mda-form-control">
                              <input class="form-control" type="text" tabindex="0" name="fullname" id="fullname">
                              <div class="mda-form-control-line"></div>
                              <label>Nombre y Apellido:</label>
                            </div>
                          </div>
                          <div class="mda-form-group">
                            <div class="mda-form-control">
                              <input class="form-control" type="text" tabindex="1" name="email" id="email">
                              <div class="mda-form-control-line"></div>
                              <label>Email:</label>
                            </div>
                          </div>
                          <div class="mda-form-group">
                            <div class="mda-form-control">
                              <input class="form-control" type="password" tabindex="2" name="password1" id="password1">
                              <div class="mda-form-control-line"></div>
                              <label>Password:</label>
                            </div>
                          </div>
                          <div class="mda-form-group">
                            <div class="mda-form-control">
                              <input class="form-control" type="password" tabindex="3" name="password2" id="password2">
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
                          <div class="mda-form-group">
                            <div class="mda-form-control">
                              <select style="width: 100%;" class="form-control" name="user_lands[]"  id="select2-3" multiple="multiple">
                              <?php $last = 0; ?>
                              @foreach ($lands as $land)

                                @if ($land['organization']['id'] == session('user')['organization']['id'])
                                  @continue;
                                @endif

                                @if ($land['organization']['id'] != $last)

                                  @if ($last != 0)
                                    </optgroup>
                                  @endif

                                <optgroup label="{{ $land['organization']['description'] }}">
                                <?php $last = $land['organization']['id'] ?>

                                @endif
                                
                                <option value="{{ $land['id'] }}">{{ $land['description'] }}</option>

                              @endforeach
                                </optgroup>
                              </select>
                              <div class="mda-form-control-line"></div>
                              <label>Campos de Terceros:</label>
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

                <div class="modal fade modal-compose2" tabindex="-1" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-body">
                        <form action="/password" method="POST" id="formResetPassword">
                          <input type="hidden" name="id" id="reset-id_user" value="0">
                          <div class="mda-form-group">
                            <div class="mda-form-control">
                              <input class="form-control" type="text" tabindex="0" id="reset-fullname" disabled="disabled">
                              <div class="mda-form-control-line"></div>
                              <label>Nombre y Apellido:</label>
                            </div>
                          </div>
                          <div class="mda-form-group">
                            <div class="mda-form-control">
                              <input class="form-control" type="text" tabindex="1" id="reset-email" disabled="disabled">
                              <div class="mda-form-control-line"></div>
                              <label>Email:</label>
                            </div>
                          </div>
                          <div class="mda-form-group">
                            <div class="mda-form-control">
                              <input class="form-control" type="password" tabindex="2" name="password" id="reset-password">
                              <div class="mda-form-control-line"></div>
                              <label>Password:</label>
                            </div>
                          </div>
                          <button class="btn btn-success" type="button" id="modal-submit2">
                            <span id="buttonlabel2">Cambiar Password</span>
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