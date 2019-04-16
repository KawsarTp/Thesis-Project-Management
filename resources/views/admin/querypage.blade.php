@extends('admin.master')

@section('content')


	<div class="col-md-10">
			<h2 class="text-center">Complains Area</h2>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Sl No.</th>
				<th>Email</th>
				<th>Message</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>khossain227@gmail.com</td>
				<td>
				asasas
				</td>
				<td>
					<a href="#" class="btn btn-danger glyphicon glyphicon-remove"></a>
					<a href="#" class="btn btn-success glyphicon glyphicon-ok"></a>
				</td>
				<td>
        		<a href="" class="btn btn-success glyphicon glyphicon-edit"></a>
        		<a href="" class="btn btn-danger glyphicon glyphicon-trash"></a>
        		</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection