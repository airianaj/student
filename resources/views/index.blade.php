@extends('create')
  
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="text-left">
                <h2 style="font-size:1rem;">学生</h2>
            </div>
            <div class="text-right">
            <a class="btn btn-success" href="#">新規登録</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>grade</th>
            <th>name</th>
            <th>addres</th>
            <th>comment</th>
            <th>img</th>

        </tr>
        @foreach ($students as $student)
        <tr>
            <td style="text-align:right">{{ $student->id }}</td>
            <td style="text-align:right">{{ $student->grade }}</td>
            <td>{{ $student->name }}</td>
            <td style="text-align:right">{{ $student->addres }}</td>
            <td style="text-align:right">{{ $student->comment }}</td>
            <td> <a img src= {{ $student->img_path }}></td>
        </tr>
        @endforeach
    </table>
 
    {!! $students->links('pagination::bootstrap-4') !!}

@endsection