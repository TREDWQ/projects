@extends('layouts.app')

@section('content')



<header class="d-flex justify-content-between aling-items-conter my-5" dir="rtl">
        <div class="h6 text-dark">
            <a href="/projects">المشاريع / {{ $project->title }} </a>
        </div>

        <div>
            <a href="/projects/{{ $project->id }}/edit" class="btn btn-primary px-4" role="button"> تعديل المشروع </a>
        </div>

</header>

<style>
    

</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Changa:wght@300&family=Noto+Kufi+Arabic:wght@700&display=swap" rel="stylesheet">
<style>
    body{
        
        
        font-family: 'Changa', sans-serif;
    }
</style>

<section class="row text-right" dir="rtl" >

    <div class="col-lg-4">
        <!-- project details -->
            
        <div class="card card-height">

        <div class="card-body">

        <div class="status">

        @switch($project->status)
            @case(1)
                <span class="text-success">مكتمل</span>
            @break

            @case(2)
                <span class="text-danger">ملغي</span>
            @break

            @default
                <span class="text-warning">قيد الانجاز</span>
        @endswitch

        <h5 class="font-weight-bold card-title">

            <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>

        </h5>

            <div class="card-text mt-4">

                {{ $project->description }}

            </div>

                @include('projects.footer')

            </div>

        </div>

    </div>


    <div class="card mt-4">
        <div class="card-body">
            <h5 class="font-weight-bold">تغيير حالة المشروع</h5>
     <form action="/projects/{{ $project->id }}" method="POST">
            @csrf
            @method("PATCH")
        <select name="status" class="custom-select" onchange="this.form.submit()">

            <option value="0" {{($project->status == 0) ? 'selected' : '' }}>قيد الانجاز</option>
            <option value="1" {{($project->status == 1) ? 'selected' : '' }} >مكتمل</option>
            <option value="2" {{($project->status == 2) ? 'selected' : '' }} >ملغي</option>

        </select>
    </form>
        </div>
    </div>
</div>

    <div class="col-lg-8">
        <!-- tasks -->

            @foreach($project->tasks as $task)
            
            <div class="card p-3 mb-3 d-flex flex-row align-items-center">
                <div class=" {{$task->done ? 'checked muted' : ''}}">
                    {{$task->body}}
                </div>
                <div class="d-flex align-items-center me-auto">
                    <form action="/projects/{{$project->id}}/tasks/{{$task->id}}" method="POST">
                    @csrf    
                    @method("PATCH")
                    <div class="form-checks">
                        <input type="checkbox" name="done" class="form-control mt-2" {{$task->done ? 'checked' : ''}} onchange="this.form.submit()">
                        </div>
                    </form>
            </div>
                <div class="d-flex  align-items-center">

            <form action="/projects/{{$task->project_id}}/tasks/{{$task->id}}" method="POST" class="hide-submit"  >
               @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-2" value="">حذف </button>
            </form>

        </div>
            </div>

            @endforeach

            <div class="card mt-4">
                <form action="/projects/{{$project->id}}/tasks"class="p-3 d-flex" method="POST">
                    @csrf
                    <input type="text" name="body" class="form-control p-2 ml-3" placeholder="اضف مهمة جديد">
                    <button type="submit" class="btn btn-primary">اضافة</button>
                </form>
            </div>

    </div>

</section>

@endsection