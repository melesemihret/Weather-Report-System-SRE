@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><tr>Hi <b>{{auth()->user()->name}}</b> {{auth()->user()->lname}}{{ __(', Your Current location Weather Dashboard') }} </tr><tr>

                </tr></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     @if(Session::has('error'))
                    <div class="alert alert-success" role="alert">
                            {{ session('error') }}
                        </div>
                        @endif
          
                  <!-- Weather Displays-->

                            <?php
                                $cache_file = 'city.list.json';
                                $apiKey = "78277b3ff9dbabe13c5fdff33e8a9350";
                                $cityId = 'city.list.json';
                                
                                $api_url = 'https://content.api.nytimes.com/svc/weather/v2/current-and-seven-day-forecast.json';
                                //$api_url = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;
                                
                                 // $api_url = 'https://weather.api.here.com/weather/1.0/report.json';
                                $data = file_get_contents($api_url);
                                //file_put_contents($data);
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
                                        <h5 class="title text-center bordered">Weather Report for <?php echo $current->city.' ('.$current->country.')';?></h5>
                                        <div class="col-md-12" style="padding-left:0px;padding-right:0px;">
                                        <div class="single bordered" style="padding-bottom:5px;background:url('images/weatherbg1.png') no-repeat ;border-top:0px;background-size: cover;">
                                            <div class="row">
                                            <div class="col-sm-9" style="font-size:16px;text-align:left;padding-left:70px;">
                                                <p class="aqi-value"><?php echo convert2cen($current->temp,$current->temp_unit);?> °C</p>
                                                <p class="weather-icon">
                                                <img style="margin-left:-8px;" src="<?php echo $current->image;?>">
                                                <?php echo $current->description;?>
                                                </p>
                                                <div class="weather-icon">
                                                <p><strong>Wind Speed : </strong><?php echo ($current)->windspeed;?> <?php echo $current->windspeed_unit;?></p>
                                                <p><strong>Pressure : </strong><?php echo $current->pressure;?> <?php echo $current->pressure_unit;?></p>
                                                <p><strong>Visibility : </strong><?php echo $current->visibility;?> <?php echo $current->visibility_unit;?></p>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h5 class="title text-center bordered">5 Days Weather Forecast for <?php echo $current->city.' ('.$current->country.')';?></h5>
                                        <?php $loop=0; foreach($forecast as $f){ $loop++;?>
                                        <div class="single forecast-block bordered">
                                            <h5><?php echo $f->day;?></h5>
                                            <p style="font-size:1em;" class="aqi-value"><?php echo convert2cen($f->low,$f->low_unit);?> °C - <?php echo convert2cen($f->high,$f->high_unit);?> °C</p>
                                            <hr style="border-bottom:1px solid #fff;">
                                            <img src="<?php echo $f->image;?>">
                                            <p><?php echo $f->phrase;?></p>
                                        </div>
                                        <?php }
                                            
                                ?>
                                </div>
                            </div>
                      <!-- @end weather report displays -->
                            <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                            By: Melese W </i>
                        </div>
                    </div>
                </div>
            </div>
        </div
@endsection
