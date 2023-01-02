@php
    function GetAvatar($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT avatar FROM users WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     echo '<img height="90%" width="100%" src="data:image/jpeg;base64,'.base64_encode( $result['avatar'] ).'"/>';
     $mysqli->close();
    }
    function GetCommunityAvatar($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT logo FROM community WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     echo '<img style="width:128px;height:128px;" src="data:image/jpeg;base64,'.base64_encode( $result['logo'] ).'"/>';
     $mysqli->close();
    }
    function GetAuthor($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT name FROM users WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     echo $result['name'];
     $mysqli->close();
    }
@endphp
@include('pages/functions')
@extends('core/index')
@section('title', 'Сообщества - Crystal')
@section('community', 'active')
@section('content')
    <div class="content-wrapper">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Сообщества</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Фотография</th>
                                <th>Название</th>
                                <th>Описание</th>
                                <th>Автор</th>
                                <th>Участники</th>
                                <th>Ссылка</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($community as $communite)
                                <tr>
                                    <td>@php GetCommunityAvatar($communite->id); @endphp</td>
                                    <td> {{$communite->name}} @php GetGroupVerify($communite->id,0) @endphp</td>
                                    <td> {{$communite->description}} </td>
                                    <td> @php GetAuthor($communite->idCreator) @endphp </td>
                                    <td> @php echo number_format($communite->users, 0, '.', '.');@endphp</td>
                                    <td>
                                        <a href="/group/{{$communite->id}}"
                                           class="badge badge-outline-success">Перейти</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php GetGroupVerify($communite->id,1) @endphp
@endsection
