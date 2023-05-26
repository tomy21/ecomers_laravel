@extends('ecommers.Layout.index')

@section('content')
    <div class="galery">
        <h3>{{ $name }}</h3>
        <div class="card-galery-list">
            @foreach ($data as $x)
                <div class="card-galery">
                    <div class="card-image">
                        <img src="{{ asset('assets/images/galery/' . $x->image . '') }}" style="width:100%;height:70%;border-radius:20px;"
                            alt="">
                    </div>
                    <div class="card-title">
                        <p>{{ $x->desc }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
