@extends('ecommers.Layout.index')

@section('content')
    <div class="karir">
        <h3>{{ $name }}</h3>
        <div class="card-karir-list">
            @foreach ($data as $x)
                <div class="card-karir">
                    <img src="{{ asset('assets/images/galery/' . $x->image . '') }}" style="width:100%;border-radius:20px;padding:10px;" alt="">
                </div>
            @endforeach

        </div>
    </div>
@endsection
