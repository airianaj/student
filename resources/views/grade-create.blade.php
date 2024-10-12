@extends('admin')
   
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">成績登録画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/home') }}">戻る</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
        <div class="alert alert-success mt-1"><p>{{ $message }}</p></div>
        @endif
 
<div style="text-align:left;">
<form action="{{ route('school_grade.store') }}" method="POST"　enctype="multipart/form-data">
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
                <input type="text" name="term" value="{{ old('term') }}" id="term" class="form-control" placeholder="学期">
                @error('term')
                <span style="color:red;">学期を入力してください</span>
                @enderror
            </div>
        </div>

        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                @php
                $subjects = [
                    'japanese' => '国語',
                    'math' => '数学',
                    'science' => '化学',
                    'social_studies' => '社会',
                    'music' => '音楽',
                    'home_economics' => '家庭科',
                    'english' => '英語',
                    'art' => '美術',
                    'health_and_physical_education' => '保健体育'
                ];
                $grades = ['A', 'B', 'C', 'D', 'F'];
            @endphp
            @foreach ($subjects as $subject => $label)
                <div>
                    <label for="{{ $subject }}">{{ $label }}:</label>
                    <select name="{{ $subject }}" id="{{ $subject }}">
                        @foreach ($grades as $grade)
                            <option value="{{ $grade }}" {{ old($subject) == $grade ? 'selected' : '' }}>{{ $grade }}</option>
                        @endforeach
                    </select>
                    @error('term')
                <span style="color:red;">学期を入力してください</span>
                @enderror
                </div>
            @endforeach
            </div>
        </div>
        
        <div class="col-12 mb-2 mt-2">
                <button type="submit" class="btn btn-primary w-100">登録</button>
        </div>
    </div>      
</form>
</div>
@endsection