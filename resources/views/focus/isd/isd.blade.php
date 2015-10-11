@extends('app') @section('content')
<!--  <div id="gra" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>-->
<div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>{!! trans('element_name.attributes.store_name') !!}</label>
				{!! Form::select('store_name', array('L' => 'Large', 'S' =>
				'Small'), null, ['class'=> 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-6">l</div>
	</div>
</div>
<form method="POST" action="!#" accept-charset="UTF-8" id="form-p">
	<input type="hidden" name="_token" value="{{ csrf_token() }}"> <input
		type="submit" id="">
</form>
@endsection @section('highcharts')
<script type="text/javascript">
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$("#form-p").submit(function(e){
			e.preventDefault();
			var form = $('#form-p');
			var data = form.serialize();
			$.post("isd",data,function(dd){
				console.log(JSON.stringify(dd));
				
			});
		});
		$(function () {

		    $(document).ready(function () {

		        // Build the chart
		        $('#gra').highcharts({
		            chart: {
		                plotBackgroundColor: null,
		                plotBorderWidth: null,
		                plotShadow: false,
		                type: 'pie'
		            },
		            title: {
		                text: 'Browser market shares January, 2015 to May, 2015'
		            },
		            tooltip: {
		                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		            },
		            plotOptions: {
		                pie: {
		                    allowPointSelect: true,
		                    cursor: 'pointer',
		                    dataLabels: {
		                        enabled: false
		                    },
		                    showInLegend: true
		                }
		            },
		            series: [{
		                name: "Brands",
		                colorByPoint: true,

		                data: [{
		                    name: "Microsoft Internet Explorer",
		                    y: 56.33
		                }, {
		                    name: "Chrome",
		                    y: 24.030000000000005,
		                    sliced: true,
		                    selected: true
		                }, {
		                    name: "Firefox",
		                    y: 10.38
		                }, {
		                    name: "Safari",
		                    y: 4.77
		                }, {
		                    name: "Opera",
		                    y: 0.9100000000000001
		                }, {
		                    name: "Proprietary or Undetectable",
		                    y: 0.2
		                }]
	                
		            }]
		        });
		    });
		});
				
		
		</script>

<script src="{{ asset('/js/highcharts.js') }}"></script>

@endsection
