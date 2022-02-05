@extends('layouts.master')
@section('content')
<div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

    <div class="bg-gray-800 ">
        <div class=" flex flex-wrap rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h1 class="font-bold w-full md:w-1/2 xl:w-1/2 text-left ">View Task</h1>
            <p class="font-bold w-full md:w-1/2 xl:w-1/2 text-right text-black "><a href="{{ route('admin.addTask') }}" class="rounded-sm px-3 bg-blue-400">Add Task</a></p>
        </div>
    </div>

    

    <div class="w-full  p-10">

        @if(Session::has('success'))
    <div x-data="{ show: true }" x-show="show" class="bg-green-400 border border-green-700 text-white px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Holy smokes!</strong>
        <span class="block sm:inline">{{ Session::get('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg @click="show = false" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
      </div>
      @endif
      @if(Session::has('error'))
      <div x-data="{ show: true }" x-show="show" class="bg-red-100 border border-red-700 text-red-400 px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">Error!</strong>
          <span class="block sm:inline">{{ Session::get('error') }}</span>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg @click="show = false" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
          </span>
        </div>
      @endif

    <table class="border-separate border border-slate-400 ...">
        <thead>
          <tr>
            <th class="border border-slate-300 ...">Name</th>
            <th class="border border-slate-300 ...">Instructions</th>
            <th class="border border-slate-300 ...">Topic</th>
            <th class="border border-slate-300 ...">PDF/Image</th>
            <th class="border border-slate-300 ...">Point</th>
            <th class="border border-slate-300 ...">Expair Date</th>
            <th class="border border-slate-300 ...">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td class="border border-slate-300 ...">{{$task->title}}</td>
                <td class="border border-slate-300 ...">{!!$task->inst !!}</td>
                <td class="border border-slate-300 ...">{{$task->topic}}</td>
                @if($task->pdf=="NULL")
                <td class="border border-slate-300 ...">{{$task->img}}</td>
                @elseif($task->img=="NULL")
                <td class="border border-slate-300 ...">{{$task->pdf}}</td>
                @endif

                <td class="border border-slate-300 ...">{{$task->point}}</td>
                <td class="border border-slate-300 ...">{{$task->exp_date}}</td>
                <td class="border border-slate-300 ...">
                      <a class="rounded-sm px-3 bg-green-400" href="{{ route('admin.editTask',['id'=>$task->id]) }}">EDIT</a>
                      <a class="rounded-sm px-3 bg-red-400" href="{{ route('admin.deleteTask',['id'=>$task->id]) }}">DELETE</a>
                </td>
              </tr>
            @endforeach
         
        </tbody>
      </table>
    </div>
@endsection
