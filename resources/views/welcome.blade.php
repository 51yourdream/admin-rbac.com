@extends('layouts.app')

@section('content')
    <script src="https://js.pusher.com/3.0/pusher.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
                <script>
//                    var pusher = new Pusher('4d3deee95808fd9b90a4', {
//                        encrypted: true
//                    });
//
//                    var channel = pusher.subscribe('user2');
//                    console.log(channel);
//                    channel.bind('app.server-created', function(message) {
//                        console.log(message.user);
//                        alert(message);
//                    });
                    Pusher.log = function(message) {
                        if (window.console && window.console.log) {
                            window.console.log(message);
                        }
                    };
                    this.pusher = new Pusher('7f7428767e9ab95642f1', {
                        encrypted: true
                    });

                    this.pusherChannel = this.pusher.subscribe('user2');

                    this.pusherChannel.bind('App\\Events\\ServerCreated', function(message) {
                        alert(message);
                        console.log(message.user);
                    });

                </script>
            </div>
        </div>
    </div>
</div>
@endsection
