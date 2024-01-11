@extends('layouts.app')

@section('title','الملف الشخصي')

@section('content')

<style>
    .form-group{
     margin: 18px 0px;
}

img{
    margin: 18px 0px;
}


</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Changa:wght@300&family=Noto+Kufi+Arabic:wght@700&family=Roboto&display=swap" rel="stylesheet">
<style>
    body{
        
        
        font-family: 'Changa', sans-serif;
        
    }

    h3{
        
font-family: 'Roboto', sans-serif;
    }
</style>

<div class="row">
    <div class="col-md-6 mx-auto" >
        <div class="card">
            <div class="text-center">
                <img src="{{asset('storage/' . auth()->user()->image)}}" alt="" width="82px" height="82px">

                <h3>
                    {{auth()->user()->name }}
                </h3>
            </div>
            <div class="card-body">
                <form action="/profile" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="name">الاسم</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{auth()->user()->name }}">
                        @error('name')

                         <div class="text-danger">
                            <small>{{$message }}</small>
                         </div>

                        @enderror
                    </div>

                    <div class="input-group mb-3 ">
                        <label for="email" class="input-group-text">البريد الالكتروني</label>
                        <input type="email" name="email" id="name" class="form-control" value="{{auth()->user()->email}}">
                        @error('email')

                         <div class="text-danger">
                            <small>{{$message }}</small>
                         </div>

                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <label for="password"class="input-group-text">كلمة المرور</label>
                        <input type="password" password="password" id="password" class="form-control">
                        @error('password')

                         <div class="text-danger">
                            <small>{{$message }}</small>
                         </div>

                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <label for="password-confirmation" class="input-group-text">تأكيد كلمة المرور</label>
                        <input type="password" name="password-confirmation" id="password-confirmation" class="form-control" >
                        @error('password-confirmation')

                         <div class="text-danger">
                            <small>{{$message }}</small>
                         </div>

                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">تغيير الصورة الشخصية</label>
                        <div class="input-group mb-3">
                            <input type="file" name="image" id="image" class="form-control">
                            <label for="image" id="image-label"class="input-group-text" data-beowse="استعراض"></label>
                            @error('image')

                            <div class="text-danger">
                                <small>{{$message }}</small>
                            </div>

                            @enderror
                        </div>
                    </div>

                    <div class="form-group d-flex mt-5">
                        <button type="submit" class="btn btn-primary me-2">حفظ التعديلات</button>
                        <button type="submit" class="btn btn-primary" form="logout">تسجيل الخروج</button>
                    </div>

                </form>
                <form action="/logout" id="logout" method="POST">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

@endsection