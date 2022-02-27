<?php

use App\Models\BannerSetting;
use App\Models\Contact;
use App\Models\Nft;
use App\Models\RoadMap;
use App\Models\Work;
use App\Models\WorkDescription;
use Illuminate\Support\Facades\Auth;

function user() {
    return Auth::user();
}

function banner() {
    return BannerSetting::find(1);
}

function roadmaps() {
    return RoadMap::all();
}

function works() {
    return Work::all();
}

function description() {
    return WorkDescription::find(1);
}

function contacts() {
    return Contact::all();
}

function nfts() {
    return Nft::all();
}