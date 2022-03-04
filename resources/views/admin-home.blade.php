@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>Hi {{auth()->user()->name}}, welcome to Admin {{ __('Dashboard') }}</h4></div>
                <div class="table table-hover">
                             <!-- Admin roles to view weathera and list of users    -->
                       <h4> <a href="/weather" class="btn btn-success btn-sm float-right">
                        <i class="fa fa-users" aria-hidden="true"></i>Click Here To Views weather report around our locations</a> </h4>   
                              
                    </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  
                    <div class="card-header bg-info text-white">
                            <h5>List of Users register in Weather report system to check their weather Informations</h5>
                        </div>
                        <div class="card-body">
                            @php 
                                $users = DB::table('users')->orderBy('created_at', 'desc')->get();
                            @endphp
                            <div class="container">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                     <th>FirstName</th>
                                     <th>LastName</th>
                                     <th>Email</th>
                                     <th>RegisterDate</th>
                                     <th>Status</th>
                                     <th>Last Seen</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->lname}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            @if(Cache::has('is_online' . $user->id))
                                            
                                                <label class="badge badge-pill badge-success">Online</label>
                                                
                                            @else
                                                <label class="badge badge-pill badge-danger">Offline</label>
                                            @endif
                                        </td>
                                        <td>
                                            <label class="badge badge-info badge-pill">{{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</label>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                            $cache_file = 'city.list.json';
                            $apiKey = "78277b3ff9dbabe13c5fdff33e8a9350";
                            $cityId = 'city.list.json';   
                            $api_url = 'https://content.api.nytimes.com/svc/weather/v2/current-and-seven-day-forecast.json';
                            $data = file_get_contents($api_url);
                            $data = json_decode($data);
                            $current = $data->results->current[0];
                            $forecast = $data->results->seven_day_forecast;

                                ?>
                                <style>
                                body{
                                    background-color:#aaa!important;
                                }
                                .wrapper .single{
                                    color:#fff;
                                    width:100%;
                                    padding:10px;
                                    text-align:center;
                                    margin-bottom:10px;
                                }
                                .aqi-value{
                                    background-color: #3071c7!important;
                                    width:40% !important;
                                    font-family : "Noto Serif","Palatino Linotype","Book Antiqua","URW Palladio L";
                                    font-size:20px;
                                    font-weight:bold;
                                }
                                h1{
                                    text-align: center;
                                    font-size:3em;
                                }
                                .forecast-block{
                                    background-color: #3071c7!important;
                                    width:20% !important;
                                }
                                .title{
                                    background-color:#02316e;
                                    width: 100%;
                                    color:#fff;
                                    margin-bottom:0px;
                                    padding-top:10px;
                                    padding-bottom: 10px;
                                }
                                .bordered{
                                    border:1px solid;
                                }
                                .weather-icon{
                                    width:40%;
                                    font-weight: bold;
                                    background-color: #3071c7;
                                    padding:10px;
                                    border: 1px solid #fff;
                                }
                                </style>
               
                                <?php
                                        function convert2cen($temp)
                                        {
                                            $cen=5/9*($temp-32);
                                            return round($cen) ;
                                        }

                                        function celsius_to_fahrenheit($temp)
                                        {
                                            $fahrenheit=$temp*9/5+32;
                                            return $fahrenheit ;
                                        }
                                        
                                ?>

                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />

                                    <div class="container wrapper">
                                                    
                                   
                                    <div class="row">
                                    <i class="fa-solid fa-location-pin"></i> <h5 class="title text-center bordered">Your Location <?php echo $current->city.' ('.$current->country.')';?></h5>
                              
                                </div>
                            </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection

