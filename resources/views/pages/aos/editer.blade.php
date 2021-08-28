@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4>Modifier un AO</h4>
                </div>
                <div class="button">
                    <a href="{{route('aos.consulter')}}" class="btn btn-success">consulter les aos</a>
                </div>
            </div>
            <div class="card-body">
                @include('flash')
                <form action="{{route('aos.update', $ao)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('pages.aos.edit.section_1')
                    @include('pages.aos.edit.section_2')
                    @include('pages.aos.edit.section_3')
                </form>
            </div>
        </div>
    </div>
@endsection
