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
                            <h4 class="m0 text-thin">{{ $dashboard['counters']['lands'] }}</h4>
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
                            <h4 class="m0 text-thin">{{ $dashboard['counters']['silobags'] }}</h4>
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
                            <h4 class="m0 text-thin">{{ $dashboard['counters']['devices'] }}</h4>
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
                            <h4 class="m0 text-thin">{{ $dashboard['counters']['metrics'] }}</h4>
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
                        <div class="card-title">{{ $dashboard['map']->title }}</div>
                        <small>con informaci&oacute;n de coordenadas</small>
                      </div>
                      <div class="card-body">
                        <div class="gmap" id="map-markers"></div>
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