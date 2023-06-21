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
    <div class="creation">
    @if($posts->isEmpty())
                <div class="records">
                    <strong>Currently there are no avaliable posts.</strong>
                </div>
            @else
            <table class="table table-hover" style="width:80%; vertical-align: middle;">
            <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Author</th>
                <th width="100px">Price</th>
                <th width="100px">Condition</th>
                <th width="160px">Add to Whishlist</th>
            </tr>
            </thead>
            @foreach ($posts as $post)
            <tr onclick="window.location='{{ route('show', $post->id) }}';" style="cursor: pointer;">
                <td><img src="/images/{{ $post->image }}" width="100px"></td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->author }}</td>
                <td>{{ $post->price }}€</td>
                <td>{{ $post->condition }}</td>
                <td style="text-align: center;">
                    <form action="{{ route('wishlist', $post->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">♥</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endif
            </table>
            </div>
        {!! $posts->links() !!}
</x-app-layout>