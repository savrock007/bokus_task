@section('like-button-script')
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
