var map = null;
var geocoder;
var base_url ;//= "http://localhost/cellplan/";
var site_url ;//= "http://localhost/cellplan/index.php/";

var polyPath=[];
var polyRed=[];
var polyBlue=[];


google.maps.event.addDomListener(window, 'load', initialize);
var infoWindow ;

var markers_tower = [];
var marker;

function initialize() {
    base_url = document.getElementById("base_url").value;
    site_url = document.getElementById("site_url").value;
    
    
    infoWindow = new google.maps.InfoWindow();
    google.maps.Polygon.prototype.Contains = function (point) {
        // ray casting alogrithm http://rosettacode.org/wiki/Ray-casting_algorithm
        var crossings = 0,
        path = this.getPath();

        // for each edge
        for (var i = 0; i < path.getLength(); i++) {
            var a = path.getAt(i),
            j = i + 1;
            if (j >= path.getLength()) {
                j = 0;
            }
            var b = path.getAt(j);
            if (rayCrossesSegment(point, a, b)) {
                crossings++;
            }
        }

        // odd number of crossings?
        return (crossings % 2 == 1);

        function rayCrossesSegment(point, a, b) {
            var px = point.lng(),
            py = point.lat(),
            ax = a.lng(),
            ay = a.lat(),
            bx = b.lng(),
            by = b.lat();
            if (ay > by) {
                ax = b.lng();
                ay = b.lat();
                bx = a.lng();
                by = a.lat();
            }
            if (py == ay || py == by) py += 0.00000001;
            if ((py > by || py < ay) || (px > Math.max(ax, bx))) return false;
            if (px < Math.min(ax, bx)) return true;

            var red = (ax != bx) ? ((by - ay) / (bx - ax)) : Infinity;
            var blue = (ax != px) ? ((py - ay) / (px - ax)) : Infinity;
            return (blue >= red);
        }
    };
    
  var myOptions = {
    zoom: 11,
    center: new google.maps.LatLng(-8.474733,115.066062),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  map = new google.maps.Map(document.getElementById("map_canvas"),  myOptions);
  
  //var mc = new MarkerClusterer(map, [], mcOptions);
  
  markers_tower = [];
  //get_map_tower();
  
  
  //draw_poly();
  draw_grid();
  
  
  
  marker = new google.maps.Marker({
      position: new google.maps.LatLng(-8.474733,115.066062),
      map: map,
      draggable:true,
      icon : base_url + 'static/image/tower.png',
      title: 'Pindahkan Ke Lokasi Tower'
  });
  
    
  
  function get_map_tower(){
        $.ajax({
                type: "POST",
                url: site_url+"/grid/get_point_tower",
                dataType: 'json',
                success: function(json) {
                        clearOverlays();
                        for (var i=0; i<json.Locations.length; i++) {
                                    var location = json.Locations[i];
                                    addLocation(location);
                        }
                        var mcOptions = {gridSize: 50, maxZoom: 18};
                        var mc = new MarkerClusterer(map, markers_tower, mcOptions);
                        
                }
        });
        return false;
    }

  google.maps.event.addListener(marker, "dragend", function () {
        var newLat = marker.getPosition().lat().toString();
        var newLng = marker.getPosition().lng().toString();
        codeLatLng(newLat,newLng);
        var salah = cek_lat_lng(newLat,newLng);

        if(!salah){
            alert("Tower boleh dibangun di lokasi ini");
        }
        else{
            alert("Maaf lokasi ini tidak boleh di bangu tower");
        }

    });

    $("#box_kecamatan").change(function(){
            $.ajax({
                type: "POST",
                url: $("#kecamatan_form").attr('action'),
                data: $("#kecamatan_form").serialize(),
                success: function(data) {
                    //alert(data);
                        $("select#box_desa").html(data);
                }
            });
            return false;
    });
    
    $("#box_desa").change(function(){
           document.getElementById("id_desa").value = document.getElementById("box_desa").value;
    });
    
    $("#box_penyedia").change(function(){
           document.getElementById("id_perusahaan").value = document.getElementById("box_penyedia").value;
    });
    
     
}



function change_lat_lng(){
    var lat1 = document.getElementById("lat").value;
    var lng1 = document.getElementById("lng").value;
    if(lat1 != "" && lng1!=""){
        var geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(lat1, lng1);
        marker.setPosition(latlng);
        map.setCenter(latlng);
        map.setZoom(16);
        codeLatLng(lat1,lng1);
        var salah = cek_lat_lng(lat1,lng1);

        if(!salah){
            alert("Tower boleh dibangun di lokasi ini");
        }
        else{
            alert("Maaf lokasi ini tidak boleh di bangu tower");
        }
    }else{
        alert("Masukkan Latitude Logitude");
    }
}


function clearOverlays() {
        if (markers_tower) {
                for (i in markers_tower) {
                        markers_tower[i].setMap(null);
                }
        }
}
	
function addLocation(location){
        var point = new google.maps.LatLng(location.TOWER_LAT, location.TOWER_LNG);
        var marker_pop1 = new google.maps.Marker({
                        position: point,
                        clickable: true,
                        draggable: false,
                        icon : base_url + '/static/image/tower_cluster.png',
                        map: map,
        });
        
        google.maps.event.addListener(marker_pop1, "click", function() {	
               
                var html ="Pemilik: "+location.TOWER_PEMILIK;
                html = html + '<br>'+'SITE ID :'+location.TOWER_SIDE_ID;
                html = html + '<br>'+'Jenis Pemilik :'+location.TOWER_JENIS_PEMILIK;
                html = html + '<br>'+'Alamat :'+location.TOWER_SITE_ADDRESS+', '+location.DESA_NAMA+', '+location.KECAMATAN_NAMA+'</div>';
                html = html + '<br>'+'tower_jenis_jalan :'+location.TOWER_JENIS_JALAN;
                html = html + '<br>'+'Tinggi Tower :'+location.TOWER_HEIGHT;
                html = html + '<br>'+'Ukuran Tanah :'+location.TOWER_UKURAN_TANAH;
                html = html + '<br>'+'Luas Tanah :'+location.TOWER_LUAS_TANAH;
                
                infoWindow.setContent(html);
                infoWindow.setPosition(point);
                infoWindow.open(map);
        });
        markers_tower.push(marker_pop1);
        
}

function codeLatLng(lat1, lng1) {
        document.getElementById("lat").value = lat1;
        document.getElementById("lng").value = lng1;
        var geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(lat1, lng1);
        geocoder.geocode({'latLng': latlng}, function(results, status) {
                
              document.getElementById("map_addrs").value = results[0].formatted_address;
                
           
        });
}

function cek_lat_lng(newLat,newLng){
      var latitude = newLat;
      var longitude = newLng;
      var myPoint = new google.maps.LatLng(latitude, longitude);

      for(var a=0;a<polyRed.length;a++){
        var boundaryPolygon = polyRed[a];
        if (boundaryPolygon.Contains(myPoint)) {
            return true;
        }
     }
     return false;
  }  

function add_polygon(poly_data_lgkp){
    var titik_poly=[];
    
    
    var poly_data = poly_data_lgkp.DESA_POINT_LIST;
    for(var a=0;a<poly_data.length-1;a++){
        titik_poly[a] = new google.maps.LatLng(poly_data[a].LAT,poly_data[a].LNG); 
    }
    
    //alert(poly_data_lgkp.COLOR);
    
    var poly_add = new google.maps.Polygon({
                 paths: titik_poly,
                 strokeColor: "#000000",
                 strokeOpacity: 1,
                 strokeWeight: 0.2,
                 fillColor: poly_data_lgkp.COLOR,
                 fillOpacity: 0.2
     });
     poly_add.setMap(map);
}


function draw_poly(){
        $.ajax({
            type: "POST",
            url: site_url+"/grid/get_polygon",
            dataType: 'json',
            success: function(json) {
                    //alert(json.Desa.length);
                    if (json.Desa.length > 0) {
                        for (var i=0; i<json.Desa.length; i++) {
                            var point_des = json.Desa[i];
                            //alert(point_des);
                            add_polygon(point_des);
                        }
                    }

            }
        });
    return false;
}

function draw_grid(){
        $.ajax({
            type: "POST",
            url: site_url+"/grid/get_grid_data",
            dataType: 'json',
            success: function(json) {
                    //alert(json.Desa.length);
                    if (json.GRID.length > 0) {
                        for (var i=0; i<json.GRID.length; i++) {
                            var point_des = json.GRID[i];
                            //alert(point_des);
                            add_polygon_grid(point_des);
                        }
                    }
            }
        });
    return false;
}

function add_polygon_grid(poly_data_lgkp){
    var titik_poly=[];
    
    
    var poly_data = poly_data_lgkp.GRID_POINT_LIST;
    for(var a=0;a<poly_data.length-1;a++){
        titik_poly[a] = new google.maps.LatLng(poly_data[a].LAT,poly_data[a].LNG); 
    }
    
    //alert(poly_data_lgkp.COLOR);
    var col;
    if(poly_data_lgkp.TYPE==1){
        col = "#122EFF";
    }else{
        col = "#F00000";
    }
    
    var poly_add = new google.maps.Polygon({
                 paths: titik_poly,
                 strokeColor: "#000000",
                 strokeOpacity: 1,
                 strokeWeight: 0.2,
                 fillColor: col,
                 fillOpacity: 0.7
     });
     
     poly_add.setMap(map);
    
     polyPath.push(poly_add);
     if(poly_data_lgkp.TYPE==1){
        polyBlue.push(poly_add);
    }else{
        polyRed.push(poly_add);
    }
     //if(poly_data_lgkp.)
     
     
     
}


