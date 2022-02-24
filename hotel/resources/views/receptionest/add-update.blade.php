 @extends('_layouts.master')
 @section('content')
 <div class="container">
     <div class="row d-flex justify-content-center">
         <div class="col-8">

             <form action="{{isset($receptionist)?'/save-receptionest/':'/store-receptionest'}}" method="post">
                 @csrf
                 <div class="row mt-5">
                     <div class="col-12 mb-3">
                         <input type="text" class="form-control" placeholder="Enter  Name ...." name='name'
                             value="{{ $receptionist->name??old('name') }}">
                         @error('name')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                     </div>

                     <div class="col-12 mb-3">
                         <input type="email" class="form-control" placeholder="Enter Email .... " name='email'
                             value="{{$receptionist->email?? old('email') }}">
                         @error('email')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                     </div>
                     @if(!isset($receptionist))
                     <div class="col-12 mb-3">
                         <input type="text" class="form-control" placeholder="Enter Password ...." name='password'
                             value="{{ old('password') }}">
                         @error('password')
                         <div class="text-danger">{{ $message }}</div>
                         @endif
                     </div>
                     <div class="col-12 mb-3">
                         <input type="number" class="form-control" placeholder="Enter National Id ...."
                             name='national_id' value="{{$receptionist->national_id?? old('national_id') }}">
                         @error('national_id')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                     </div>

                     <div class="col-12 mb-3">
                         <input type="text" class="form-control" placeholder="Avatar img" name='avatar'
                             value="{{ $receptionist->avatar??old('avatar') }}">
                     </div>

                     @endisset
                     @if(isset($receptionist))
                     <input type="hidden" class="form-control" placeholder="Enter National Id ...." name='id'
                         value="{{$receptionist->id}}">
                     @endisset

                     <input type="hidden" class="form-control" placeholder="Enter National Id ...." name='manager_id'
                         value="{{auth()->user()->id??1}}">
                     <div class="col-12 ">
                         <button type="submit" class="btn btn-primary">Submit </button>
                     </div>
                 </div>
             </form>
         </div>
     </div>

 </div>
 @endsection