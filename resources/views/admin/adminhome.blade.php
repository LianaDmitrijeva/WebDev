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
        <form action="{{ route('search') }}" method="GET" class="mb-4">
            <div class="flex items-center">
                <input type="text" name="search" placeholder="Search posts" class="rounded-l-md border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white px-3 py-2 placeholder-gray-400 text-sm focus:outline-none focus:border-blue-400">
                <button type="submit" class="btn btn-outline-secondary">Search</button>
            </div>
        </form>
    </x-slot>
    @if($posts->isEmpty())
                <div class="records">
                    <strong>Currently there are no avaliable posts.</strong>
                </div>
            @else
            <table class="table table-sm" style="width:80%; vertical-align: middle;">
            <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Author</th>
                <th >Price</th>
                <th >Condition</th>
                <th >Actions</th>
            </tr>
            </thead>
            @foreach ($posts as $post)
            <tr>
                <td><img src="/images/{{ $post->image }}" width="100px"></td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->author }}</td>
                <td>{{ $post->price }}€</td>
                <td>{{ $post->condition }}</td>
                <td>
                    <form action="{{ route('destroy',$post->id) }}" method="POST">
        
                        <a class="btn btn-secondary" href="{{ route('show',$post->id) }}">View</a>
        
                        <a class="btn btn-secondary" href="{{ route('edit',$post->id) }}">Edit</a>
        
                        @csrf
                        @method('DELETE')
            
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endif
</x-app-layout>