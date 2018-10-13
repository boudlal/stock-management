@extends('layouts.app')

@section('header')
<style >
  label{
    color: black
  }
</style>

@endsection

@section('content')

    <div id="app">
        <calendar></calendar>
    </div>



@endsection

@section('script')




        <script src="{{ asset('js/app.js') }}"></script>



@endsection
