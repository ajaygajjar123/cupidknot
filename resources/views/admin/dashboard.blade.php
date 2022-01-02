@extends('layouts.app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
@endsection
@section('content')
<style>
    
.price-range-block {
    margin:60px;
}
.ui-slider-horizontal {
    height: .6em;
}
.ui-slider-horizontal {
    margin-bottom: 15px;
    width:40%;
}
.ui-widget-header {
    background: #3FE331;
}

.price-range-search {
    width:40.5%; 
    background-color: #f9f9f9; 
    border: 1px solid #6e6666;
    min-width: 40%;
    display: inline-block;
    height: 32px;
    border-radius: 5px;
    float: left;
    margin-bottom:20px;
    font-size:16px;
}
.price-range-field{
    width:20%; 
    min-width: 16%;
    background-color:#f9f9f9; 
    border: 1px solid #6e6666; 
    color: black; 
    font-family: myFont; 
    font: normal 14px Arial, Helvetica, sans-serif; 
    border-radius: 5px; 
    height:26px; 
    padding:5px;
}
.search-results-block{
    position: relative;
    display: block;
    clear: both;
}

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row" style="margin-bottom:10px">
                        <div class="col-md-4">
                            <lable>Select Gender : </lable>
                            <select class="control-form" name="gender" id="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <lable>Select Family Type : </lable>
                            <select class="control-form" name="family_type" id="family_type">
                                <option value="joint">Joint</option>
                                <option value="nuclear">Nuclear</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <lable>Select Manglik : </lable>
                            <select class="control-form" name="manglik" id="manglik">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="col-md-8 p-3">
                            <lable class="p-2" style="margin-bottom:10px">Select Annual Income : </lable>
                            <br>
                            <div id="slider-range" class="price-filter-range" name="rangeInput"></div>

                            <div style="margin:30px auto">
                                <input type="hidden" min="{{ $min }}" max="{{ $max }}" oninput="validity.valid||(value='0');" id="min_annual" class="price-range-field" />    
                                <input type="hidden" min="{{ $min }}" max="{{ $max }}" oninput="validity.valid||(value='100000');" id="max_annual" class="price-range-field" />
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped" id="laravel_datatable">
                        
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">DOB</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Email</th>
                                <th scope="col">Annual Income</th>
                                <th scope="col">Occupation</th>
                                <th scope="col">Family Type</th>
                                <th scope="col">Manglik</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script>
$(document).ready( function () {
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
 
  $('#laravel_datatable').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: "{{ route('user-data') }}",
          type: 'post',
          data: function (d) {
            d.gender = $('#gender').val();
            d.family_type = $('#family_type').val();
            d.manglik = $('#manglik').val();
            d.min_annual = $('#min_annual').val();
            d.max_annual = $('#max_annual').val();
          }
         },
         columns: [
                  { data: 'id', name: 'id', 'visible': true},
                  { data: 'first_name', name: 'first_name' },
                  { data: 'last_name', name: 'last_name' },
                  { data: 'bod', name: 'bod' },
                  { data: 'gender', name: 'gender' },
                  { data: 'email', name: 'email' },
                  { data: 'annual_income', name: 'annual_income' },
                  { data: 'occupation', name: 'occupation' },
                  { data: 'family_type', name: 'family_type' },
                  { data: 'manglik', name: 'manglik' },
               ],
        order: [[0, 'desc']]
  });
  
});
$('#gender').on('change', '', function (e) {
    $('#laravel_datatable').DataTable().draw(true);
});

$('#family_type').on('change', '', function (e) {
    $('#laravel_datatable').DataTable().draw(true);
});

$('#manglik').on('change', '', function (e) {
    $('#laravel_datatable').DataTable().draw(true);
});

(function ($) {
  
  $('#price-range-submit').hide();

	$("#min_annual,#max_annual").on('change', function () {

	  $('#price-range-submit').show();

	  var min_price_range = parseInt($("#min_annual").val());

	  var max_price_range = parseInt($("#max_annual").val());

	  if (min_price_range > max_price_range) {
		$('#max_annual').val(min_price_range);
	  }

	  $("#slider-range").slider({
		values: [min_price_range, max_price_range]
	  });
	  
	});


	$("#min_annual,#max_annual").on("paste keyup", function () {                                        
        
	  $('#price-range-submit').show();

	  var min_price_range = parseInt($("#min_annual").val());

	  var max_price_range = parseInt($("#max_annual").val());
	  
	  if(min_price_range == max_price_range){

			max_price_range = min_price_range + 100;
			
			$("#min_annual").val(min_price_range);		
			$("#max_annual").val(max_price_range);
	  }

	  $("#slider-range").slider({
		values: [min_price_range, max_price_range]
	  });

	});


	$(function () {
	  $("#slider-range").slider({
		range: true,
		orientation: "horizontal",
		min: {{ $min }},
		max: {{ $max }},
		values: [{{ $min }}, {{ $max }}],
		step: 100,

		slide: function (event, ui) {
		  if (ui.values[0] == ui.values[1]) {
			  return false;
		  }
		  
		  var min = $("#min_annual").val(ui.values[0]);
		  var max = $("#max_annual").val(ui.values[1]);
          
		}
	  });

	  $("#min_annual").val($("#slider-range").slider("values", 0));
	  $("#max_annual").val($("#slider-range").slider("values", 1));

	});

	$("#slider-range,#price-range-submit").click(function () {
        $('#laravel_datatable').DataTable().draw(true);
        $('#min_annual').val();
        $('#max_annual').val();
	  $("#searchResults").text("Here List of products will be shown which are cost between " + min_annual  +" "+ "and" + " "+ max_annual + ".");
	});

  
})(jQuery);
</script>

@endsection
