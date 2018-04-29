@extends('layout/clean')

@section('title', 'Login')

@section('content')

        <br>
        <section>
          <div class="container-fluid">
            @if (isset($fail))
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                  <div class="alert alert-danger">Usuario y/o Contraseña incorrectos.</div>
                </div>
                <div class="col-md-4"></div>
              </div>
            @endif
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <form class="form-validate" id="form-register" name="registerForm" novalidate="" method="POST" action="/login">
                  <div class="card card-default">
                    <div class="card-heading">
                      <div class="panel-title">Ingresar a SmartiumTech</div>
                    </div>
                    <div class="card-body">
                      <div class="mda-form-group">
                        <div class="mda-form-control">
                          <input class="form-control" type="email" placeholder="mail@example.com" name="email" required="">
                          <div class="mda-form-control-line"></div>
                          <label class="control-label">Email Address</label>
                        </div>
                      </div>
                      <div class="mda-form-group">
                        <div class="mda-form-control">
                          <input class="form-control" id="id-password" type="password" name="password" required="">
                          <div class="mda-form-control-line"></div>
                          <label class="control-label">Contraseña</label>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="clearfix">
                        <div class="pull-left">
                          <div class="checkbox c-checkbox">
                            <label>
                              <a href="/forgotpassword"> Olvidé mi contraseña.</a>
                            </label>
                          </div>
                        </div>
                        <div class="pull-right mt-sm">
                          <button class="btn bg-green-800" type="submit">Ingresar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-md-4"></div>
            </div>

          </div>
        </section>

@endsection