@php
    function GetMiniAvatar($x){
     $db_config = Config::get('database.connections.'.Config::get('database.default'));
     $mysqli = new mysqli($db_config["host"], $db_config["username"], $db_config["password"], $db_config["database"]);
     $sql = "SELECT avatar FROM users WHERE id = $x";
     $sth = $mysqli->query($sql);
     $result=mysqli_fetch_array($sth);
     echo '<img class="img-xs rounded-circle" src="data:image/jpeg;base64,'.base64_encode( $result['avatar'] ).'"/>';
     $mysqli->close();
}
@endphp
