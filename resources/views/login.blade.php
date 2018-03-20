@extends('layout/clean')

@section('title', 'Login')

@section('content')

        <br>
        <section>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <form class="form-validate" id="form-register" name="registerForm" novalidate="">
                  <div class="card card-default">
                    <div class="card-heading">
                      <div class="panel-title">Ingresar al Sistema</div>
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
                          <input class="form-control" id="id-password" type="password" name="password1" required="">
                          <div class="mda-form-control-line"></div>
                          <label class="control-label">Password</label>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="clearfix">
                        <div class="pull-left">
                          <div class="checkbox c-checkbox">
                            <label>
                              <a href="/register"> No tengo usuario.</a>
                            </label>
                          </div>
                        </div>
                        <div class="pull-right mt-sm">
                          <button class="btn btn-primary btn-flat" type="submit">Login</button>
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