<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

  	<div class="container" style="margin-top: 50px;" id="body_section">

  		<h1 class="align-middle" align="center" style="background-color: green;padding: 15px;color: white;">Laravel Jquery Ajax Learning 

  			<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span style="font-size: 20px;color: white;font-weight: bold;" class="float-right btn btn-danger">Log-Out</span></a>

  			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

  			<a href="#" data-toggle="modal" data-target="#exampleModal" id="Add_Info"><span style="font-size: 20px;color: white;font-weight: bold;margin-right: 10px;" class="float-right btn btn-primary">Add-Info</span></a>

  			

  		</h1>
		<table class="table table-dark">
		  <thead>
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">Name</th>
		      <th scope="col">Message</th>
		      <th scope="col">Image</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($data as $v_info)
		    <tr>
		      <th scope="row">{{ $v_info -> id }}</th>
		      <td>{{ $v_info -> name }}</td>
		      <td>{{ $v_info -> message }}</td>
		      <td>
		      		<img class="img-responsive img-thumbnail" src="{{URL('Pract/'.$v_info->image)}}"  style = "height : 50px; width : 50px;border-radius: 50%" alt="">
		      </td>

		      <td>
		      	<button class="btn btn-primary" id="UpdateInfo" data-toggle="modal" data-target="#exampleModal">
		      	<input type="hidden" id="itemId" value="{{ $v_info -> id }}">Edit</button>

		      	<button class="btn btn-danger" id="delete" data-toggle="modal" data-target="#exampleModaled"><input type="hidden" id="itemId" value="{{ $v_info -> id }}">
		      	Delete</button>
		      </td>
		    </tr>
		    @endforeach

		  </tbody>
		</table>

  		<h1 class="align-middle" align="center" style="background-color: green;padding: 15px;color: white;">Laravel Jquery Ajax Learning</h1>
  	</div>

  	<!-- Modal -->
  	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	  <div class="modal-dialog" role="document">
  	    <div class="modal-content">
  	    	
  	      <div class="modal-header">
  	        <h5 class="modal-title" id="title">Add Info</h5>
  	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  	          <span aria-hidden="true">&times;</span>
  	        </button>
  	      </div>
  	      
		<span id="form_result"></span>

  	    <form method="post" id="upload_form" class="form-horizontal" enctype="multipart/form-data">
  	    	@csrf

  	        <div class="modal-body">

  	          <div class="form-group">
  	          	<input type="hidden" id="id">
  	            <label for="exampleInputEmail1">Enter Name</label>
  	            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
  	          </div>


  	          <div class="form-group">
  	            <label for="message">Enter Message</label>
  	            <textarea class="form-control" name="message" id="message" aria-describedby="message" placeholder="Enter Message"></textarea>
  	          </div>
		
  	          <div class="form-group">
  	            <label for="image">Enter Image</label>
  	            <input type="file" class="form-control" name="image" id="image" placeholder="Image">
  	            <span id="store_image"></span>
  	          </div>
  	      	</div>

	  	      <div class="modal-footer">

	  	      	<input type="hidden" name="action" id="action" />
	  	      	<input type="hidden" name="hidden_id" id="hidden_id" />

	  	        <input type="submit" class="btn btn-danger" data-dismiss = "modal" value="Close" />
	  	        <input type="submit" name="submit" id="AddInfo" value="Add" class="btn btn-success" />
	  	      </div>

  	    </form>
  	    </div>
  	  </div>
  	</div>



  	<div class="modal" id="exampleModaled" tabindex="-1" role="dialog">
  	  <div class="modal-dialog" role="document">
  	    <div class="modal-content">
  	      <div class="modal-header">
  	        <h5 class="modal-title" id="editTitle">Delete Info</h5>
  	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  	          <span aria-hidden="true">&times;</span>
  	        </button>
  	      </div>

  	      <div class="modal-body">
  	      	<input type="hidden" id="id">

  	      	<label class="card-title">Are you sure you want to delete this item...!</label>
  	        
  	      </div>
  	      <div class="modal-footer">

  	        <button type="button" class="btn btn-primary" id="deleteInfo" data-dismiss="modal" >Yes</button>

  	      </div>
  	    </div>
  	  </div>
  	</div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	
	<script>
		$(document).ready(function(event) {
			
			$(document).on('click', '#Add_Info', function(event) {
				
				$("#title").text('Something Add Please...');

				$('#name').val("");
				$('#message').val("");
				$('#store_image').val('');
				$('#form_result').val("");
				$('#AddInfo').val("AddInfo");
				$('#action').val("Add");
				$('#AddInfo').show('400');
				console.log();

			});

			$("#upload_form").on('submit', function(event) {
				event.preventDefault();
				
				if($('#action').val() == 'Add'){

					$.ajax({

					 url:"{{ route('love.store') }}",
					 method:"post",
					 data: new FormData(this),
					 contentType: false,
					 cache:false,
					 processData: false,
					 dataType:"json",
					 success:function(data)
					 {
					  var html = '';
					  if(data.errors)
					  {
					   html = '<div class="alert alert-danger">';
					   for(var count = 0; count < data.errors.length; count++)
					   {
					    html += '<p>' + data.errors[count] + '</p>';
					   }
					   html += '</div>';
					  }
					  if(data.success)
					  {
					   html = '<div class="alert alert-success">' + data.success + '</div>';
					   $('#upload_form')[0].reset();
					   $('#body_section').load('#body_section');
					  }
					  $("#form_result").html(html);
					 }
					})
				}
				



				else if($('#action').val() == "Edit")
				  {
				   $.ajax({
				    url:"{{ route('love.update') }}",
				    method:"post",
				    data:new FormData(this),
				    contentType: false,
				    cache: false,
				    processData: false,
				    dataType:"json",
				    success:function(data)
				    {
				     var html = '';
				     if(data.errors)
				     {
				      html = '<div class="alert alert-danger">';
				      for(var count = 0; count < data.errors.length; count++)
				      {
				       html += '<p>' + data.errors[count] + '</p>';
				      }
				      html += '</div>';
				     }
				     if(data.success)
				     {
				      html = '<div class="alert alert-success">' + data.success + '</div>';
				      $('#upload_form')[0].reset();
					  $('#body_section').load('#body_section');
				      $('#store_image').html('');
				     }
				     $('#form_result').html(html);
				    }
				   });
				  }


				  else{
					console.log("Something Is Missing...!");
				}
			});



			$(document).on('click', '#UpdateInfo', function(event) {

					var id = $(this).find('#itemId').val();
					$('#form_result').html('');

					 $.ajax({
					  url:"/love/edit/"+id,
					  dataType:"json",

					  success:function(html){
					   $('#name').val(html.data.name);
					   $('#message').val(html.data.message);

					   $('#store_image').html("<img src={{ URL::to('/') }}/Pract/" + html.data.image + " width='70' class='img-thumbnail' />");
					   $('#store_image').append("<input type='hidden' name='hidden_image' value='"+ html.data.image +"' />");
					   $('#hidden_id').val(html.data.id);
					   $('#title').text("Update New Record Info");
					   $('#AddInfo').val("Update");
					   $('#exampleModal').modal('show');	
					   $('#action').val("Edit");
					  
					  }


					 })
					 console.log(id);

			});


			$(document).on('click', '#delete', function(event) {

					var id = $(this).find('#itemId').val();
					$('#hidden_id').val(id);
					console.log(id);

			});



			$('#deleteInfo').click(function(event) {
				var id = $('#hidden_id').val();

				$.post('{{ route('pract.delete') }}', {id: id, '_token' : $('input[name=_token]').val()}, function(data) {
					$('#body_section').load(' #body_section');
					console.log(data);
				});
				
			});



		});
	</script>

  </body>
</html>