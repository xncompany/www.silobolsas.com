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
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>4</td>
                          <td>El Paye</td>
                          <td>2018-01-21 09:23:11</td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>El Mosquito</td>
                          <td>2018-02-22 21:14:32</td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>La Candelaria</td>
                          <td>2018-02-26 12:52:21</td>
                        </tr>
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
                        <form action="">
                          <div class="mda-form-group">
                            <div class="mda-form-control">
                              <input class="form-control" rows="3" aria-multiline="true" tabindex="0" aria-invalid="false">
                              <div class="mda-form-control-line"></div>
                              <label>Nombre del Campo:</label>
                            </div>
                          </div>
                          <button class="btn btn-success" type="button" data-dismiss="modal">Agregar Campo</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
        </section>

@endsection