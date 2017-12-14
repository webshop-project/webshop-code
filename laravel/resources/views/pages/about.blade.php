@extends('layouts/pagesMaster')

@section('title')
    About
@endsection

@section('content')

<div class="main-content about">
    <div class="banner row justify-content-center p-5">
        <div class="p-5 col-6">
            <h1 class="m-5 p-2">The Four Houses</h1>
        </div>
    </div>
    <div class="houses p-5">
        <div class="house rotate">
            <div class="container">
                <div class="dragon-house-top house-top"></div>
                <div class="house-container row justify-content-center">
                    <div class="house-logo dragon">
                        <img src="img/db_dragon_small.png" alt="">
                    </div>
                    <div class="house-info col-9 row flex-column align-items-start">
                        <h3 class="p-2">Database Dragons</h3>
                        <p class="p-2">Leave no table unjoined...</p>
                        <a class="p-1" href="">More</a>
                    </div>
                </div>
                <div class="dragon-house-bottom house-bottom"></div>
            </div>
        </div>
        <div class="house reverse">
            <div class="container">
                <div class="raven-house-top house-top"></div>
                <div class="house-container row justify-content-center">
                    <div class="house-info row flex-column align-items-end col-6">
                        <h3 class="p-2">Recursive Ravens</h3>
                        <p class="p-2">Our loops are your destiny...</p>
                        <a class="p-1" href="">More</a>
                    </div>
                    <div class="house-logo raven">
                        <img src="img/rave_small.png" alt="">
                    </div>
                </div>
                <div class="raven-house-bottom house-bottom"></div>
            </div>
        </div>
        <div class="house rotate serpent-house">
            <div class="container">
                <div class="serpent-house-top house-top"></div>
                <div class="house-container row justify-content-center">
                    <div class="house-logo serpent">
                        <img src="img/script_serpents_small.png" alt="">
                    </div>
                    <div class="house-info col-9 row flex-column align-items-start">
                        <h3 class="p-2">Script Serpents</h3>
                        <p class="p-2">Array_split() the world in fragments...</p>
                        <a class="p-1" href="">More</a>
                    </div>
                </div>
                <div class="serpent-house-bottom house-bottom"></div>
            </div>
        </div>
        <div class="house reverse viking-house">
            <div class="container">
                <div class="viking-house-top house-top"><img src="img/viking_shield_small_crop.png" alt=""></div>
                <div class="house-container row justify-content-center">
                    <div class="house-info row flex-column align-items-end col-6">
                        <h3 class="p-2">Variable Vikings</h3>
                        <p class="p-2">We outran our fate, comming for yours...</p>
                        <a class="p-1" href="">More</a>
                    </div>
                    <div class="house-logo viking">
                        <img src="img/viking_small.png" alt="">
                    </div>
                </div>
                <div class="viking-house-bottom house-bottom"></div>
            </div>
        </div>
    </div>
</div>

@endsection