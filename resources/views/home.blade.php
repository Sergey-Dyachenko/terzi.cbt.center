@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <table class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Вы вошли в систему!

                            <form  class="send-form" method="POST" action="/search-clients" style="margin-bottom:50px; ">
                                {{csrf_field()}}
                                <label for="">from</label><input class="send-form__date" name="from" data-date-format="yyyy-mm-dd" id="datepicker_from">
                                <label for="">to</label><input class="send-form__date" name="to"  data-date-format="yyyy-mm-dd" id="datepicker_to">
                                <input style="display: block; padding: 5px 20px;" class="send-form__submit btn" type="submit" value="просмотр"/>
                            </form>


                        <ul>
                            <h2>Список клиентов</h2>
                            <p ><b>Period</b>:<span>from: {{$data['from']}} </span>  <span>to: {{$data['to']}}</span> </p>
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>имя</th>
                            <th>e-mail</th>
                            <th>телефон</th>
                            <th>город</th>
                            <th>компания</th>
                            <th>комментарии</th>
                            <th>дата</th>
                        </tr>
                    </thead>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{$client->id}}</td>
                            <td>{{$client->name}}</td>
                            <td>{{$client->email}}</td>
                            <td>{{$client->phone}}</td>
                            <td>{{$client->city}}</td>
                            <td>{{$client->company}}</td>
                            <td>{{$client->comments}}</td>
                            <td>{{$client->created_at}}</td>
                        </tr>
                    @endforeach
                        </ul>
                    </table>


                        </div>
                </div>
            </div>
    <div class="row">
        <div class="col-xs-12">
            <a href="/export">Загрузить Excel</a>
        </div>
    </div>
        </div>
    </div>
</div>
@endsection
