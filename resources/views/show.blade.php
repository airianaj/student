@extends('admin')
   
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">学生詳細画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/students') }}?page={{ $page_id }}">戻る</a>
        </div>
    </div>
</div>
 

<div style="text-align:left;">
    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
        学年：{{ $student->grade }}                
        </div>
    </div>

    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
        名前：{{ $student->name }}
        </div>             
    </div>

    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
        住所：{{ $student->addres }} 
        </div>              
    </div>

    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
        コメント：{{ $student->comment }}    
        </div>            
    </div>

    <div class="col-12 mb-2 mt-2">
        <div class="form-group">
        {{ $student->img_path }}    
        </div>            
    </div>

    
    <div class="ml-2">
        <div class="row">
        
            <div>
                <a class="btn btn-outline-primary"　style="margin:0px 10px;" href="{{ route('student.edit',$student->id) }}">学生編集</a>
            </div>

            <div>
                <a class="btn btn-outline-primary" style="margin:0px 10px;" href="{{ url('student.edit',$student->id) }}">成績追加</a>
            </div>

            <div>
                <a class="btn btn-outline-primary" style="margin:0px 10px;" href="{{ url('student.edit',$student->id) }}">成績編集</a>
            </div>
       </div>

        <form action="{{ route('student.destroy',$student->id) }}" method="POST"> 
            @csrf @method('DELETE') 
            <button type="submit" class="btn btn-outline-danger" style="margin-top:10px;" onclick='return confirm("削除しますか？");'>削除
        </button>
        </form>
    </div>

</div>
@endsection