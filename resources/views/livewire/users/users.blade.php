<div>
    @include('livewire.users.create')
    @include('livewire.users.edit')
    <div class="container">
        <div class="row">
            @if(session()->has('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>All Users</h3>
                    <!-- Button trigger modal -->
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addUserModal">
                            Add New User
                        </button>
                        <input wire:model="search" type="text" placeholder="Search users..."/>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $u => $item)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#editUserModal"
                                            wire:click.prevent="edit({{$item->id}})">Edit
                                    </button>
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
