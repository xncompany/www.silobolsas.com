@extends('layout/app')

@section('title', 'Configuraciones')

@section('content')

        <section>
          <div class="container-fluid">
            @if (isset($status))
              <div class="row">
                <div class="col-lg-12">
                  @if ($status)
                    <div class="alert alert-success">Métricas actualizas.</div>
                  @else
                    <div class="alert alert-danger">No se pudieron actualizar las métricas.</div>
                  @endif
                </div>
              </div>
            @endif
            <div class="row">
              <div class="col-xs-12 col-lg-12">
                <div class="row">
                  <div class="col-xs-6 col-lg-4">
                    @component('configurations-form', ['title' => 'CO2', 
                                                      'placeholder' => '%', 
                                                      'id' => 300,
                                                      'list' => $list])
                    @endcomponent
                  </div>                    
                  <div class="col-xs-6 col-lg-4">
                    @component('configurations-form', ['title' => 'Humedad', 
                                                      'placeholder' => '%', 
                                                      'id' => 200,
                                                      'list' => $list])
                    @endcomponent
                  </div>
                  <div class="col-xs-6 col-lg-4">
                    @component('configurations-form', ['title' => 'Temperatura', 
                                                      'placeholder' => 'ºC', 
                                                      'id' => 100,
                                                      'list' => $list])
                    @endcomponent
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <script type="text/javascript">
            function setDeltaAction(val, id) 
            {
                var text = '&nbsp;<span class="caret"></span>';
                if (val) {
                    text = 'Subida' + text;
                } else {
                    text = 'Bajada' + text;
                }
                $("#delta-action-" + id).val(val);
                $("#btn-dropdown-" + id).html(text);
            }
        </script>
@endsection