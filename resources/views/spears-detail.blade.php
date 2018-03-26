@extends('layout/app')

@section('title', 'Lanza #67110023')

@section('content')

        <section>
        	<div class="container-fluid">
        		<h4 class="page-header clearfix">Métricas Actuales - 2018-03-27 14:12:04</h4>
				<div class="row">
	              <div class="col-lg-3 col-sm-6">
	                <div class="card">
	                  <div class="card-heading">Temperature</div>
	                  <div class="card-body text-center">
	                    <div class="easypie-chart" id="easypiechart1" data-percent="35"><span>35</span></div>
	                  </div>
	                </div>
	              </div>
	              <div class="col-lg-3 col-sm-6">
	                <div class="card">
	                  <div class="card-heading">Humidity</div>
	                  <div class="card-body text-center">
	                    <div class="easypie-chart" id="easypiechart2" data-percent="45"><span>45</span></div>
	                  </div>
	                </div>
	              </div>
	              <div class="col-lg-3 col-sm-6">
	                <div class="card">
	                  <div class="card-heading">CO2</div>
	                  <div class="card-body text-center">
	                    <div class="easypie-chart" id="easypiechart3" data-percent="25"><span>25</span></div>
	                  </div>
	                </div>
	              </div>
	              <div class="col-lg-3 col-sm-6">
	                <div class="card">
	                  <div class="card-heading">Battery Charge</div>
	                  <div class="card-body text-center">
	                    <div class="easypie-chart" id="easypiechart4" data-percent="10"><span>10</span></div>
	                  </div>
	                </div>
	              </div>
	            </div>
	            <h4 class="page-header clearfix">Posición</h4>
	            <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="gmap" id="map-markers-2"></div>
                      </div>
                    </div>
                  </div>
                </div>
        	</div>
        </section>

@endsection