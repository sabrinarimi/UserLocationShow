@extends('layouts.app')

@section('content')

    <div class="content ">
        <div class="row">
            <div class="mapform col-md-6 mx-auto ">
                <h3 class="text-center text-uppercase ">Add Your  Location Here </h3>

            </div>
            <hr/>
            @if(auth()->check())
                <button class="btn btn-outline-success col-md-2 mx-auto mb-4">
                    <a class="dropdown-item " href="#" onclick="event.preventDefault();document.getElementById('logoutForm').submit()">

                        Logout
                        <form action="{{route('logout')}}" method="post" id="logoutForm">
                            @csrf
                        </form>

                    </a>
                </button>
                <form action="{{ route('store') }}" method="post">
                    @csrf
                    <div class="mapform col-md-6 mx-auto" >
                        <div class="row">
                            <div class="col-3 mb-2">
                                <input type="text" class="form-control" placeholder="Put User Name" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" name="name" >
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="latitude" name="latitude" id="lat">
                            </div>
                            <div class="col-3 mb-2">
                                <input type="text" class="form-control" placeholder="longitude" name="longitude" id="lng">
                            </div>

                            <div class="col-3">
                                <input type="submit" class="btn btn-primary" value="Add User">
                            </div>


                        </div>



                        <div id="map" style="height:400px; width: 800px;" class="my-3"></div>

                        <script>
                            let map;
                            function initMap() {
                                map = new google.maps.Map(document.getElementById("map"), {
                                    center: { lat: -34.397, lng: 150.644 },
                                    zoom: 8,
                                    scrollwheel: true,
                                });

                                const uluru = { lat: -34.397, lng: 150.644 };
                                let marker = new google.maps.Marker({
                                    position: uluru,
                                    map: map,
                                    draggable: true
                                });

                                google.maps.event.addListener(marker,'position_changed',
                                    function (){
                                        let lat = marker.position.lat()
                                        let lng = marker.position.lng()
                                        $('#lat').val(lat)
                                        $('#lng').val(lng)
                                    })

                                google.maps.event.addListener(map,'click',
                                    function (event){
                                        pos = event.latLng
                                        marker.setPosition(pos)
                                    })
                            }
                        </script>
                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
                                type="text/javascript"></script>
                    </div>



                </form>
            @else
                <div class="row ">
                    <h5 class="col-md-2">Login First</h5>
                    <a href="{{route('login')}}" class="col-md-2"><button class="btn btn-success">Login</button>
                    </a>
                </div>

            @endif

        </div>

    </div>



@endsection
