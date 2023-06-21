<style>
    table, .records{
        margin-left: 150px; 
        margin-top:-70px;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <a class="btn btn-outline-success" href="{{ url('create') }}"> Create New Post</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div> -->
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div style="margin-left: 150px; width:80%;" class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="creation">
            @if($posts->isEmpty())
                <div class="records">
                    <strong>Currently you don't have any posts.</strong>
                    <strong>Click "Create New Post" to create a post.</strong>
                </div>
            @else
            <table class="table table table-sm" style="width:80%; vertical-align: middle">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Author</th>
                <th>Price</th>
                <th>Description</th>
                <th width="280px">Actions</th>
            </tr>
            @foreach ($posts as $post)
            <tr>
                <td><img src="/images/{{ $post->image }}" width="100px"></td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->author }}</td>
                <td>{{ $post->price }}€</td>
                <!-- style="color:#C0C2C9" -->
                <td>{{ $post->description }}</td>
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
        </table>
    </div>
        {!! $posts->links() !!}
</x-app-layout>
