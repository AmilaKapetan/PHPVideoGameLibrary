@extends('layouts.master')

@section('title', 'GAMEX/index')

@section('content')
    @include('layouts.topbar')
    @include('layouts.categorybar')
    @include('layouts.dbgames')
@endsection
