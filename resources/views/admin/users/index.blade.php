@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Users') }}
                    <div class="float-right">
                        <a href="#" class="btn btn-sm btn-success">New</a>
                    </div>
                </div>

                <div class="card-body" style="padding: 0px;" >
                   <table class="table">
                       <thead>
                           <tr>
                               <th scope="col">#</th>
                               <th scope="col">Name</th>
                               <th scope="col">Email</th>
                               <th scope="col">Roles</th>
                               @can('manage-users')
                               <th scope="col">Actions</th>
                               @endcan
                           </tr>
                       </thead>
                       <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td scope="row">{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ implode(',', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                               
                                <td>
                                    @can('edit-users')
                                    <a href="{{ route('admin.users.edit', $user->id) }}">
                                        <button type="button" class="btn btn-sm btn-info float-left" style="margin-right:5px">Edit</button>
                                    </a>
                                   @endcan
                                   @can('delete-users')
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                    <button type="sudmit" class="btn btn-sm btn-danger float-left" onclick="javascript: return confirm('Confirm deletion of: {{ $user->name }}');">Delete</button>
                                    </form>
                                    @endcan
                                </td>
                                </tr>
                            @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
