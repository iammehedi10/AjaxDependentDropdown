@extends('FrontEnd.layout')

@section('title')
	Ajax Dependent Dropdown
@endsection

@section('main_content')
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-1">
				<div class="registerform">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h4 class="text-center">Dependent Dropdown</h4>
							<h6 class="text-center">Country wise cricketers</h6>
						</div>
						<div class="panel-body">
							<form id="myForm" action="#">
								<div class="form-group">
									<label for="country">Country</label>
									<select name="country" id="country" class="form-control">
										<option value="">---Select Country---</option>
										@foreach($countries as $country)
											<option value="{{$country->country_id}}">{{$country->country_name}}</option>
										@endforeach
									</select>
								</div>

								<div class="form-group">
									<label for="cricketer">Cricketer</label>
									<select name="cricketer" id="cricketer" class="form-control">
										<option>Not Found</option>
									</select>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4 col-md-offset-2">
				<div class="registerform">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h4 class="text-center">Dependent Dropdown</h4>
							<h6 class="text-center">Country wise cricketers</h6>
						</div>
						<div class="panel-body">
							<form id="myForm" action="#">
								<div class="form-group">
									<label for="country_one">Country</label>
									<select name="country_one" id="country_one" class="form-control">
										<option value="">---Select Country---</option>
										@foreach($countries as $country)
											<option value="{{$country->country_id}}">{{$country->country_name}}</option>
										@endforeach
									</select>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 id="cr_det" class="text-center">Cricketer Detail</h4>
                    </div>
                    <div class="panel-body table-responsive">
                        <table id="cr_info" class="table table-striped">
                        	<thead>
                                <tr class="danger">
                                    <th>ODI Run</th>
                                    <th>Test Run</th>
                                    <th>T20 Run</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 id="cr_det_one" class="text-center">Country</h4>
                    </div>
                    <div class="panel-body table-responsive">
                        <table id="cr_info_one" class="table table-striped">
                        	<thead>
                                <tr class="danger">
                                    <th>Name</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
		</div>
	</div>
@endsection

@push('js')
	<script type="text/javascript">
	$(document).ready(function() {
        $('#country').on('change', function() {
            var cid = $(this).val();
            document.getElementById("cr_det").innerHTML = 'Cricketer Detail';
            $("#cr_info").find('tbody').empty();

            if(cid) {
                $.ajax({
                    url: '/findWithCid/'+cid,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",

                    success:function(data) {
                      if(data){
                        $('#cricketer').empty();
                        $('select[name="cricketer"]').append('<option value="">---Select Cricketer---</option>');
                        $('#cricketer').focus;
                        $.each(data, function(key, value){
                        $('select[name="cricketer"]').append('<option value="'+ value.cricketer_id +'">' + value.cricketer_name+ '</option>');
                    });
                  }else{
                  	$('#cricketer').empty();
                    $('select[name="cricketer"]').append('<option value="">Not Found</option>');
                  }
                  }
                });
            }else{
              $('#cricketer').empty();
              $('select[name="cricketer"]').append('<option value="">Not Found</option>');
            }
        });
    });

    $(document).ready(function() {
        $('#cricketer').on('change', function() {
            var crid = $(this).val();

            if(crid) {
                $.ajax({
                    url: '/findWithCrid/'+crid,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",

                    success:function(data) {
                      if(data){
                      	document.getElementById("cr_det").innerHTML = 'Cricketer Detail';
                        $("#cr_info").find('tbody').empty();
                        document.getElementById("cr_det").innerHTML = data.cricketer_name+"'s Detail";
                        $("#cr_info").find('tbody').append('<tr><td>' + data.odi_run + '</td>' +
                            '<td>' + data.test_run + '<td>' + data.t20_run + '</td></tr>');
                  }else{
                  	document.getElementById("cr_det").innerHTML = 'Cricketer Detail';
                  	$("#cr_info").find('tbody').empty();
                  }
                  }
                });
            }else{
              	document.getElementById("cr_det").innerHTML = 'Cricketer Detail';
              	$("#cr_info").find('tbody').empty();
            }
        });
    });

    $(document).ready(function() {
        $('#country_one').on('change', function() {
            var cr_one_id = $(this).val();

            if(cr_one_id) {
                $.ajax({
                    url: '/findWithCroneid/'+cr_one_id,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",

                    success:function(data) {
                      if(data){
                      	document.getElementById("cr_det_one").innerHTML = 'Country';
                        $("#cr_info_one").find('tbody').empty();
                        
                        $.each(data, function(key, value){
                            document.getElementById("cr_det_one").innerHTML = value.country_name;
                            $("#cr_info_one").find('tbody').append('<tr><td>' + value.cricketer_name + '</td>' + '<td>' + value.cricketer_role + '</td></tr>');
                        });
                  }else{
                  	document.getElementById("cr_det_one").innerHTML = 'Country';
                  	$("#cr_info_one").find('tbody').empty();
                  }
                  }
                });
            }else{
              	document.getElementById("cr_det_one").innerHTML = 'Country';
              	$("#cr_info_one").find('tbody').empty();
            }
        });
    });
	</script>
@endpush