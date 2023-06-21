<style>
    .creation{
        margin-left: 150px;
        width:80%;
        padding-top:10px;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post ') }}
        </h2>
    </x-slot>
@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
     
    <form class="creation" action="{{ route('update',$post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      
         <div class="row">
         <table><tr>
         <td>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $post->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <br>
                    <strong>Author:</strong>
                    <input type="text" name="author" value="{{ $post->author }}" class="form-control" placeholder="Author">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <br>
                    <strong>Price:</strong>
                    <input type="number" min="0.00" max="10000.00" step="0.01" name="price" value="{{ $post->price }}" class="form-control" placeholder="Price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <br>
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $post->description }}</textarea>
                </div>
            </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <br>
                    <strong>Image:</strong>
                        <input type="file" name="image" class="form-control" placeholder="image"></td>
                        <td style="width:270px; padding-left:30px; vertical-align: top;"><img src="/images/{{ $post->image }}">
                    </div>
                </div></td>
            </tr></table>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-outline-success" style="margin-top:10px; margin-bottom: 10px; margin-right:240px;">Save</button>
            </div>
        </div>
      
    </form>
</x-app-layout>