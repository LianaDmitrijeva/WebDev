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
        <div style="margin-left: 150px; width:80%; margin-top:-70px;" class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        <br>
    @endif
    @if($posts->isEmpty())
                <div class="records" style="margin-top:-70px;">
                    <strong>No avaliable posts.</strong>
                </div>
            @else
            <table class="table table-hover" style="width:80%; margin-top:-70px; vertical-align: middle;">
            <thead style="background-color: #D5D5D5; boarders:white; color: white; text-shadow: 1px 1px 2px black;"><tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th width="100px">Price</th>
                    <th width="100px">Condition</th>
                    <th width="160px">Add to Whishlist</th>
            </tr></thead>
            @foreach ($posts as $post)
            <tr onclick="window.location='{{ route('show', $post->id) }}';" style="cursor: pointer;">
                <td><img src="/images/{{ $post->image }}" width="100px"></td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->author }}</td>
                <td>{{ $post->price }}€</td>
                <td>{{ $post->condition }}</td>
                <td style="text-align: center;">
                    <form action="{{ route('favorite.add', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">♥</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endif
            </table>
            </div>
</x-app-layout>