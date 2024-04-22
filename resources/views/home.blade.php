@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">メニュー</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!<br>


                    <div class="border col-12">
                        <div class="row">
                            <div class="col-md">
                                <br>
                                <button type="button" class="btn btn-outline-primary btn-block" onclick="location.href='{{ route('students.index') }}'">学生一覧</button>
                                <button type="button" class="btn btn-outline-primary btn-block" onclick="location.href='{{ route('student.create') }}'">学生追加</button>
                                <button type="button" class="btn btn-outline-primary btn-block" onclick="location.href='{{ route('students.index') }}'">学年更新（リンク未設定）</button>
                            </div>
                        </div>

                        <br>
                    </div>
                    


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
