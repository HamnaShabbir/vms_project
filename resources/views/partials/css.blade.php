<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>{{ env('APP_NAME') }} </title>

<!-- Google Font: Source Sans Pro -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
<link rel="stylesheet" href="{{ asset('assets/dist/css/bootstrap.min.css') }}">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dist/css/style.css') }}">
{{-- select2 --}}
<!-- Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<!-- Or for RTL support -->
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-selectpicker/css/bootstrap-select.min.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
{{--  --}}

{{-- <link rel="stylesheet" href="{{ asset('assets/plugins/multiselect/jquery.multiselect.css') }}"> --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<link rel="stylesheet" href="{{ asset('assets/plugins/dropify/dropify.min.css') }}">
{{-- <link rel="stylesheet" type="text/css"
href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> --}}

<style>
    .table_form .form-control,
    .table_form select,
    .table_form textarea {
        min-width: 160px !important;
        max-width: 100% !important;
        /* Make the input and select elements full-width */
        margin: 0 !important;
    }

    .font-size {
        font-size: 18px !important;
    }

    .box-card>i {
        /* float: right; */
        position: absolute;
        font-size: 40px;
        line-height: 33px;
        right: 17px;
        z-index: -1;
        transition-duration: 0.4s;
        transform: scale(1);
    }

    .box-card:hover>i {
        transform: scale(1.2);
        transition-duration: 0.4s;
    }

    .box-card span:first-of-type {
        font-size: 31px;
        line-height: 25px;
    }

    .box-card span:last-of-type {
        line-height: 0;
        font-size: 20px;
        font-weight: lighter;
        color: #8a8a8a;
    }


    /* macro */
    .box-card.macro {
        text-align: center;
        height: 190px;
    }

    .box-card.macro i {
        position: inherit;
        font-size: 50px;
        width: 100%;
        margin-bottom: 20px;
    }

    .box-card.macro p {
        text-align: center;
        font-weight: lighter;
        color: darkgrey;
    }

    /* mini card*/

    .box-card.mini:hover>i {
        transform: translate(0, -10px);
        transition-duration: 0.4s;
    }

    .box-card.mini>i {
        float: inherit;
        position: absolute;
        right: 22px;
        transform: translate(0, 0px);
        transition-duration: 0.4s;
        top: -22px;
        font-size: 46px;
        width: 70px;
        height: 70px;
        color: white;
        text-align: center;
        line-height: 70px;
        box-shadow: 0 0 10px -4px #000000b3;
        border-radius: 18px;
    }

    .box-card.mini span:first-of-type {
        font-size: 19px;
        line-height: 25px;
        display: block;
        font-weight: 500;
    }

    .box-card.mini span:last-of-type {
        line-height: 1;
        font-size: 30px;
        color: #595959;
    }

    .box-card.mini p {
        text-align: left;
        font-weight: lighter;
        color: darkgrey;
    }


    /* flat */
    .box-card.flat {
        overflow: hidden;
        color: white;
    }

    .box-card.flat>i {
        font-size: 80px;
        top: 15px;
        right: -7px;
    }

    .box-card.flat span:first-of-type {
        font-size: 31px;
        line-height: 25px;
        display: block;
    }

    .box-card.flat span:last-of-type {
        line-height: 1;
        font-size: 20px;
        font-weight: lighter;
        color: white;
    }

    .box-card.flat p {
        text-align: left;
    }



    .b-first {
        background: linear-gradient(0deg, #9ff4ff, #2ea8b8) !important;
    }

    .b-second {
        background: linear-gradient(0deg, #7ef7cc, #39ab9b) !important;
    }

    .b-third {
        background: linear-gradient(0deg, #95bbff, #9d56eb) !important;
    }

    .b-forth {
        background: linear-gradient(0deg, #fba5c9, #eb1c73) !important;
    }

    .b-first.pastel {
        background: linear-gradient(0deg, #abdee2, #ffc5d6) !important;
    }

    .b-second.pastel {
        background: linear-gradient(-20deg, #a9dbe2, #cbcded) !important;
    }

    .b-third.pastel {
        background: linear-gradient(-20deg, #efd8f3, #c5beff) !important;
    }

    .b-forth.pastel {
        background: linear-gradient(-20deg, #c4eddf, #f9d4f5) !important;
    }



    .g-shade {
        background: linear-gradient(180deg, white 70%, #efefef) !important;
    }

    .f-first,
    .f-toggle-first.active {
        background: linear-gradient(327deg, #9ff4ff, #2ea8b8) !important;
        color: rgba(255, 255, 255, 0.836) !important;

    }

    .f-second,
    .f-toggle-second.active {
        background: linear-gradient(327deg, #7ef7cc, #39ab9b) !important;
        color: rgba(255, 255, 255, 0.836) !important;

    }

    .f-third,
    .f-toggle-third.active {
        background: linear-gradient(327deg, #95bbff, #9d56eb) !important;
        color: rgba(255, 255, 255, 0.836) !important;

    }

    .f-forth,
    .f-toggle-forth.active {
        background: linear-gradient(327deg, #fba5c9, #eb1c73) !important;
        color: rgba(255, 255, 255, 0.836) !important;

    }

    .f-primary,
    .f-toggle-primary.active {
        background-color: #00c4ff !important;
        color: rgba(255, 255, 255, 0.836) !important;

    }

    .f-success,
    .f-toggle-success.active {
        background-color: #88ef2a !important;
        color: #000000a4 !important;


    }

    .f-secondary,
    .f-toggle-secondary.active {
        background-color: #a04aff !important;
        color: rgba(255, 255, 255, 0.836) !important;

    }

    .f-danger,
    .f-toggle-danger.active {
        background-color: #ff1496 !important;
        color: rgba(255, 255, 255, 0.836) !important;

    }

    .f-warning,
    .f-toggle-warning.active {
        background-color: #ffe215 !important;
        color: #000000a4 !important;

    }

    .f-info,
    .f-toggle-info.active {
        background-color: #c3dbe1 !important;
    }

    .f-light,
    .f-toggle-light.active {
        background-color: #c8e9ff !important;
    }

    .f-dark,
    .f-toggle-dark.active {
        background-color: #5b5b5b !important;
        color: rgba(255, 255, 255, 0.836) !important;
    }

    .f-white,
    .f-toggle-white.active {
        background-color: white !important;
        color: #000000a4 !important;

    }

    .f-main,
    .f-toggle-main.active {
        background-color: #5850ec !important;
        color: rgba(255, 255, 255, 0.836) !important;
    }

    .f-glass,
    .f-toggle-glass.active {
        background-color: #ffffff7c !important;
        color: rgba(75, 75, 75, 0.521) !important;
    }

    .alert-shade-white {
        background: linear-gradient(13deg, #ffffff, #f3f3f3b8);
    }

    .alert.bd-side {
        border-left-width: 5px;
        padding: 18px;
        border-radius: 20px;
    }

    .alert-first {

        background: linear-gradient(327deg, #9ff4ff, #2ea8b8) !important;
    }

    .alert-second {

        background: linear-gradient(327deg, #7ef7cc, #39ab9b) !important;
    }

    .alert-third {

        background: linear-gradient(327deg, #95bbff, #9d56eb) !important;
    }

    .alert-forth {

        background: linear-gradient(327deg, #fba5c9, #eb1c73) !important;
    }

    .alert-primary.alert-shade {
        background-color: aqua !important;
    }

    .alert-success.alert-shade {
        background-color: #00ffd0 !important;
    }

    .alert-secondary.alert-shade {
        background-color: #de78ff !important;
    }

    .alert-danger.alert-shade {
        background-color: #ff1496 !important;
    }

    .alert-warning.alert-shade {
        background-color: #ffe215 !important;
    }

    .alert-info.alert-shade {
        background-color: #c3dbe1 !important;
    }

    .alert-light.alert-shade {
        background-color: #c8e9ff !important;
    }

    .alert-dark.alert-shade {
        background-color: #5b5b5b !important;
    }

    .box-card {
        background: linear-gradient(0deg, #f7f7f7, white);
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 0 9px -4px #0000005c;
    }

    .card-title {
        float: none;
    }
</style>
