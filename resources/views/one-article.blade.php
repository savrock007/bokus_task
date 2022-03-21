@extends('layouts.app')




@section('intro')
    <div class='row justify-content-center'>
    
        <h1>{{$data->article_name}}</h>    
    </div>
@endsection




@section('line')
    <div class = 'row mb-2'>
        <div class='col-md-2 offset-md-2'>
            <button type="button" class="btn btn-primary like">
                <span class="bi bi-heart">
                    <label class ='likes ml-2'> {{$data->likes}} </label>
                </span>
            </button>
        </div>

    
        @foreach($tags as $tag)
            <div class='col-1 ml-4  align-self-center'>
                <a href="/articles?tag={{$tag->id}}" class="post-tag" title="" rel="tag"><u>{{$tag->tag_name}}</u></a>
            </div>
         @endforeach
        </div>

    </div>
@endsection




@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <p>{{$data->article_text}}</p>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class='col-8'>

            <h2><u>Оставить комментраий</u></h2>
            <div id='success_message'></div>
            <div id = 'comment_section'>
                <ul id ='savefrom_errList'></ul>
                <div class='form-group'>
                    <input type='text' class='subject form-control mt-4' placeholder='Тема Сообщения'>
                </div>

                <div class='form-group'>
                    <input type='text' class='comment_text form-control mt-4' placeholder='Текст Сообщения'>
                </div>


                <div class="row justify-content-left">
                    <div class='col-4'>
                        <div class='form-group'>
                            <button type='submit' class='bnt btn-primary submit_comment mt-4'>Отправить</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>   


    <!--script for comment section-->
    <script>
        $(document).ready(function () {
            $(document).on('click', '.submit_comment', function (e) {
                e.preventDefault();

                var data = {
                    'id' : '{{$data -> id}}',
                    'subject' : $('.subject').val(),
                    'comment_text' :  $('.comment_text').val(),
                };

                console.log(data)
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/articles/{{$data->id}}/submit",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        if(response.status ==400){

                            $('#savefrom_errList').html('');
                            $('#savefrom_errList').addClass('alert alert-danger');
                            $.each(response.errors,function(key,err_values){
                                $('#savefrom_errList').append('<li>'+err_values+'</li>');
                            });
                        } 
                        else{
                            $('#savefrom_errList').html('');
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            $('#comment_section').hide();
                        }
                        
                        
                    }
                });
            });
        });
    </script>






<!--script for like button-->
    <script>
        $(document).ready(function () {
            $(document).on('click', '.like', function (e) {
                e.preventDefault();

                var data = {
                    'id' : '{{$data -> id}}'
                };
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/articles/{{$data->id}}",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        var NewLikes = response.NewLikes
                        console.log(response.NewLikes);
                        $('.likes').html(response.NewLikes);
                        
                    }
                });
            });
        });
    </script>

@endsection
