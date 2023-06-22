<style>
    table, .records, form{
        margin-top: 20px;
        margin-left: 150px; 
    }
    .header{
        text-align: center;
    }
</style>
<div style="width:100%; background-color:#FFE37A; " class="alert alert-light">
                    @auth
                        <a class="btn btn-secondary" style="margin-left:47%;" href="{{ url('/home') }}">Dashboard</a>
                    @else
                        <a class="btn btn-success" style="margin-left:47%;" href="{{ route('login') }}">Log in </a>
                        |
                        @if (Route::has('register'))
                            <a class="btn btn-success" href="{{ route('register') }}"> Register</a>
                        @endif
                    @endauth
</div>
<x-app-layout>
    <div class="creation">
    <form action="{{ url('/searchwelcome') }}" method="GET" class="mb-4">
        <div class="flex items-center">
            <input style="margin-top:30px;" type="text" name="searchwelcome" placeholder="Search posts" class="rounded-l-md border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white px-3 py-2 placeholder-gray-400 text-sm focus:outline-none focus:border-blue-400">
            <button style="margin-top:30px;" type="submit" class="btn btn-secondary">Search</button>
        </div>
        <!-- <h2 style="float:right; margin-right:20%">{{ __('welcome.welcome') }}</h2> -->
    </form>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div> -->
                </div>
            </div>
        </div>
    @if($posts->isEmpty())
                <div class="records" style="margin-top:-70px;">
                    <strong>No avaliable posts.</strong>
                </div>
            @else
            <table class="table table-striped" style="width:80%; margin-top:-70px; vertical-align: middle;">
            <thead style="background-color: #9C9C9C; boarders:white; color: white; text-shadow: 1px 1px 2px black;">
            <tr></tr>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Author</th>
                <th>Price</th>
                <th>Condition</th>
            </tr>
            </thead>
            @foreach ($posts as $post)
            <tr>
                <td><img src="/images/{{ $post->image }}" width="100px"></td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->author }}</td>
                <td>{{ $post->price }}€</td>
                <td>{{ $post->condition }}</td>
            </tr>
            @endforeach
            @endif
            </table>
            </div>
</x-app-layout>