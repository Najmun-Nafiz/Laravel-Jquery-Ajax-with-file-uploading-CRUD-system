<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax For Learning</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

	<div class="container" style="margin-top: 100px;">
		<div class="row">

				<div class="panel" style="width: 80%;margin: auto;background-color: orange;padding: 15px;border: 4px solid red;">
					<div class="panel panel-default">
						<div class="panel-group" id="full_body">
							<div class="panel-heading btn-primary" style="padding: 10px 0px;text-align: center;font-weight: bold;">

									<h3 class="panel-title" style="font-weight: bold;">Ajax Learning 
									<a href="#" class="float-right" id="ItemAdd" data-toggle="modal" data-target="#exampleModal" style="margin-right: 15px;font-size: 20px;margin-top: 7px;cursor: pointer;color: white;"><i class="fa fa-plus" aria-hidden="true"></i></a>
									</h3>

							</div>
							<div class="panel-body btn-lg" style="margin: 20px;" id="body_custom">
								
								<ul class="list-group" id="panelBody">

									<table class="table">
									  <thead>
									    <tr>
									      <th scope="col">Id</th>
									      <th scope="col">Item</th>
									      <th scope="col">Email</th>
									      <th scope="col">Image</th>
									      <th scope="col">Action</th>
									    </tr>
									  </thead>
									  <tbody>
									  	@foreach ($info as $element)
									    <tr>
									      

									      <td scope="row">{{ $element -> id }}</td>

									      <td class="ouritem" data-toggle="modal" id = "items" name = "items" >{{ $element -> item }} </td>

									      <td class="ouritem" data-toggle="modal" id = "emails">{{ $element -> email }}</td>
									      <td class="ouritem" data-toggle="modal" id = "images">

											<img class="img-responsive img-thumbnail" src="{{URL('images/'.$element->image)}}"  style = "height : 50px; width : 50px;border-radius: 50%" alt="">

									      </td>

									      <td class="ouritem"  >

									      	<button id="editItem" class="editItem btn btn-primary" data-toggle="modal" data-target="#exampleModal">

											<input type="hidden" id="itemId" value="{{ $element -> id }}"> 
											<input type="hidden" id="items" value="{{ $element -> item }}"> 
											<input type="hidden" id="emails" value="{{ $element -> email }}">
											
									      	Edit</button>

									      	<button id="delete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModals">
									      	<input type="hidden" id="itemId" value="{{ $element -> id }}">
									      	Delete </button>
									  	  </td>
									      
										</tr>
										@endforeach
									  </tbody>
									</table>

									</ul>
									
							</div>
							<div class="panel-footer btn-primary panel-title"  style="padding: 10px 0px;text-align: center;font-weight: bold;font-size: 21px;">
								Footer
							</div>
						</div>
					</div>
				</div>

				<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				    	
				      <div class="modal-header">
				        <h5 class="modal-title" id="editTitle">Add New Item</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>

				      <span id="form_result"></span>

						<form method="post" id="upload_form" class="form-horizontal" enctype="multipart/form-data">
						 @csrf
					 
				      	<div class="modal-body">
						
				      	<input type="hidden" id="id">
				      	<label class="card-title">Enter Title</label>
				        <p><input type="text" placeholder="Write Item Here" name="item" id="item" class="form-control"></p>

				        <label class="card-title">Enter Email</label>
				        <p><input type="email" placeholder="Write Email Here" name="email" id="email" class="form-control" ></p>

				        <label class="card-title">Enter Image</label>
				        <p><input type="file" id="image" class="form-control" name="image" ></p>
				        <span type = "hidden" id="store_image"></span>

				       

				      </div>
				      <div class="modal-footer">


				        <input type="hidden" name="action" id="action" />
				        <input type="hidden" name="hidden_id" id="hidden_id" />
				        <input type="submit" class="btn btn-danger" data-dismiss = "modal" value="Close" />
				        <input type="submit" name="action_button" id="action_button" class="btn btn-info" value="Add" />

				      </div>

				  </form>

				       
				    </div>
				  </div>
				</div>
				
				<div class="modal" id="exampleModals" tabindex="-1" role="dialog">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="editTitle">Delete Item</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>

				      <div class="modal-body">
				      	<input type="hidden" name="hidden_id" id="hidden_id" />

				      	<label class="card-title">Are you sure you want to delete this item...!</label>
				        
				      </div>
				      <div class="modal-footer">

				        <button type="button" class="btn btn-primary" id="deleteItem" data-dismiss="modal" >Yes</button>

				      </div>
				    </div>
				  </div>
				</div>

		</div>
	</div>
	
	@csrf

	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>
    

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script>
		$(document).ready(function() {

			$(document).on('click', '#ItemAdd', function(event) {

					$('#editTitle').text('Add New Items');
					$('#item').val("");
					$('#email').val("");
					$('#image').val("");
					$('#action_button').val("AddItem");
					$('#action').val("Add");
					$('#action_button').show('400');
					console.log();
				});
			
		
				$('#upload_form').on('submit', function(event) {
					event.preventDefault();

					if($('#action').val() == 'Add'){

						$.ajax({

						 url:"{{ route('create') }}",
						 method:"POST",
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
						   $('#full_body').load('#full_body');
						  }
						  $('#form_result').html(html);
						 }
						})
					}



					if($('#action').val() == "Edit")
					  {
					   $.ajax({
					    url:"{{ route('update') }}",
					    method:"POST",
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
						  $('#full_body').load('#full_body');
					      $('#store_image').html('');
					     }
					     $('#form_result').html(html);
					    }
					   });
					  }
					
				});


				$(document).on('click', '.editItem', function(){

				 var id = $(this).find('#itemId').val();
				 $('#form_result').html('');

				 $.ajax({
				  url:"/edit/"+id,
				  dataType:"json",

				  success:function(html){
				   $('#item').val(html.data.item);
				   $('#email').val(html.data.email);

				   $('#store_image').html("<img src={{ URL::to('/') }}/images/" + html.data.image + " width='70' class='img-thumbnail' />");
				   $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
				   $('#hidden_id').val(html.data.id);
				   $('#editTitle').text("Edit New Record");
				   $('#action_button').val("Edit");
				   $('#exampleModal').modal('show');	
				   $('#action').val("Edit");
				  
				  }

				 })
				 console.log(id);
				});


			

			// $(document).on('click', '#editItem', function(event) {

			// 		var id = $(this).find('#itemId').val();
			// 		var items = $(this).find('#items').val();
			// 		var emails = $(this).find('#emails').val();
			// 		$('#addid').val(id);
			// 		$('#additem').val(items);
			// 		$('#addemail').val(emails);
			// 		console.log(id);

			// });


			$(document).on('click', '#delete', function(event) {

					var id = $(this).find('#itemId').val();
					$('#hidden_id').val(id);
					console.log(id);

			});



			$('#deleteItem').click(function(event) {
				var id = $('#hidden_id').val();

				$.post('{{ route('ajax.delete') }}', {'id': id, '_token' : $('input[name=_token]').val()}, function(data) {
					$('#panelBody').load(' #panelBody');
					console.log(data);
				});
				
			});


		});
	</script>

</body>
</html>