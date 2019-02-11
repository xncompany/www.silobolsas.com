@extends('layout/app')

@section('title', 'Dashboard')

@section('content')

        <section>
          <div class="container-fluid">
            <div class="row">

            @if ($dashboard['counters']['alerts'] > 0)

              <div class="col-xs-12 col-lg-12">
                <div class="card bg-danger">
                  <div class="card-body pv">
                    <div class="clearfix">
                      <div class="pull-left">
                        <h4 class="m0 text-thin">{{ $dashboard['counters']['alerts'] }}</h4><small class="m0 text-muted">alerta(s) en las últimas 24hs</small>
                      </div>
                      <div class="pull-right">
                        <a href="/alerts"><button class="btn text-black" type="button">Ver Alertas</button></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            @endif

              <div class="col-xs-12 col-lg-12">
                <div class="row">
                  <div class="col-xs-6 col-lg-3">
                    <div class="card">
                      <div class="card-body pv">
                        <div class="clearfix">
                          <div class="pull-left">
                            <h4 class="m0 text-thin">
                              <a href="/lands">{{ $dashboard['counters']['lands'] }}</a>
                            </h4>
                            <small class="m0 text-muted">Campos</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-6 col-lg-3">
                    <div class="card">
                      <div class="card-body pv">
                        <div class="clearfix">
                          <div class="pull-left">
                            <h4 class="m0 text-thin">
                              <a href="/silobags">{{ $dashboard['counters']['silobags'] }}</a>
                            </h4>
                            <small class="m0 text-muted">Silobolsas</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-6 col-lg-3">
                    <div class="card">
                      <div class="card-body pv">
                        <div class="clearfix">
                          <div class="pull-left">
                            <h4 class="m0 text-thin">
                              <a href="/spears">{{ $dashboard['counters']['devices'] }}</a>
                            </h4>
                            <small class="m0 text-muted">Lanzas</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-6 col-lg-3">
                    <div class="card">
                      <div class="card-body pv">
                        <div class="clearfix">
                          <div class="pull-left">
                            <h4 class="m0 text-thin">{{ number_format($dashboard['counters']['metrics']) }}</h4>
                            <small class="m0 text-muted">Mediciones</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-heading">
                        <div class="card-title">Estado de Silobolsas</div>
                      </div>
                      <div class="card-body">

                        <table class="table-datatable table table-striped table-hover" id="datatableDashboard">
                          <thead>
                            <tr>
                              <th class="sort-numeric">ID</th>
                              <th>Estado</th>
                              <th>Silobolsa</th>
                              <th>Campo</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach ($dashboard['silobags'] as $silobag)
                          <?php $color = (isset($silobag['alarm']) ? 'bg-danger' : 'bg-light-green-100'); ?>
                            <tr>
                              <td>{{ $silobag['id'] }}</td>
                              <td>
                                <ul class="pager">
                                    <li>
                                    @if (isset($silobag['alarm']))
                                        <a class="danger" href="/silobags/{{ $silobag['id'] }}">Alerta!</a>
                                    @else
                                        <a class="success" href="/silobags/{{ $silobag['id'] }}">Ok ✓</a>
                                    @endif
                                    </li>
                                </ul>
                              </td>
                              <td>
                                <a href="/silobags/{{ $silobag['id'] }}">{{ $silobag['description'] }}</a>
                              </td>
                              <td>
                                <a href="/lands/{{ $silobag['idLand'] }}">{{ $silobag['land'] }}</a>
                              </td>
                            </tr>
                          @endforeach
                          </tbody>
                        </table>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

<script type="text/javascript">
function googleMapsDevices() {

    if (document.getElementById('map-markers')) {

        var mapMarkers = new GMaps({
            div: '#map-markers',
            lat: {{ $dashboard['map']->center['latitude'] }},
            lng: {{ $dashboard['map']->center['longitude'] }},
            zoom: 12
        });
        @foreach ($dashboard['map']->markers as $pin)
        mapMarkers.addMarker({
              lat: {{ $pin['latitude'] }},
              lng: {{ $pin['longitude'] }},
            infoWindow: {
                content: '<a href="spears/{{ $pin['id'] }}">Lanza #{{ $pin['less_id'] }}</a>'
            }
        });
        @endforeach
    }
}
</script>

@endsection