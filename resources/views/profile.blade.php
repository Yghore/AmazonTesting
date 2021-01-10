@extends('layouts.app')


@section('title', trans('product.app_name') . ' | ' . trans('product.title.header.home'))
	


@push('head')
<style>
    
body {
    background-color: #f9f9fa
}

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    border: none;
    margin-bottom: 30px
}

.m-r-0 {
    margin-right: 0px
}

.m-l-0 {
    margin-left: 0px
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px
}

.bg-c-lite-green {
    background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263)
}

.user-profile {
    padding: 20px 0
}

.card-block {
    padding: 1.25rem
}

.m-b-25 {
    margin-bottom: 25px
}

.img-radius {
    border-radius: 5px
}

h6 {
    font-size: 14px
}

.card .card-block p {
    line-height: 25px
}

@media only screen and (min-width: 1400px) {
    p {
        font-size: 14px
    }
}

.card-block {
    padding: 1.25rem
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.m-b-20 {
    margin-bottom: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.card .card-block p {
    line-height: 25px
}

.m-b-10 {
    margin-bottom: 10px
}

.text-muted {
    color: #919aa3 !important
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.f-w-600 {
    font-weight: 600
}

.m-b-20 {
    margin-bottom: 20px
}

.m-t-40 {
    margin-top: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.m-b-10 {
    margin-bottom: 10px
}

.m-t-40 {
    margin-top: 20px
}

.user-card-full .social-link li {
    display: inline-block
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out
}
</style>
<script>
    var Konami=function(t){var e={addEvent:function(t,e,n,o){t.addEventListener?t.addEventListener(e,n,!1):t.attachEvent&&(t["e"+e+n]=n,t[e+n]=function(){t["e"+e+n](window.event,o)},t.attachEvent("on"+e,t[e+n]))},removeEvent:function(t,e,n){t.removeEventListener?t.removeEventListener(e,n):t.attachEvent&&t.detachEvent(e)},input:"",pattern:"38384040373937396665",keydownHandler:function(t,n){if(n&&(e=n),e.input+=t?t.keyCode:event.keyCode,e.input.length>e.pattern.length&&(e.input=e.input.substr(e.input.length-e.pattern.length)),e.input===e.pattern)return e.code(e._currentLink),e.input="",t.preventDefault(),!1},load:function(t){this._currentLink=t,this.addEvent(document,"keydown",this.keydownHandler,this),this.iphone.load(t)},unload:function(){this.removeEvent(document,"keydown",this.keydownHandler),this.iphone.unload()},code:function(t){window.location=t},iphone:{start_x:0,start_y:0,stop_x:0,stop_y:0,tap:!1,capture:!1,orig_keys:"",keys:["UP","UP","DOWN","DOWN","LEFT","RIGHT","LEFT","RIGHT","TAP","TAP"],input:[],code:function(t){e.code(t)},touchmoveHandler:function(t){if(1===t.touches.length&&!0===e.iphone.capture){var n=t.touches[0];e.iphone.stop_x=n.pageX,e.iphone.stop_y=n.pageY,e.iphone.tap=!1,e.iphone.capture=!1,e.iphone.check_direction()}},touchendHandler:function(){if(e.iphone.input.push(e.iphone.check_direction()),e.iphone.input.length>e.iphone.keys.length&&e.iphone.input.shift(),e.iphone.input.length===e.iphone.keys.length){for(var t=!0,n=0;n<e.iphone.keys.length;n++)e.iphone.input[n]!==e.iphone.keys[n]&&(t=!1);t&&e.iphone.code(e._currentLink)}},touchstartHandler:function(t){e.iphone.start_x=t.changedTouches[0].pageX,e.iphone.start_y=t.changedTouches[0].pageY,e.iphone.tap=!0,e.iphone.capture=!0},load:function(t){this.orig_keys=this.keys,e.addEvent(document,"touchmove",this.touchmoveHandler),e.addEvent(document,"touchend",this.touchendHandler,!1),e.addEvent(document,"touchstart",this.touchstartHandler)},unload:function(){e.removeEvent(document,"touchmove",this.touchmoveHandler),e.removeEvent(document,"touchend",this.touchendHandler),e.removeEvent(document,"touchstart",this.touchstartHandler)},check_direction:function(){return x_magnitude=Math.abs(this.start_x-this.stop_x),y_magnitude=Math.abs(this.start_y-this.stop_y),x=this.start_x-this.stop_x<0?"RIGHT":"LEFT",y=this.start_y-this.stop_y<0?"DOWN":"UP",result=x_magnitude>y_magnitude?x:y,result=!0===this.tap?"TAP":result,result}}};return"string"==typeof t&&e.load(t),"function"==typeof t&&(e.code=t,e.load()),e};"undefined"!=typeof module&&void 0!==module.exports?module.exports=Konami:"function"==typeof define&&define.amd?define([],function(){return Konami}):window.Konami=Konami;var easter_egg = new Konami(function() {var x=document.getElementById("profile-image");x.setAttribute("src","https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Neko_Wikipe-tan.svg/630px-Neko_Wikipe-tan.svg.png");});
    </script>
@endpush

@section('content')

@if (session('success'))
<div class="alert alert-success" role="alert">{{session('success')}}</div>
@endif
@if($errors->any())
<div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
@endif
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img id="profile-image" src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png" style="max-height: 80px;" class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600">{{ $user->name }}</h6>
                                @if ($user->admin)
                                    <p>Administrateur</p> 
                                @else
                                    <p>Utilisateur</p>
                                @endif

                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informations</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{ $user->email }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Crée le </p>
                                        <h6 class="text-muted f-w-400">{{ date_format(new DateTime($user->created_at), 'd/m/y à H:i') }}</h6>
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="m-b-10 f-w-600">Changer le mot de passe </p>
                                        <form action="{{ route('change_password') }}" method="POST">
                                            @csrf
                                            <input type="password" class="form-control" name="password" placeholder="Nouveau mot de passe">
                                            <input type="password" style="margin: 5px 0 5px 0;" class="form-control" name="password_confirmation" placeholder="Nouveau mot de passe">
                                          <input type="submit" role="button"  class="btn btn-warning" value="Changer le mot de passe" />
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection