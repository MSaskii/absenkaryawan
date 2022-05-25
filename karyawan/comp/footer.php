
  <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


  <script src="<?=url()?>vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?=url()?>vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?=url()?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- <?=url()?>Vendor JS       -->
    <script src="<?=url()?>vendor/slick/slick.min.js">
    </script>
    <script src="<?=url()?>vendor/wow/wow.min.js"></script>
    <script src="<?=url()?>vendor/animsition/animsition.min.js"></script>
    <script src="<?=url()?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?=url()?>vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?=url()?>vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?=url()?>vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?=url()?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=url()?>vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?=url()?>vendor/select2/select2.min.js">
    </script>
    <script src="<?=url()?>vendor/vector-map/jquery.vmap.js"></script>
    <script src="<?=url()?>vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="<?=url()?>vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="<?=url()?>vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="<?=url()?>js/main.js"></script>

    <!-- JS untuk absensi -->
    <script src="https://maps.googleapis.com/maps/api/js?libraries=geometry,places&ext=.js"></script>
    <script src="https://rawgit.com/HPNeo/gmaps/master/gmaps.js"></script>
    <!-- END JS untuk absensi -->

    <script>

        //JS untuk absensi
        var map;
        var locationStatus = false;
        
        var currLat;
        var currLng;

        var centerLat = 0.4681040092556741;
        var centerLng = 101.38072267368322;

        var rad = 200; //radius dalam meter

        $(document).ready(function(){
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert('Pastikan perangkat anda memiliki fitur geolocation');
            }

            function showPosition(position) {

                map = new GMaps({
                    div: '#map',
                    lat: centerLat,
                    lng: centerLng,
                    zoom: 16
                });
                circle = map.drawCircle({
                    strokeColor: '#BBD8E9',
                    strokeOpacity: 1,
                    strokeWeight: 3,
                    fillColor: '#BBD8E9',
                    fillOpacity: 0.6,
                    lat: centerLat,
                    lng: centerLng,
                    radius: rad
                });
                map.addMarker({
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                    title: 'Lima'
                });
                currLat = position.coords.latitude;
                currLng = position.coords.longitude;

            }
            getDistance(currLat, currLng, centerLat, centerLng);
        });

        function getDistance(lat1, lon1, lat2, lon2) {
            var R = 6371;// Radius of the earth in km
            var dLat = deg2rad(lat2-lat1);  // deg2rad below
            var dLon = deg2rad(lon2-lon1); 
            var a = 
                    Math.sin(dLat/2) * Math.sin(dLat/2) +
                    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
                    Math.sin(dLon/2) * Math.sin(dLon/2)
                ; 
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
            var d = R * c; // Distance in km
            var m = d * 1000;
            if( m < rad ){
                locationStatus = true;
                $('#btnAbsen').prop('disabled', false);
                $('.location-warning').addClass('d-none');
            }else{
                locationStatus = false;
                $('#btnAbsen').prop('disabled', true);
                $('.location-warning').removeClass('d-none');
            }
        }

        function deg2rad(deg) {
            return deg * (Math.PI/180)
        }

        //END JS untuk absensi
    
        function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();
    </script>
    <script>
        function showTime2(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay2").innerText = time;
    document.getElementById("MyClockDisplay2").textContent = time;
    
    setTimeout(showTime2, 1000);
    
}

showTime2();
    </script>
</body>

</html>
<!-- end document-->