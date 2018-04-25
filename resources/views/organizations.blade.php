@extends('layout/app', ['admin' => true])

@section('title', 'Clientes')

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
                      @foreach ($list as $organization)
	                      <tr class="row-{{ $organization['id'] }}">
	                        <td>{{ $organization['id'] }}</td>
	                        <td><a href="organizations/{{ $organization['id'] }}">{{ $organization['description'] }}</a></td>
	                        <td>{{ $organization['createdAt'] }}</td>
                          @if ($organization['id'] == 1)
                            <td>&nbsp;</td>
                          @else
                              <td>
                                <a data-id="{{ $organization['id'] }}" class="btn ion-android-delete delete-organization" href="#"></a>
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
                        <form class="form-ajax" action="/organizations" method="POST" id="formOrganizations">
                            <div class="mda-form-group">
                                <div class="mda-form-control">
                                    <input class="form-control" type="text" tabindex="2" name="organization" id="organization">
                                    <div class="mda-form-control-line"></div>
                                    <label>Nombre de la Empresa:</label>
                                </div>
                            </div>
                            <div class="mda-form-group">
                                <div class="mda-form-control">
                                    <input class="form-control" type="text" tabindex="3" name="fullname" id="fullname">
                                    <div class="mda-form-control-line"></div>
                                    <label>Nombre del Responsable:</label>
                                </div>
                            </div>
                            <div class="mda-form-group">
                                <div class="mda-form-control">
                                    <input class="form-control" type="text" tabindex="4" name="email" id="email">
                                    <div class="mda-form-control-line"></div>
                                    <label>Email del Responsable:</label>
                                </div>
                            </div>
                            <div class="mda-form-group">
                                <div class="mda-form-control">
                                    <input class="form-control" type="password" tabindex="5" name="password1" id="password1">
                                    <div class="mda-form-control-line"></div>
                                    <label>Password:</label>
                                </div>
                            </div>
                            <div class="mda-form-group">
                                <div class="mda-form-control">
                                    <input class="form-control" type="password" tabindex="6" name="password2" id="password2">
                                    <div class="mda-form-control-line"></div>
                                    <label>Repetir Password:</label>
                                </div>
                            </div>
                            <button class="btn btn-success" type="button" id="modal-submit">
                              <span id="buttonlabel">Agregar Nuevo Cliente</span>
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