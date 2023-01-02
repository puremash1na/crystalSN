@php
    function GetStatusFriends($x){
        if($x == 0) return "Не в друзьях";
        if($x == 1) return "Заявка отправлена";
        if($x == 2) return "В друзьях";
    }
    function GetUser($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT name FROM users WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     return $result['name'];
    }
    function GetAvatarFriends($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT avatar FROM users WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     return '<img style="width:128px;height:128px;" src="data:image/jpeg;base64,'.base64_encode( $result['avatar'] ).'"/>';
     $mysqli->close();
    }
    function GetLineFriend($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT status FROM users WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     if($result['status'] == 0) {
         return "<p style=\"color:#fc424a;\">Не в сети</p>";
     }
     else{
         return "<p style=\"color:#a7d8de;\">В сети</p>";
     }
     $mysqli->close();
    }
     function GetFriendCountryInt($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT countryID FROM users WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     return $result['countryID'];
     }
     function GetFriendCityInt($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT cityID FROM users WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     return $result['cityID'];
     }
     function GetFriendCountry($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT title_ru FROM countries WHERE country_id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     return $result['title_ru'];
     }
     function GetFriendCity($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT title_ru FROM cities WHERE city_id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     return $result['title_ru'];
     }
    function GetFriends($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT * FROM friends WHERE firstID = $x";
     $sth = $mysqli->query($sql);
     $friends_count=mysqli_num_rows($sth);
       if ($friends_count > 0) {
        while($row = $sth->fetch_assoc()) {
            echo "
                                <tr>
                                        <td>".GetAvatarFriends($row['secondID'])."</td>
                                        <td>".GetUser($row['secondID'])." ".GetVerifyFriend($row['secondID'],0)."<br><br>".GetFriendCountry(GetFriendCountryInt($row['secondID'])).", ".GetFriendCity(GetFriendCityInt($row['secondID']))."</td>
                                        <td>".GetStatusFriends($row['status'])."<br><br>".GetLineFriend($row['secondID'])."</td>
                                        <td><a style=\"width:100%; margin-bottom:10px;\" href=\"/accounts/".$row['secondID']."\" class=\"badge badge-outline-success\">Перейти</a><br><a style=\"width:100%;\" class=\"badge badge-outline-danger\">Удалить</a></td>
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
@section('title', 'Друзья - Crystal')
@section('friend', 'active')
@section('content')
    <div class="content-wrapper">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Друзья @php echo GetUser($friend->firstID) @endphp</h4>
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
                            @php GetFriends($friend->firstID) @endphp

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php GetVerify($friend->secondID,1); @endphp
@endsection
