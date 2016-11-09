@extends('layouts.app')

@section('content')
    <style type="text/css">
        .chat {
            padding: 0;
        }
        .chat li {
            margin-bottom: 10px;
            padding-bottom: 10px;
        }
        .chat li.left .chat-body {
            margin-left: 100px;
        }
        .chat li.right .chat-body {
            text-align: right;
            margin-right: 100px;
        }
        .panel-body {
            overflow-y: scroll;
            height: 400px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <h3>Usuários</h3>
                <ul class="list-group">
                    <li class="list-group-item" v-for="o in users">
                        <a href="#">[[ o.name ]]</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$room->name}}</div>

                    <div class="panel-body">
                        <ul class="chat list-unstyled">
                            <li v-for="on in messages" class="clearfix"
                            v-bind:class="{left: userId != on.user.id, right:userId == on.user.id}">
                                <span v-bind:class="{'pull-left': userId != on.user.id, 'pull-right':userId == on.user.id}">
                                    <img v-bind:src="createPhoto(on.user.email)" class="img-circle" />
                                </span>
                                <div class="chat">
                                    <strong>[[ on.user.name ]]</strong>
                                    <p>[[ on.message.content ]]</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <div class="input-group">
                            <input type="text" class="form-control input-md" id="message"
                                   placeholder="Digite sua mensagem" v-model="content" v-on:keyup.enter="sendMessage" />
                            <span class="input-group-btn">
                                <button class="btn btn-success btn-md" v-on:click="sendMessage">Enviar</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pre-script')
    <script type="text/javascript">
        var roomId = "{{$room->id}}";
        var userId = "{{ Auth::user()->id }}";
        var roomName = "{{ $room->name }}";

    </script>
    @endsection