@extends('admin')
   
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">学生登録画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/students') }}">戻る</a>
        </div>
    </div>
</div>
 
<div style="text-align:left;">
<form action="{{ route('student.store') }}" method="POST"　enctype="multipart/form-data">
    @csrf
     
     <div class="row">

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="grade"  value="{{ old('grade') }}" id="grade" class="form-control" placeholder="学年">
                @error('grade')
                <span style="color:red;">学年を半角数値で入力してください</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control" placeholder="名前">
                @error('name')
                <span style="color:red;">名前を入力してください</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="addres" value="{{ old('addres') }}" id="addres" class="form-control" placeholder="住所">
                @error('addres')
                <span style="color:red;">住所を入力してください</span>
                @enderror
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
            <textarea class="form-control" style="height:100px" name="comment"  placeholder="コメント">{{ old('comment') }}</textarea>
            @error('comment')
            <span style="color:red;">コメントを140文字で入力してください</span>
            @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <label>画像を投稿する</label>
            <input type="file" name="img_path" class="form-control-file"　accept=".jpg,.png,image/gif,image/jpeg,image/png">
            @error('img_path')
            <span style="color:red;">画像を登録してください</span>
            @enderror
          </div>

        <div class="col-12 mb-2 mt-2">
                <button type="submit" class="btn btn-primary w-100">登録</button>
        </div>
    </div>      
</form>
</div>
@endsection