 @extends('_layouts.master')
 @section('content')
 <div class="container">
     <div class="row d-flex justify-content-center">
         <div class="col-8">
             <form action="{{isset($manger)?'/save-manager/':'/store-manager'}}" method="post">
                 @csrf
                 <div class="row mt-5">
                     <div class="col-12 mb-3">
                         <input type="text" class="form-control" placeholder="Enter  Name ...." name='name'
                             value="{{ $manger->name??old('name') }}">
                         @error('name')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                     </div>

                     <div class="col-12 mb-3">
                         <input type="email" class="form-control" placeholder="Enter Email .... " name='email'
                             value="{{$manger->email?? old('email') }}">
                         @error('email')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                     </div>
                     @if(!isset($manger))
                     <div class="col-12 mb-3">
                         <input type="text" class="form-control" placeholder="Enter Password ...." name='password'
                             value="{{ old('password') }}">
                         @error('password')
                         <div class="text-danger">{{ $message }}</div>
                         @endif
                     </div>
                     <div class="col-12 mb-3">
                         <input type="number" class="form-control" placeholder="Enter National Id ...."
                             name='national_id' value="{{$manger->national_id?? old('national_id') }}">
                         @error('national_id')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                     </div>

                     <div class="col-12 mb-3">
                         <input type="text" class="form-control" placeholder="Avatar img" name='avatar'
                             value="{{ $manger->avatar??old('avatar') }}">
                     </div>

                     @endisset
                     @if(isset($manger))
                     <input type="hidden" class="form-control" placeholder="Enter National Id ...." name='id'
                         value="{{$manger->id}}">
                     @endisset

                     <div class="col-12 ">
                         <button type="submit" class="btn btn-primary">Submit </button>
                     </div>
                 </div>
             </form>
         </div>
     </div>

 </div>
 @endsection