
@extends('layouts.app')

@section('intro')
<div class='row'>
    <div class="col-md-7 ml-3 text-white rounded-lg bg-dark">   
            <div class="col-md-7 ml-3 px-0">
            <h1 class="display-4 font-italic">Каталог Статей</h1>
            
            </div>
    </div>
</div>
@endsection
    


@section('content')
    <div class='container'>
    @foreach($data as $el)
        <div class="card mt-5">
            <div class="row">
                <div class="col-4">
                    <img src='https://placeimg.com/420/320/arch' class='img-fluid'>
                </div>
                <div class="col-8 mt-3">
                    <div class="mb-1 text-muted">{{$el->added_at}}</div>
                    <h5 class="card-title">{{$el->article_name}}</h5>
                    <p class='mb-3'>{{ Str::limit($el->article_text, 100) }}</p>
                    <a href="{{route('OneArticle',$el->id)}}" class="btn btn-primary" >Читать далее...</a>
                </div>
            </div>
        </div>            
    @endforeach
    </div>
    <span style="margin:auto; display:table;">
        {{ $data->render()}}
    </span>
@endsection