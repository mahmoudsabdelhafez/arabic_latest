@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2>الاشتقاقات الاسمية الممكنة للفعل الثلاثي المزيد:                        </h2>
                        <a href="{{ route('augmented.index') }}" class="btn btn-secondary">الرجوع</a>
                    </div>
                </div>
                
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('augmented.store') }}" method="POST">
                        @csrf
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="root">الجذر</label>
                                    <input type="text" name="root" id="root" class="form-control" value="{{ old('root') }}" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pattern_id">الوزن الصرفي</label>
                                    <select name="pattern_id" id="pattern_id" class="form-control" required>
                                        <option value="">أختر الوزن الصرفي</option>
                                        @foreach($patterns as $pattern)
                                            <option value="{{ $pattern->id }}" {{ old('pattern_id') == $pattern->id ? 'selected' : '' }}>
                                                {{ $pattern->pattern }} ({{ $pattern->pattern_name ?? 'No description' }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="example">مثال</label>
                            <textarea name="example" id="example" class="form-control" rows="3" required>{{ old('example') }}</textarea>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="verbal_noun">المصدر الصريح</label>
                                    <input type="text" name="verbal_noun" id="verbal_noun" class="form-control" value="{{ old('verbal_noun') }}">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="verbal_noun2">التمييز</label>
                                    <input type="text" name="verbal_noun2" id="verbal_noun2" class="form-control" value="{{ old('verbal_noun2') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="active_participle">اسم الفاعل</label>
                                    <input type="text" name="active_participle" id="active_participle" class="form-control" value="{{ old('active_participle') }}">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="passive_participle">اسم المفعول</label>
                                    <input type="text" name="passive_participle" id="passive_participle" class="form-control" value="{{ old('passive_participle') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mimic_noun">المصدر الميمي</label>
                                    <input type="text" name="mimic_noun" id="mimic_noun" class="form-control" value="{{ old('mimic_noun') }}">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="industrial_noun">المصدر الصناعي</label>
                                    <input type="text" name="industrial_noun" id="industrial_noun" class="form-control" value="{{ old('industrial_noun') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="time_noun">اسم الزمان</label>
                                    <input type="text" name="time_noun" id="time_noun" class="form-control" value="{{ old('time_noun') }}">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="place_noun">اسم المكان</label>
                                    <input type="text" name="place_noun" id="place_noun" class="form-control" value="{{ old('place_noun') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="instrument_noun">اسم الآلة</label>
                                    <input type="text" name="instrument_noun" id="instrument_noun" class="form-control" value="{{ old('instrument_noun') }}">
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="form_noun">اسم الهيئة</label>
                                    <input type="text" name="form_noun" id="form_noun" class="form-control" value="{{ old('form_noun') }}">
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="preference_noun">اسم التفضيل</label>
                                    <input type="text" name="preference_noun" id="preference_noun" class="form-control" value="{{ old('preference_noun') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="adverb">الحال</label>
                            <input type="text" name="adverb" id="adverb" class="form-control" value="{{ old('adverb') }}">
                        </div>
                        
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Create Example</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection