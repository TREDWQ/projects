@extends('layouts.app')


@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Changa:wght@300&family=Noto+Kufi+Arabic:wght@700&display=swap" rel="stylesheet">
<style>
    body{
        
        
        font-family: 'Changa', sans-serif;
    }
</style>
    <header class="d-flex justify-content-between aling-items-conter my-5" dir="rtl">
        <div class="h6 text-dark">
            <a href="/projects">المشاريع</a>
        </div>

        <div>
            <a href="/projects/create" class="btn btn-primary px-4" role="button">انشاء مشروع</a>
        </div>
    </header>
    <section class="row text-right" dir="rtl">
        @forelse($projects as $project)

             <div class="col-sm-12 col-md-6 col-lg-4 mb-4">

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

                                {{ Str::limit($project->description, 150) }}

                            </div>

                            @include('projects.footer')

                        </div>

                    </div>

                </div>

            </div>
            @empty
            @endforelse

        </section>
    @endsection
