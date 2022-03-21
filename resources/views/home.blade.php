
@extends('layouts.app')

@section('intro')
<div class="col-md-6 ml-3 text-white rounded-lg bg-dark">   
        <div class="col-md-8 ml-3 px-0">
          <h1 class="display-4 font-italic">Узнавай новое!</h1>
          <p class="lead my-3">Читай статьи на разные темы на этом сайте...</p>
        </div>
</div>
@endsection

@section('line')
<div class='row'>
    <u class='lead my-3 ml-5'>Последнии статьи</u>
</div>
@endsection

@section('content')
    <div class = 'container-fluid'>
        <div class = 'row'>
            @foreach($data as $el)
                <div class="col-md-4 mt-3" align="center">
                    <div class="card">
                        <img class="card-img-top" src='https://placeimg.com/420/320/tech' alt="Card image cap">
                        <div class="card-body">
                            <div class="mb-1 text-muted">{{$el->added_at}}</div>
                            <h5 class="card-title">{{$el->article_name}}</h5>
                            <p class="card-text">{{ Str::limit($el->article_text, 100) }}</p>
                            <a href="{{  route('OneArticle',$el->id)  }}" class="btn btn-primary">Читать далее...</a>
                        </div>
                    </div>
                    
                </div>
        
            @endforeach
        </div>
    </div>



@endsection

