@extends('admin.master')


@section('content')


	<div class="col-md-10">
	<h3 class="text-center">Teachers Info</h3>
</div>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Student-id</th>
        <th>Address</th>
        <th>Gender</th>
        <th>Department</th>
        <th>Credit</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>xxx</td>
        <td>khossain227@gmail.com</td>
        <td>10021233</td>
        <td>asaaasasasas asas asas as asasasa</td>
        <td>Male</td>
        <td>CSE</td>
        <td>100</td>
        <td><img src="" alt="image"></td>
        <td>
        	<a href="" class="btn btn-success glyphicon glyphicon-edit"></a>
        	<a href="" class="btn btn-danger glyphicon glyphicon-trash"></a>
        </td>
      </tr>
       <tr>
        <td>xxx</td>
        <td>khossain227@gmail.com</td>
        <td>10021233</td>
        <td>asaaasasasas asas asas as asasasa</td>
        <td>Male</td>
        <td>CSE</td>
        <td>100</td>
        <td><img src="" alt="image"></td>
        <td>
        	<a href="" class="btn btn-success glyphicon glyphicon-edit"></a>
        	<a href="" class="btn btn-danger glyphicon glyphicon-trash"></a>
        </td>
      </tr>
       <tr>
        <td>xxx</td>
        <td>khossain227@gmail.com</td>
        <td>10021233</td>
        <td>asaaasasasas asas asas as asasasa</td>
        <td>Male</td>
        <td>CSE</td>
        <td>100</td>
        <td><img src="" alt="image"></td>
        <td>
        	<a href="" class="btn btn-success glyphicon glyphicon-edit"></a>
        	<a href="" class="btn btn-danger glyphicon glyphicon-trash" id="teacher"></a>
        </td>
      </tr>
      
    </tbody>
  </table>


@endsection	