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
    function GetFirstUserMessage($x,$y){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT * FROM messages WHERE firstID = $x AND secondID = $y";
     $sth = $mysqli->query($sql);
     $friends_count=mysqli_num_rows($sth);
       if ($friends_count > 0) {
        while($row = $sth->fetch_assoc()) {
            echo "
                                <tr>
                                        <td>".GetAvatarMessages($row['firstID'])."</td>
                                        <td>".GetUser($row['firstID'])." ".GetVerifyFriend($row['firstID'],0)."</td>
                                        <td>".$row['messageText']."</td>
                                        <td>".date('d.m.Y H:i:s',$row['datentime'])."</td>
                                </tr>";

    }
} else {
           echo "Сообщений нет";
}
    $mysqli->close();
    }
    function GetSecondUserMessage($x,$y){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT * FROM messages WHERE firstID = $x AND secondID = $y";
     $sth = $mysqli->query($sql);
     $friends_count=mysqli_num_rows($sth);
       if ($friends_count > 0) {
        while($row = $sth->fetch_assoc()) {
            echo "
                                <tr>
                                        <td>".GetAvatarMessages($row['firstID'])."</td>
                                        <td>".GetUser($row['firstID'])." ".GetVerifyFriend($row['firstID'],0)."</td>
                                        <td>".$row['messageText']."</td>
                                        <td>".date('d.m.Y H:i:s',$row['datentime'])."</td>
                                </tr>";

    }
} else {
           echo "Сообщений нет";
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
                    <h4 class="card-title" style="text-transform: none;">Личная переписка</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Фотография</th>
                                <th>Имя Фамилия</th>
                                <th>Сообщение</th>
                                <th>Отправлено</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php GetFirstUserMessage($dialog->secondID,$dialog->firstID) @endphp
                            @php GetSecondUserMessage($dialog->firstID,$dialog->secondID) @endphp
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
