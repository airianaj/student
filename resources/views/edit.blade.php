@extends('admin')
   
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">学生編集画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('student.show',$student->id) }}">戻る</a>
        </div>
    </div>
</div>
 

<div style="text-align:left;">

    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-1"><p>{{ $message }}</p></div>
        @endif

    <form action="{{ route('student.update', $student->id) }}" method="POST"　enctype="multipart/form-data">
        @method('PUT')
        @csrf
         
         <div class="row">
    
            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <input type="text" name="grade"  value="{{ $student->grade }}" id="grade" class="form-control" placeholder="学年">
                    @error('grade')
                    <span style="color:red;">学年を半角数値で入力してください</span>
                    @enderror
                </div>
            </div>
    
            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <input type="text" name="name" value="{{ $student->name }}" id="name" class="form-control" placeholder="名前">
                    @error('name')
                    <span style="color:red;">名前を入力してください</span>
                    @enderror
                </div>
            </div>
    
            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <input type="text" name="addres" value="{{ $student->addres }}" id="addres" class="form-control" placeholder="住所">
                    @error('addres')
                    <span style="color:red;">住所を入力してください</span>
                    @enderror
                </div>
            </div>
            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                <textarea class="form-control" style="height:100px" name="comment"  placeholder="コメント">{{ $student->comment }}</textarea>
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
                    <button type="submit" class="btn btn-primary w-100">更新</button>
            </div>
        </div>      
    </form>

</div>
@endsection