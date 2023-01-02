@php
    function GetUser($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT name FROM users WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     return $result['name'];
    }
    function GetAvatarMessages($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT avatar FROM users WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     return '<img style="width:128px;height:128px;" src="data:image/jpeg;base64,'.base64_encode( $result['avatar'] ).'"/>';
     $mysqli->close();
    }
    function GetMessages($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT * FROM messages WHERE firstID = $x";
     $sth = $mysqli->query($sql);
     $friends_count=mysqli_num_rows($sth);
       if ($friends_count > 0) {
        while($row = $sth->fetch_assoc()) {
            echo "
                                <tr>
                                        <td>".GetAvatarMessages($row['secondID'])."</td>
                                        <td>".GetUser($row['secondID'])." ".GetVerifyFriend($row['secondID'],0)."</td>
                                        <td>Не прочитано</td>
                                        <td><a style=\"width:100%; margin-bottom:10px;\" href=\"/dialog/".$row['secondID']."\" class=\"badge badge-outline-success\">Перейти к диалогу</a><br><a style=\"width:100%;\" class=\"badge badge-outline-danger\">Удалить диалог</a></td>
                                </tr>";

    }
} else {
           echo "Друзей нет";
}
    $mysqli->close();
    }
@endphp
@include('pages/functions')
@extends('core/index')
@section('title', 'Сообщения - Crystal')
@section('messages', 'active')
@section('content')
    <div class="content-wrapper">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Сообщения @php echo GetUser($message->firstID) @endphp</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Фотография</th>
                                <th>Имя Фамилия</th>
                                <th>Состояние</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php GetMessages($message->firstID) @endphp
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php GetVerifyFriend($message->secondID,1);@endphp
@endsection
