@extends('admin')
  
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text-left">
                <h2 style="font-size:1rem;">学生</h2>
            </div>
            <div class="text-left">
            <a class="btn btn-success" href="{{ route('student.create') }}">新規登録</a>
            </div>

            <div class="text-left" style="margin-top: 15px;">
                <a class="btn btn-success" href="{{ route('home') }}">メニュー画面</a>
                </div>

        </div>
    </div>

    <!-- 検索フォーム -->
    <div class="row" style="padding-bottom: 30px; margin-left: 0px; margin-right: 15px;">
        <div class="col-sm-10" style="padding-left:0; margin-top: 15px;">
            <form method="get" action="" class="form-inline">
                <div class="form-group">
                    <input type="text" name="keyword" class="form-control" value="" placeholder="検索キーワード">
                </div>
                <div class="form-group">
                    <input type="submit" value="検索" class="btn btn-info" style="margin-left: 15px; color:white;">
                </div>
            </form>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>grade</th>
            <th>name</th>
            <!-- <th>addres</th>
            <th>comment</th>
            <th>img</th> -->
            <th>opration</th>

        </tr>
        @foreach ($students as $student)
        <tr>
            <td style="text-align:right">{{ $student->id }}</td>
            <td style="text-align:right">{{ $student->grade }}</td>
            <td style="text-align:right">{{ $student->name }}</td>
            <!-- <td style="text-align:right">{{ $student->addres }}</td>
            <td style="text-align:right">{{ $student->comment }}</td>
            <td style="width: 20%;"> <img src="{{ Storage::url($student->img_path) }}" alt="" class="img-fluid" width="85"></td> -->
            <td style="text-align:center">
                <a href="" class="btn btn-primary btn-sm">詳細</a>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $students->links('pagination::bootstrap-4') !!}

@endsection