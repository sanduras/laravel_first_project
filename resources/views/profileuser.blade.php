@extends('masterstart')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    body {
        margin-top: 20px;
        background: #f5f5f5;
    }

    /**
 * Panels
 */
    /*** General styles ***/
    .panel {
        box-shadow: none;
    }

    .panel-heading {
        border-bottom: 0;
    }

    .panel-title {
        font-size: 17px;
    }

    .panel-title>small {
        font-size: .75em;
        color: #999999;
    }

    .panel-body *:first-child {
        margin-top: 0;
    }

    .panel-footer {
        border-top: 0;
    }

    .panel-default>.panel-heading {
        color: #333333;
        background-color: transparent;
        border-color: rgba(0, 0, 0, 0.07);
    }

    /**
 * Profile
 */
    /*** Profile: Header  ***/
    .profile__avatar {
        float: left;
        width: 60px;
        height: 60px;
        border-radius: 15px;
        margin-right: 20px;
        object-fit: cover
    }

    @media (min-width: 768px) {
        .profile__avatar {
            width: 100px;
            height: 100px;
        }
    }

    .profile__header {
        overflow: hidden;
    }

    .profile__header p {
        margin: 20px 0;
    }

    /*** Profile: Table ***/
    @media (min-width: 992px) {
        .profile__table tbody th {
            width: 200px;
        }
    }

    /*** Profile: Recent activity ***/
    .profile-comments__item {
        position: relative;
        padding: 15px 16px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .profile-comments__item:last-child {
        border-bottom: 0;
    }

    .profile-comments__item:hover,
    .profile-comments__item:focus {
        background-color: #f5f5f5;
    }

    .profile-comments__item:hover .profile-comments__controls,
    .profile-comments__item:focus .profile-comments__controls {
        visibility: visible;
    }

    .profile-comments__controls {
        position: absolute;
        top: 0;
        right: 0;
        padding: 5px;
        visibility: hidden;
    }

    .profile-comments__controls>a {
        display: inline-block;
        padding: 2px;
        color: #999999;
    }

    .profile-comments__controls>a:hover,
    .profile-comments__controls>a:focus {
        color: #333333;
    }

    .profile-comments__avatar {
        display: block;
        float: left;
        margin-right: 20px;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
    }

    .profile-comments__body {
        overflow: hidden;
    }

    .profile-comments__sender {
        color: #333333;
        font-weight: 500;
        margin: 5px 0;
    }

    .profile-comments__sender>small {
        margin-left: 5px;
        font-size: 12px;
        font-weight: 400;
        color: #999999;
    }

    @media (max-width: 767px) {
        .profile-comments__sender>small {
            display: block;
            margin: 5px 0 10px;
        }
    }

    .profile-comments__content {
        color: #999999;
    }

    /*** Profile: Contact ***/
    .profile__contact-btn {
        padding: 12px 20px;
        margin-bottom: 20px;
    }

    .profile__contact-hr {
        position: relative;
        border-color: rgba(0, 0, 0, 0.1);
        margin: 40px 0;
    }

    .profile__contact-hr:before {
        content: "OR";
        display: block;
        padding: 10px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        background-color: #f5f5f5;
        color: #c6c6cc;
    }

    .profile__contact-info-item {
        margin-bottom: 30px;
    }

    .profile__contact-info-item:before,
    .profile__contact-info-item:after {
        content: " ";
        display: table;
    }

    .profile__contact-info-item:after {
        clear: both;
    }

    .profile__contact-info-item:before,
    .profile__contact-info-item:after {
        content: " ";
        display: table;
    }

    .profile__contact-info-item:after {
        clear: both;
    }

    .profile__contact-info-icon {
        float: left;
        font-size: 18px;
        color: #999999;
    }

    .profile__contact-info-body {
        overflow: hidden;
        padding-left: 20px;
        color: #999999;
    }

    .profile__contact-info-body a {
        color: #999999;
    }

    .profile__contact-info-body a:hover,
    .profile__contact-info-body a:focus {
        color: #999999;
        text-decoration: none;
    }

    .profile__contact-info-heading {
        margin-top: 2px;
        margin-bottom: 5px;
        font-weight: 500;
        color: #999999;
    }
</style>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12">

            <!-- User profile -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Aicsa User profile</h4>
                </div>
                <div class="panel-body">
                    <div class="profile__avatar">
                        <img class="profile__avatar" src='{{isset($data["profile_photo_path"]) ? asset($data["profile_photo_path"]): "https://bootdey.com/img/Content/avatar/avatar1.png" }}' alt="">
                    </div>
                    <div class="profile__header">
                        <h4> {{$data->first_name}} {{$data->last_name}} </h4>

                        <p class="text-muted">
                            {{$data->description}}
                        </p>
                    </div>
                </div>
            </div>

            <!-- User info -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">User info</h4>
                </div>
                <div class="panel-body">
                    <table class="table profile__table">
                        <tbody>
                            <tr>
                                <th><strong>Birthday</strong></th>
                                <td>{{$data->born_year}}</td>
                            </tr>
                            <tr>
                                <th><strong>Role</strong></th>
                                <td>{{$data->role}}</td>
                            </tr>
                            <tr>
                                <th><strong>Position</strong></th>
                                <td>writer</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection