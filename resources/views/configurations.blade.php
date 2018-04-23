@extends('layout/app')

@section('title', 'Configuraciones')

@section('content')

        <section>
          <div class="container-fluid">
            <div class="row">
              <div class="col-xs-12 col-lg-12">
                <div class="row">
                  <div class="col-xs-6 col-lg-4">
                    @component('configurations-form', ['title' => 'CO2', 'placeholder' => '%'])
                    @endcomponent
                  </div>                    
                  <div class="col-xs-6 col-lg-4">
                    @component('configurations-form', ['title' => 'Humedad', 'placeholder' => '%'])
                    @endcomponent
                  </div>
                  <div class="col-xs-6 col-lg-4">
                    @component('configurations-form', ['title' => 'Temperatura', 'placeholder' => 'ºC'])
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