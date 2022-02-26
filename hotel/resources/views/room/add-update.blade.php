 @extends('_layouts.master')
 @section('content')
 <div class="container">
     <div class="row d-flex justify-content-center">
         <div class="col-8">
             <form action="{{isset($room)?'/save-room/':'/store-room'}}" method="post">
                 @csrf
                 <div class="row mt-5">
                     <div class="col-12 mb-3">
                         <input type="text" class="form-control" placeholder="Enter  capacity ...." name='capacity'
                             value="{{ $room->capacity??old('capacity') }}">
                         @error('capacity')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                     </div>
                     <div class="col-12 mb-3">
                         <input type="text" class="form-control" placeholder="Enter  Price ...." name='price'
                             value="{{ $room->price??old('price') }}">
                         @error('price')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                     </div>
                     <div class="col-12 mb-3">
                     <select class="form-control" style="border-radius: 7px;
                        border: 1px lightgrey solid;cursor:pointer" name="floor_id" class=" block mt-1 w-full">
                        @foreach($floors as $floor)
                            <option value="{{$floor->id}}">{{$floor->name}}</option>
                        @endforeach
                    </select>
                         @error('price')
                         <div class="text-danger">{{ $message }}</div>
                         @enderror
                     </div>
                     @if(isset($room))
                     <input type="hidden" class="form-control"  name='id' value="{{$room->id}}">                   
                     @endisset
                     <div class="col-12">
                         <button type="submit" class="btn btn-primary">Submit </button>
                        </div>
                 </div>
             </form>
         </div>
     </div>

 </div>
 @endsection