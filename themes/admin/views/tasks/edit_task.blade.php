@extends('layouts.master')
@section('content')
<div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

    <div class="bg-gray-800 ">
        <div class=" flex flex-wrap rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h1 class="font-bold w-full md:w-1/2 xl:w-1/2 text-left ">Edit Task</h1>
            <p class="font-bold w-full md:w-1/2 xl:w-1/2 text-right text-black "><a href="{{route('admin.viewTask')}}" class="rounded-sm px-3 bg-blue-400">All Task</a></p>
        </div>
    </div>
    <div class="w-full  p-6">
        <!--Table Card-->
        <div class="bg-white border-transparent rounded-lg shadow-xl">
            <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                <h2 class="font-bold uppercase text-gray-600">Form</h2>
            </div>
            <div class="p-5">
                <form class="w-full px-5 text-gray-700" action="{{ route('admin.updateTask') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{$task->id }}">
                    <div class="flex flex-wrap">
                      <label for="" class="font-bold">Name:</label>
                      <input type="text" name="name" id="" class="py-2 px-3 w-full" value="{{$task->title }}" placeholder="">
                      
                    </div>
                    <div class="flex flex-wrap">
                        <label for="" class="font-bold w-full">Instructions:</label>
                        <textarea name="inst" class="py-2 px-3 w-full" id="editor" >{{$task->inst }}</textarea>
                    </div>
                    <div class="flex flex-wrap py-2">
                        <div class="md:w-1/2 xl:w-1/2 text-left">
                            <label for="" class="font-bold w-full">Topic</label>
                            <input type="text" name="topic" id="" value="{{$task->topic }}" class="py-2 px-3">
                        </div>
                        <div class="md:w-1/2 xl:w-1/2 ">
                            @if($task->pdf=="NULL")
                            <img src="{{asset($task->img)}}" alt="" class="w-1 h-1">
                            @else
                            <label for="" class="font-bold w-full"> {{$task->pdf }} </label>
                            @endif
                            <label for="" class="font-bold w-full">PDF or Image(Optional) </label>
                            <input class="form-control block w-full px-3 py-1.5  sm:ml-3 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition  ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" name="file">
                        </div>
                        <
                    </div>
                    <div class="flex flex-wrap py-2">
                        <div class="md:w-1/2 xl:w-1/2 text-left">
                            <label for="" class="font-bold w-full">Point:</label>
                            <input type="number" name="point" id="" value="{{$task->point }}" class="py-2 px-3 ">
                        </div>
                        <div class="md:w-1/2 xl:w-1/2 ">
                            <label for="" class="font-bold w-full">Expair Date:</label>
                            <input type="date" name="exp_date" id="" value="{{$task->exp_date }}" class="py-2 px-3">
                        </div>
                        
                    </div>
                    <div class="flex justify-center"> 
                        <input type="submit" value="Update" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-sm" style="cursor: pointer"> 
                    </div>
                </form>
            </div>
        </div>
        <!--/table Card-->
    </div>
</div>
<script>
        ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
</script>

@endsection
