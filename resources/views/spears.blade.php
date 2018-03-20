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
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>2</td>
                          <td>Lanza 67110023</td>
                          <td>Silo 1</td>
                          <td>El Paye</td>
                          <td>May, 12th. 2017</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Lanza 67112058</td>
                          <td>Silo 2</td>
                          <td>El Paye</td>
                          <td>May, 12th. 2017</td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>Lanza 67112069</td>
                          <td>Silo 3</td>
                          <td>La Candelaria</td>
                          <td>May, 13th. 2017</td>
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
                                      <optgroup label="El Paye">
                                        <option value="volvo">Silobolsa 1</option>
                                        <option value="saab">Silobolsa 2</option>
                                      </optgroup>
                                      <optgroup label="El Mosquito">
                                        <option value="mercedes">Silobolsa 1</option>
                                      </optgroup>
                                      <optgroup label="La Candelaria">
                                        <option value="mercedes">Silobolsa 1</option>
                                        <option value="mercedes">Silobolsa 2</option>
                                        <option value="mercedes">Silobolsa 3</option>
                                      </optgroup>
                                    </select>
                                    <div class="mda-form-control-line"></div>
                                    <label>Seleccionar Silobolsa:</label>
                                </div>
                            </div>
                            <div class="mda-form-group">
                                <div class="mda-form-control">
                                    <input class="form-control" rows="3" aria-multiline="true" tabindex="0" aria-invalid="false">
                                    <div class="mda-form-control-line"></div>
                                    <label>Código de la Lanza:</label>
                                </div>
                            </div>
                            <button class="btn btn-success" type="button" data-dismiss="modal">Agregar Lanza</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
        </section>

@endsection