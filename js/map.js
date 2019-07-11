var mymap = L.map('map', {
  dragging: false,
  touchZoom: false,
  scrollWheelZoom: false,
  doubleClickZoom: false,
  boxZoom: false,
  tap: false,
  keyboard: false,
  zoomControl: true,
});
//タイルレイヤーの設定
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 18,
  attribution: 'Map data &copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors, '
}).addTo(mymap);
var marker;
var lng;
var lat;
/*現在位置にマーカーが表示*/
function onLocationFound(e) {
  //位置情報の結果を表示
  if (marker != null) {
    mymap.removeLayer(marker);
  }
  //マーカーの配置
  marker = L.marker(e.latlng).addTo(mymap).bindPopup("現在地").openPopup();
  //中心の変更
  mymap.panTo(e.latlng);
  //位置情報の結果を表示
  lat = e.latlng.lat;
  lng = e.latlng.lng;
  $(function() {
    $.ajax({
      url: 'curry.php',
      type: 'POST',
      data: {
        lat: lat,
        lng: lng
      }
    }).done(function(data) {
      console.log(data);
  });
  });
}
/*位置情報の取得が失敗した際の、イベント*/
function onLocationError(e) {
  alert("現在地を取得できませんでした。" + e.message);
}
/*成功した場合*/
mymap.on('locationfound', onLocationFound);
/*失敗した場合*/
mymap.on('locationerror', onLocationError);
/*読み込んだ時の位置*/
mymap.locate({
  watch: true,
  setView: true,
  maxZoom: 20,
  timeout: 20000
});
