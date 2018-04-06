@extends('layout/app')

@section('title', 'Lanza #67110023')

@section('content')

        <script type="text/javascript">
            function deviceChart() 
            {
                if (!$.fn.knob || !$.fn.easyPieChart) return;

                var pieOptions = {
                    animate: {
                        duration: 800,
                        enabled: true
                    },
                    trackColor: 'rgba(162,162,162, .09)',
                    scaleColor: Colors.byName('gray-dark'),
                    lineWidth: 15,
                    lineCap: 'circle'
                };

                var success = jQuery.extend({}, pieOptions);
                var warning = jQuery.extend({}, pieOptions);
                var danger = jQuery.extend({}, pieOptions);

                success.barColor = Colors.byName('success');
                warning.barColor = Colors.byName('warning');
                danger.barColor = Colors.byName('danger');

                $('#easypiechart1').easyPieChart({{ $device['dashboard']['temperature']['color'] }});
                $('#easypiechart2').easyPieChart({{ $device['dashboard']['humidity']['color'] }});
                $('#easypiechart3').easyPieChart({{ $device['dashboard']['CO2']['color'] }});
                $('#easypiechart4').easyPieChart({{ $device['dashboard']['battery_charge']['color'] }});
            }

            function deviceMap() 
            {
                if (document.getElementById('map-markers-device')) {

                    var mapMarkers = new GMaps({
                        div: '#map-markers-device',
                        lat: {{ $device['coordinates']['latitude'] }},
                        lng: {{ $device['coordinates']['longitude'] }},
                        zoom: 12
                    });
                    mapMarkers.addMarker({
                          lat: {{ $device['coordinates']['latitude'] }},
                          lng: {{ $device['coordinates']['longitude'] }},
                        infoWindow: {
                            content: 'Lanza #{{ $device['idLess'] }}'
                        }
                    });
                }
            }
        </script>

        <section>
            <div class="container-fluid">
                <h4 class="page-header clearfix">Métricas Actuales - {{ $device['dashboard']['date'] }}</h4>
                <div class="row">
                  <div class="col-lg-3 col-sm-6">
                    <div class="card">
                      <div class="card-heading">Temperatura</div>
                      <div class="card-body text-center">
                        <div class="easypie-chart" id="easypiechart1" data-percent="{{ $device['dashboard']['temperature']['amount'] }}">
                            <span>{{ $device['dashboard']['temperature']['amount'] }}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <div class="card">
                      <div class="card-heading">Humedad</div>
                      <div class="card-body text-center">
                        <div class="easypie-chart" id="easypiechart2" data-percent="{{ $device['dashboard']['humidity']['amount'] }}">
                            <span>{{ $device['dashboard']['humidity']['amount'] }}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <div class="card">
                      <div class="card-heading">CO2</div>
                      <div class="card-body text-center">
                        <div class="easypie-chart" id="easypiechart3" data-percent="{{ $device['dashboard']['CO2']['amount'] }}">
                            <span>{{ $device['dashboard']['CO2']['amount'] }}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                    <div class="card">
                      <div class="card-heading">Carga de Batería</div>
                      <div class="card-body text-center">
                        <div class="easypie-chart" id="easypiechart4" data-percent="{{ $device['dashboard']['battery_charge']['amount'] }}">
                            <span>{{ $device['dashboard']['battery_charge']['amount'] }}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <h4 class="page-header clearfix">Posición</h4>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="gmap" id="map-markers-device"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <h4 class="page-header clearfix">Últimos 30 días de métricas</h4>
                <div class="row">
                    <div class="card">
                      <div class="card-body">
                        <table class="table-datatable table table-striped table-hover mv-lg" id="datatable1">
                          <thead>
                            <tr>
                              <th class="sort-numeric">ID</th>
                              <th>Métrica</th>
                              <th>Valor</th>
                              <th>Estado</th>
                              <th>Fecha</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td>1</td>
                                <td>Temperatura</td>
                                <td>37ºC</td>
                                <td>Normal</td>
                                <td>2018-03-27 07:01:33</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Humedad</td>
                                <td>47%</td>
                                <td>Normal</td>
                                <td>2018-03-27 07:01:33</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Humedad</td>
                                <td>87%</td>
                                <td><p class="text-danger">Problema</p></td>
                                <td>2018-03-27 07:01:33</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </section>

@endsection