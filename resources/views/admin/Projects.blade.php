@extends('admin.master')


@section('content')

	<table class="table table-bordered">
		<tr>
			<td>Sl</td>
			<td>Students Id</td>
			<td>Semester</td>
			<td>Supervisor Name</td>
			<td>Project/Thesis</td>
			<td>Course Code</td>
			<td>Subject</td>
			<td>Action</td>
		</tr>
		<tr>
			<td>1</td>
			<td>131313,1313,1313</td>
			<td>Fall 181</td>
			<td>Md. X</td>
			<td>Project</td>
			<td>400B</td>
			<td>Thesis management</td>
			<td>
				<a href="" class="btn btn-danger">Drop</a>
				<a href="" class="btn btn-info">Edit</a>
			</td>
		</tr>
	</table>


@endsection