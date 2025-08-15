@extends('admin.layouts.app')

@section('head-tag')
    <title>ادمین</title>
    <style>
        .main-ads{
            background: white;
            width: 957px;
            height: 900px;
            border-radius: 10px;
        }
    </style>
@endsection

@section('content')
        <div class="main-ads">
            <?= dd($ads) ?>
        </div>
@endsection