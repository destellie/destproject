@extends('layouts._admin')
@section('content')

<div class="container">
<div class="row justify-content-center">

    <div class="col-md-8">
            <div class="card">
                <div class="card-header">List of Users</div>
               
                <div class="card-body">
                   
                   <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th class=" text-center">Action</th>
                    </tr>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}</td>
                        @can('edit-users')
                        <td><a  type="button" class="btn btn-warning" href="{{route('users.edit',$user->id)}}">Update</a></td>
                        @endcan
                        @can('delete-users')
                        <td><form action="{{route('users.destroy',$user->id)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                               <button type="submit" class="btn btn-danger">Delete</button>                     
                        </form>
                        @endcan
                        </td>
                    </tr>
                    @endforeach
                   </table>

                </div>
            </div>
        </div>
    </div>
    </div>

</div>
</div>

@endsection