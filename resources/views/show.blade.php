<style>
    .view{
        margin-left: 150px;
        /* width:80%; */
        padding-top:30px;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Post ') }}
        </h2>
</x-slot>
    <div class="row">
        <div class="view">
            <table>
                <tr>
                    <td style="padding-right:30px">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group" style="width:200px">
                                <img src="/images/{{ $post->image }}">
                            </div>
                        </div>
                    </td>
                    <td style="vertical-align: top;">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {{ $post->name }}
                            </div>
                        </div>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Author:</strong>
                                {{ $post->author }}
                            </div>
                        </div>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Price:</strong>
                                {{ $post->price }}
                            </div>
                        </div>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Condition:</strong>
                                {{ $post->condition }}
                            </div>
                        </div>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description:</strong>
                                <div style="width:80%;">
                                    {{ $post->description }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Published by:</strong><br>
                                @if ($post->user)
                                    {{ $post->user->name }}
                                    <br>
                                    ID: {{ $post->user_id }}
                                @else
                                    User not found
                                @endif
                            </div>
                        </div>
                        <br>
                    </td>     
                </tr>
            </table>
            @if (auth()->user()->usertype == 'user')
                @if (auth()->check() && auth()->user()->id === $post->user_id)
                @else
                <form action="{{ route('favorite.add', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <button style=" width:80%; margin-top:10px; margin-bottom:10px;" class="btn btn-danger">Add to Wishlist</button>
                </form>
                @endif
            @else
            <form action="{{ route('destroy',$post->id) }}" method="POST">
                <a style=" width:80%; margin-top:10px; margin-bottom:10px;" class="btn btn-secondary" href="{{ route('edit',$post->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button style=" width:80%; margin-top:10px; margin-bottom:10px;" type="submit" class="btn btn-outline-danger">Delete</button>
                </form>`
            @endif
        </div>  
    </div>
</x-app-layout>