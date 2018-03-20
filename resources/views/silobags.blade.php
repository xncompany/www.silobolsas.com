@extends('layout/app')

@section('title', 'Silobolsas')

@section('content')

        <section>
            <div class="container-fluid">

                <div class="card">
                  <div class="card-body">
                    <table class="table-datatable table table-striped table-hover mv-lg" id="datatable1">
                      <thead>
                        <tr>
                          <th class="sort-numeric">ID</th>
                          <th>Silobolsa</th>
                          <th>Campo</th>
                          <th>Alta</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>2</td>
                          <td>Silo 1</td>
                          <td>El Paye</td>
                          <td>May, 12th. 2017</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Silo 2</td>
                          <td>El Paye</td>
                          <td>May, 12th. 2017</td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>Silo 3</td>
                          <td>El Paye</td>
                          <td>May, 13th. 2017</td>
                        </tr>
                        <tr>
                          <td>12</td>
                          <td>Silo 1</td>
                          <td>La Candelaria</td>
                          <td>July, 9th. 2017</td>
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
                                    <select class="form-control" name="account">
                                      <option value="" disabled selected>...</option>
                                      <option>El Paye</option>
                                      <option>El Mosquito</option>
                                      <option>La Calendaria</option>
                                    </select>
                                    <div class="mda-form-control-line"></div>
                                    <label>Seleccionar Campo:</label>
                                </div>
                            </div>
                            <div class="mda-form-group">
                                <div class="mda-form-control">
                                    <input class="form-control" rows="3" aria-multiline="true" tabindex="0" aria-invalid="false">
                                    <div class="mda-form-control-line"></div>
                                    <label>Nombre de la Silobolsa:</label>
                                </div>
                            </div>
                            <button class="btn btn-success" type="button" data-dismiss="modal">Agregar Silobolsa</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
        </section>

@endsection