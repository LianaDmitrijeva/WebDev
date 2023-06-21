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
        <div style="margin-left: 150px; margin-bottom: 50px; width:80%; margin-top:-70px;" class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        <br>
    @endif
    <div>
            @if($posts->isEmpty())
                <div class="records">
                    <strong>Currently you don't have any posts.</strong>
                    <strong>Click "Create New Post" to create a post.</strong>
                </div>
            @else
            <table class="table table table-sm" style="width:80%; vertical-align: middle">
            <thead style="background-color: #D5D5D5; boarders:white; color: white; text-shadow: 1px 1px 2px black;">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Author</th>
                <th>Price</th>
                <th>Condition</th>
                <th width="280px">Actions</th>
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
        </table>
    </div>
        {!! $posts->links() !!}
</x-app-layout>
