@csrf
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Changa:wght@300&family=Noto+Kufi+Arabic:wght@700&display=swap" rel="stylesheet">
<style>
    .form-group{
        
        margin: 20px 0px;
        font-family: 'Changa', sans-serif;
    }
</style>

<div class="form-group">
    
    <label for="title">عنوان المشروع</label>
   <input type="text" class="form-control" id="title" name="title" value="{{$project->title}}">
    @error('title')

      <div class="text-danger">
        <small> {{ $message  }} </small>
      </div>

    @enderror
</div>

<div class="form-group">
    
    <label for="description">وصف المشروع</label>
   <textarea name="description" id="description" class="form-control">{{$project->title}}</textarea>
   @error('description')

    <div class="text-danger">
        <small> {{ $message  }} </small>
    </div>

    @enderror
</div>