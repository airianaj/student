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
            @if($student->img_path)
            <img src="{{ asset('images/' . $student->img_path) }}" alt="{{ $student->name }}" width="100" height="100">
        @else
            <img src="{{ asset('images/') }}" alt="No Image" width="100" height="100">
        @endif  
        </div>            
    </div>


    <!-- 成績の表示 -->
    <div class="col-12 mb-2 mt-2">
        <h3>成績</h3>
        <table border="1" cellpadding="5">
            <thead>
                <tr>
                    <th>学期</th>
                    <th>国語</th>
                    <th>数学</th>
                    <th>理科</th>
                    <th>社会</th>
                    <th>音楽</th>
                    <th>家庭科</th>
                    <th>英語</th>
                    <th>美術</th>
                    <th>保健体育</th>
                </tr>
            </thead>
            <tbody>
                @foreach($student->school_grades as $grade)
                    <tr>
                        <td>{{ $grade->term }}</td>
                        <td>{{ $grade->japanese }}</td>
                        <td>{{ $grade->math }}</td>
                        <td>{{ $grade->science }}</td>
                        <td>{{ $grade->social_studies }}</td>
                        <td>{{ $grade->music }}</td>
                        <td>{{ $grade->home_economics }}</td>
                        <td>{{ $grade->english }}</td>
                        <td>{{ $grade->art }}</td>
                        <td>{{ $grade->health_and_physical_education }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
    <div class="ml-2">
        <div class="row">
        
            <div>
                <a class="btn btn-outline-primary"　style="margin:0px 10px;" href="{{ route('student.edit',$student->id) }}">学生編集</a>
            </div>

            <div>
                <a class="btn btn-outline-primary" style="margin:0px 10px;" href="{{ route('school_grade.create',$student->id) }}">成績追加</a>
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