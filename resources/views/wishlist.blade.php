<style>
    .header{
        background-color: #D5D5D5 ; 
        color: white;
        text-align:center;
        text-shadow: 1px 1px 2px black;
    }
    .content{
        text-align:center;
    }
</style>
<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($posts->isEmpty())
                    @if ($message = Session::get('success'))
                        <div style="margin-left: 150px; width:80%;" class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        <br>
                    @endif
                        <div class="records">
                            <strong>Currently your Wishlist is empty.</strong>
                        </div>
                    @else
                    <p>
                        <strong>Your Wishlist</strong>
                    </p>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto">
                            <div class="p-1.5 w-full inline-block align-middle">
                                <div class="overflow-hidden border rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th style="width: 5%;" class="header">
                                                    ID
                                                </th>
                                                <th style="width: 20%;" class="header">
                                                    Name
                                                </th>
                                                <th style="width: 20%;" class="header">
                                                    Author
                                                </th>
                                                <th style="width: 5%;" class="header">
                                                    Price
                                                </th>
                                                <th style="width: 10%;" class="header">
                                                    Condition
                                                </th>
                                                <th style="width: 20%;" class="header">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">
                                        @foreach ($posts as $post)
                                            <tr class="content">
                                                <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap">
                                                    {{ $post->id }}
                                                </td>
                                                <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap">
                                                    {{ $post->name }} 
                                                </td>
                                                <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap">
                                                    {{ $post->author }} 
                                                </td>
                                                <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap">
                                                    {{ $post->price }} 
                                                </td>
                                                <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap">
                                                    {{ $post->condition }} 
                                                </td>
                                                <td lass="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                <form action="{{ route('favorite.remove',$post->id) }}" method="POST" 
                                                    onsubmit="return confirm('{{ trans('Are you sure you want to delete this post form your Wishlist?') }}');"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <a class="btn btn-secondary" href="{{ route('show',$post->id) }}">View</a>
                                                    <button type="submit" class="btn btn-outline-danger">Remove</button>
                                                </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                
            </div>
        </div>
    </div>
</x-app-layout>