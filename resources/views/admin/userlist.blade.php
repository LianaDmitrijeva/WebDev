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
                <button type="submit" class="btn btn-outline-secondary">Search</button>
            </div>
        </form>
    </x-slot>
    @if ($message = Session::get('success'))
        <div style="margin-left: 150px; width:80%;" class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="creation">
    @if($users->isEmpty())
                <div class="records">
                    <strong>No avaliable users.</strong>
                </div>
    @else
            <table class="table table-hover" style="width:80%; vertical-align: middle;">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th style="text-align: center; width=160px">Actions</th>
            </tr>
            </thead>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td style="text-align: center;">
                <form action="{{ route('destroyuser',$user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
    @endif
            </table>
            </div>
</x-app-layout>