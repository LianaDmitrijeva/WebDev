<style>
    table, .records{
        margin-top: 20px;
        margin-left: 150px; 
    }
    .header{
        text-align: center;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <form action="{{ route('searchuser') }}" method="GET" class="mb-4">
            <div class="flex items-center">
                <input type="text" name="search" placeholder="Search users" class="rounded-l-md border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white px-3 py-2 placeholder-gray-400 text-sm focus:outline-none focus:border-blue-400">
                <button type="submit" class="btn btn-dark">Search</button>
            </div>
        </form>
    </x-slot>
    @if ($message = Session::get('success'))
        <div style="margin-left: 150px; margin-top: 6px; width:80%;" class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="creation">
    @if($users->isEmpty())
                <div class="records">
                    <strong>No avaliable users.</strong>
                </div>
    @else
            <table class="table table-sm table-dark" style=" width:80%; vertical-align: middle;">
            <thead style="background-color: #D5D5D5; boarders:white; color: white; text-shadow: 1px 1px 2px black;">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th style="text-align: center; width=160px">Actions</th>
            </tr>
            </thead>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="update" data-name="detail" data-type="text" data-pk="{{ $user->id }}" data-title="Enter Detail">{{ $user->usertype }}</td>
                <td style="text-align: center;">
                <form action="{{ route('destroyuser',$user->id) }}" method="POST">
                <a class="btn btn-secondary" href="{{ route('useredit',$user->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
    @endif
            </table>
</x-app-layout>