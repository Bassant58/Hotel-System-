 @extends('_layouts.master')
 @section('content')
 <div class="container">
     <div class="row d-flex justify-content-center">
         <div class="col-8">
             <form action="{{isset($floor)?'/save-floor/':'/store-floor'}}" method="post">
                 @csrf
                 <div class="row mt-5">
                     <div class="col-12 mb-3">
                         <input type="text" class="form-control" placeholder="Enter  Name ...." name='name'
                             value="{{ $floor->name??old('name') }}">
                         @error('name')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                     </div>
                     @if(isset($floor))
                     <input type="hidden" class="form-control"  name='id' value="{{$floor->id}}">                   
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