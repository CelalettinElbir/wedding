@extends('layout2')

@include('partials.lastnavbarindex')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Chats</div>

                    <div class="panel-body">
                        <ul class="chat">
                            @foreach (Auth::guard('web')->user()->messages as $message)
                                <li>{{ $message->message }}</li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="panel-footer">
                        <div class="input-group">
                            <input id="message-input" type="text" name="message" class="form-control "
                                placeholder="Type your message here...">

                            <span class="input-group-btn">
                                <button class="btn btn-primary" id="btn-chat">
                                    Send
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('eb16e52b6fec12f8049b', {
            cluster: 'mt1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
        });
    </script>
    <script>
        let createMessageUrl = "{{ route('store_message') }}"
        let token = "{{ csrf_token() }}"
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $("#btn-chat").click(function() {

            $message = $("#message-input").val();
            console.log($message);


            $.ajax({
                url: createMessageUrl,
                type: 'post',
                data: {
                    _token: token,
                    "message": $message

                },
                success: function(result) {
                    alert(result);
                }

            });

        });
    </script>
@endsection
