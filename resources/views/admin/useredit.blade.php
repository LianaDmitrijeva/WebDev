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
            {{ __('Edit User ') }}
        </h2>
    </x-slot>
@if ($errors->any())
        <div style="margin-left: 150px; width:80%;" class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
     
    <form class="creation" action="{{ route('userupdate',$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      
         <div class="row">
         <table><tr>
         <td>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User Type:</strong>
                    <input type="text" name="usertype" value="{{ $user->usertype }}" class="form-control" placeholder="Usertype">
                </div>
            </div></td>
            </tr></table>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-success" style=" width:100%; margin-top:10px; margin-bottom:10px;">Save</button>
            </div>
        </div>
      
    </form>
</x-app-layout>