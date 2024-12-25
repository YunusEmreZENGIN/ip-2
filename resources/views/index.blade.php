
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Modern Admin Dashboard</title>
    <link rel="stylesheet" href="../EnvanterTakipWe/style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
            <!-- Ag-Grid CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ag-grid-community/styles/ag-grid.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ag-grid-community/styles/ag-theme-alpine.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/4.0.0/apexcharts.min.js" integrity="sha512-f82EGNY/Wwa6E9g6tKFHoyiaytlgfd0g5gfaOJjSIF6k5T7vqmWrP83iXZdUZoc0DvO3kR4jRpmAZUBt5MhBbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ag-grid/32.3.3/ag-grid-community.min.js" integrity="sha512-fD9MUUcwwAe0W4Qj+wis2c6GNIAIAgxkGiVNYa3ZZH+7uKdjPIU+VZ7wXffl4eLda4rVAIfxEqeO2Q0+4+w/Kw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/ag-grid-enterprise@32.3.3/dist/ag-grid-enterprise.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>
  
    <!-- Ag-Grid JS -->
    <script src="https://cdn.jsdelivr.net/npm/ag-grid-community/dist/ag-grid-community.min.js"></script>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;600&display=swap');

    :root {
        --main-color: #22BAA0;
        --color-dark: #34425A;
        --text-grey: #B0B0B0;
    }

    * {
        margin: 0;
        padding: 0;
        text-decoration: none;
        list-style-type: none;
        box-sizing: border-box;
        font-family: 'Merriweather', sans-serif;
    }

    #menu-toggle {
        display: none;
    }
   
    .sidebar {
        position: fixed;
        height: 100%;
        width: 165px;
        left: 0;
        bottom: 0;
        top: 0;
        z-index: 100;
        background: var(--color-dark);
        transition: left 300ms;
    }

    .side-header {
        box-shadow: 0px 5px 5px -5px rgb(0 0 0 /10%);
        background: var(--main-color);
        height: 60px;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .side-header h3, side-head span {
        color: #fff;
        font-weight: 400;
    }

    .side-content {
        height: calc(100vh - 60px);
        overflow: auto;
    }

    /* width */
    .side-content::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    .side-content::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    /* Handle */
    .side-content::-webkit-scrollbar-thumb {
        background: #b0b0b0;
        border-radius: 10px;
    }

    /* Handle on hover */
    .side-content::-webkit-scrollbar-thumb:hover {
        background: #b30000;
    }

    .profile {
        text-align: center;
        padding: 2rem 0rem;
    }

    .bg-img {
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 50%;
        background-size: cover;
    }

    .profile-img {
        height: 80px;
        width: 80px;
        display: inline-block;
        margin: 0 auto .5rem auto;
        border: 3px solid #899DC1;
    }

    .profile h4 {
        color: #fff;
        font-weight: 500;
    }

    .profile small {
        color: #899DC1;
        font-weight: 600;
    }

    .side-menu ul {
        text-align: center;
    }

    .side-menu a {
        display: block;
        padding: 1.2rem 0rem;
    }

    .side-menu a.active {
        background: #2B384E;
    }

    .side-menu a.active span, .side-menu a.active small {
        color: #fff;
    }

    .side-menu a span {
        display: block;
        text-align: center;
        font-size: 1.7rem;
    }

    .side-menu a span, .side-menu a small {
        color: #899DC1;
    }

    #menu-toggle:checked ~ .sidebar {
        width: 60px;
    }

    #menu-toggle:checked ~ .sidebar .side-header span {
        display: none;
    }

    #menu-toggle:checked ~ .main-content {
        margin-left: 60px;
        width: calc(100% - 60px);
    }

    #menu-toggle:checked ~ .main-content header {
        left: 60px;
    }

    #menu-toggle:checked ~ .sidebar .profile,
    #menu-toggle:checked ~ .sidebar .side-menu a small {
        display: none;
    }

    #menu-toggle:checked ~ .sidebar .side-menu a span {
        font-size: 1.3rem;
    }


    .main-content {
        margin-left: 165px;
        width: calc(100% - 165px);
        transition: margin-left 300ms;
    }

    header {
        position: fixed;
        right: 0;
        top: 0;
        left: 165px;
        z-index: 100;
        height: 60px;
        box-shadow: 0px 5px 5px -5px rgb(0 0 0 /10%);
        background: #fff;
        transition: left 300ms;
    }

    .header-content, .header-menu {
        display: flex;
        align-items: center;
    }

    .header-content {
        justify-content: space-between;
        padding: 0rem 1rem;
    }

    .header-content label:first-child span {
        font-size: 1.3rem;
    }

    .header-content label {
        cursor: pointer;
    }

    .header-menu {
        justify-content: flex-end;
        padding-top: .5rem;
    }

    .header-menu label,
    .header-menu .notify-icon {
        margin-right: 2rem;
        position: relative;
    }

    .header-menu label span,
    .notify-icon span:first-child {
        font-size: 1.3rem;
    }

    .notify-icon span:last-child {
        position: absolute;
        background: var(--main-color);
        height: 16px;
        width: 16px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        right: -5px;
        top: -5px;
        color: #fff;
        font-size: .8rem;
        font-weight: 500;
    }

    .user {
        display: flex;
        align-items: center;
    }

    .user div, .client-img {
        height: 40px;
        width: 40px;
        margin-right: 1rem;
    }

    .user span:last-child {
        display: inline-block;
        margin-left: .3rem;
        font-size: .8rem;
    }

    main {
        margin-top: 60px;
    }
    .charts{
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap:20px;
        margin-top: 20px;
        margin-left: 165px;

    }
    .charts-card{
        background-color:#263043 ;
        margin-bottom: 20px;
        padding: 25px;
        box-sizing: border-box;
        -webkit-column-break-inside: avoid;
        border-radius: 5px;
        box-shadow: 0 6px 7px 5px rgba(0,0,0,0.2);

    }
    .charts-title{
        justify-content: center;
        align-items: center;
        display: flex;
    }
    .charts-verimlilik{
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap:20px;
        margin-top: 20px;
        margin-left: 165px;


    }

    .charts-card-verimlilik{
        background-color:#263043 ;
        margin-bottom: 20px;
        padding: 25px;
        box-sizing: border-box;
        -webkit-column-break-inside: avoid;
        border-radius: 5px;
        box-shadow: 0 6px 7px 5px rgba(0,0,0,0.2);

    }
    .charts-title-verimlilik{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .charts-kalite{
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap:20px;
        margin-top: 20px;
        margin-left: 10px;
        height: 30px;

    }
    .charts-card-kalite{
        background-color:#263043 ;
        margin-bottom: 20px;
        padding: 25px;
        box-sizing: border-box;
        -webkit-column-break-inside: avoid;
        border-radius: 5px;
        box-shadow: 0 6px 7px 5px rgba(0,0,0,0.2);
    }
    .charts-title-kalite{
        justify-content: center;
        align-items: center;
        display: flex;
    }
    .charts-adet{
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap:20px;
        margin-top: 20px;

        height: 30px;
    }
    .charts-title-adet{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .charts-card-adet{
        background-color:#263043 ;
        margin-bottom: 20px;
        padding: 25px;
        box-sizing: border-box;
        -webkit-column-break-inside: avoid;
        border-radius: 5px;
        box-shadow: 0 6px 7px 5px rgba(0,0,0,0.2);
    }

    .page-header {
        padding: 1.3rem 1rem;
        background: #E9edf2;
        border-bottom: 1px solid #dee2e8;
    }

    .page-header h1, .page-header small {
        color: #74767d;
    }

    .page-content {
        padding: 1.3rem 1rem;
        background: #f1f4f9;
    }

    .analytics {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 2rem;
        margin-top: .5rem;
        margin-bottom: 2rem;
    }

    .card {
        box-shadow: 0px 5px 5px -5px rgb(0 0 0 / 10%);
        background: #fff;
        padding: 1rem;
        border-radius: 3px;
    }

    .card-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-head h2 {
        color: #333;
        font-size: 1.8rem;
        font-weight: 500;
    }

    .card-head span {
        font-size: 3.2rem;
        color: var(--text-grey);
    }
    .ag-theme-alphine{
        --ag-header-background-color:rgb(132, 132, 132);
    }

    .page-title{
        margin-left: 700px;
        font-size: 25px;
        font-weight: 600;
        margin-top: 20px; 
    }
    .page-end{
        border: 1px solid rgb(181, 181, 181);
        margin-right:26px;
        border-radius: 5px;
        color: white;
    }

    .card-progress small {
        color: #777;
        font-size: .8rem;
        font-weight: 600;
    }

    .card-indicator {
        margin: .7rem 0rem;
        height: 10px;
        border-radius: 4px;
        background: #e9edf2;
        overflow: hidden;
    }

    .indicator {
        height: 10px;
        border-radius: 4px;
    }

    .indicator.one {
        background: #22baa0;
    }

    .indicator.two {
        background: #11a8c3;
    }

    .indicator.three {
        background: #f6d433;
    }

    .indicator.four {
        background: #f25656;
    }

    .records {
        box-shadow: 0px 5px 5px -5px rgb(0 0 0 / 10%);
        background: #fff;
        border-radius: 3px;
    }

    .record-header {
        padding: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .add, .browse {
        display: flex;
        align-items: center;
    }

    .add span {
        display: inline-block;
        margin-right: .6rem;
        font-size: .9rem;
        color: #666;
    }

    input, button, select {
        outline: none;
    }

    .add select, .browse input, .browse select {
        height: 35px;
        border: 1px solid #b0b0b0;
        border-radius: 3px;
        display: inline-block;
        width: 75px;
        padding: 0rem .5rem;
        margin-right: .8rem;
        color: #666;
    }

    .add button {
        background: var(--main-color);
        color: #fff;
        height: 37px;
        border-radius: 4px;
        padding: 0rem 1rem;
        border: none;
        font-weight: 600;
    }

    .browse input {
        width: 150px;
    }

    .browse select {
        width: 100px;
    }

    .table-responsive {
        width: 100%;
        overflow: auto;
    }

    table {
        border-collapse: collapse;
    }

    table thead tr {
        background: #e9edf2;
    }

    table thead th {
        padding: 1rem 0rem;
        text-align: left;
        color: #444;
        font-size: .9rem;
    }

    table thead th:first-child {
        padding-left: 1rem;
    }

    table tbody td {
        padding: 1rem 0rem;
        color: #444;
    }

    table tbody td:first-child {
        padding-left: 1rem;
        color: var(--main-color);
        font-weight: 600;
        font-size: .9rem;
    }

    table tbody tr {
        border-bottom: 1px solid #dee2e8;
    }

    .client {
        display: flex;
        align-items: center;
    }

    .client-img {
        margin-right: .5rem;
        border: 2px solid #b0b0b0;
        height: 45px;
        width: 45px;
    }

    .client-info h4 {
        color: #555;
        font-size: .95rem;
    }

    .client-info small {
        color: #777;
    }

    .actions span {
        display: inline-block;
        font-size: 1.5rem;
        margin-right: .5rem;
    }

    .paid {
        display: inline-block;
        text-align: center;
        font-weight: 600;
        color: var(--main-color);
        background: #e5f8ed;
        padding: .5rem 1rem;
        border-radius: 20px;
        font-size: .8rem;
    }
    .sidebar .side-header .Logo{

        margin-left: 1px;


    }

    .headerclass .header-content .bars{
        margin-left: 12px;
        font-size: 30px;
    }
    .headerclass .header-menu .searchs{

        margin-top: 7px;
    }


        table {
            width: 900px;
        }
    




    body {
        padding: 1em;
    }

    #sub-inner-top {
        height: 25px;
        width: 50px;
        border-radius: 90px 90px 0 0;
        -moz-border-radius: 90px 90px 0 0;
        -webkit-border-radius: 90px 90px 0 0;
        background: #979797;
    }

    #inner-overlay {
        height: 50px;
        width: 50px;
        border-radius: 50%;
        top: 50%;
        left: 50%;
        position: absolute;
        margin: -25px 0px 0px -25px;
        overflow: hidden;
        z-index: 99;
    }

    #inner {
        height: 50px;
        width: 50px;
        background-color: #a5a5a5;
        border-radius: 50%;
        top: 50%;
        left: 50%;
        position: absolute;
        margin: -25px 0px 0px -25px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    }

    #sub-outer-top {
        height: 50px;
        width: 100px;
        border-radius: 90px 90px 0 0;
        -moz-border-radius: 90px 90px 0 0;
        -webkit-border-radius: 90px 90px 0 0;
        background: #e3e3e3;
    }

    #outer {
        position: relative;
        height: 30px;
        width: 30px;
        background-color: #eeeeee;
        border-radius: 50%;
        margin: 0 auto;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
    }

    #outer:hover {
        box-shadow: 1px 0 10px 2px rgba(0, 0, 0, 0.15), 0 6px 6px rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }

    .power {
        color: white;
        vertical-align: middle;
        text-align: center;
        text-decoration: none;
        -moz-user-select: none;
        -webkit-user-select: none;
        user-select: none;
        pointer-events: none;
        margin: 12.5px 12.5px;
        -webkit-transition: color 3s ease;
        -moz-transition:  3s color ease;
        -o-transition: color 3s ease;
        transition: color 3s ease;
        -webkit-transition: text-shadow 3s ease;
        -moz-transition: text-shadow 3s ease;
        -o-transition: text-shadow 3s ease;
        transition: text-shadow 3s ease;
    }

    #outer:before {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        display: block;
        width: 0;
        padding-top: 0;
        border-radius: 100%;
        background-color: rgba(207, 205, 207, .3);
        -webkit-transform: translate(-10%, -50%);
        -moz-transform: translate(-10%, -50%);
        -ms-transform: translate(-10%, -50%);
        -o-transform: translate(-10%, -50%);
        transform: translate(-66%, -50%);
    }

    #outer:active:before {
        width: 120%;
        padding-top: 120%;
        transition: width .3s ease-out, padding-top .3s ease-out;
    }


    #outer:active {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
        transition: box-shadow .2s ease-out, padding-top .2s ease-out;
    }

    .on {
        color: #39baf4;
        -webkit-transition: color 3s ease;
        -moz-transition:  3s color ease;
        -o-transition: color 3s ease;
        transition: color 3s ease;
        -webkit-transition: text-shadow 1s ease;
        -moz-transition: text-shadow 1s ease;
        -o-transition: text-shadow 1s ease;
        transition: text-shadow 1s ease;
        text-shadow: 0 0 10px #fff, 0 0 20px #228DFF,   0 0 30px #fff, 0 0 40px #39baf4, 0 0 70px     #39baf4, 0 0 80px #39baf4, 0 0 100px #39baf4, 0 0 150px #39baf4;
        animation: innerpulse .5s;
    }

    @-webkit-keyframes innerpulse {
        0% {
            -webkit-box-shadow: 0 0 0 0 rgba(57, 186, 244, 0.4);
        }
        70% {
            -webkit-box-shadow: 0 0 0 10px rgba(57, 186, 244, 0);
        }
        100% {
            -webkit-box-shadow: 0 0 0 0 rgba(57, 186, 244, 0);
        }
    }

    @keyframes innerpulse {
        0% {
            -moz-box-shadow: 0 0 0 0 rgba(57, 186, 244, 0.4);
            box-shadow: 0 0 0 0 rgba(57, 186, 244, 0.4);
        }
        70% {
            -moz-box-shadow: 0 0 0 10px rgba(57, 186, 244, 0);
            box-shadow: 0 0 0 30px rgba(57, 186, 244, 0);
        }
        100% {
            -moz-box-shadow: 0 0 0 0 rgba(57, 186, 244, 0);
            box-shadow: 0 0 0 0 rgba(57, 186, 244, 0);
        }
    }
</style>
</head>
<body >
<input type="checkbox" id="menu-toggle">
<div class="main-content">
    <header>
        <div class="headerclass">
            <div class="header-content">
                <div class="bars">
                    <label for="menu-toggle">
                        <span class="las la-bars"></span>
                    </label>
                </div>
                <div class="header-menu">
                    <div class="searchs">
                        <label for="">
                            <span class="las la-search"></span>
                        </label>
                    </div>
                    <div class="notify-icon">
                        <span class="las la-envelope"></span>
                        <span class="notify">4</span>
                    </div>

                    <div class="notify-icon">
                        <span class="las la-bell"></span>
                        <span class="notify">3</span>
                    </div>



                    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                    <a href="#">
                        <div id="outer">
                            <div id="sub-outer-top">
                                <div id="inner">
                                    <div id="sub-inner-top">
                                        <i class="material-icons power">power_settings_new</i>
                                        <div id="inner-overlay">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  </a>


                </div>
            </div>
        </div>
</div>
</div>
</div>
</header>

<div class="sidebar">
    <div class="side-header">
        <div class="Logo" >
        <a href="{{route('layouts.anaekran')}}">
            <img src="{{asset('storage/Logo.png')}}" alt="Logo" style="width: 45px;" />

        </a>    
        </div>
    </div>

    <div class="side-content">
        <div class="profile">
            <div class="profile-img bg-img" style="background-image: url({{url('storage/anafoto.jpeg')}})"></div>
            <h4>Yunus Emre ZENGİN</h4>
            <a href="https://www.linkedin.com/in/yunus-emre-zengin-8610292ab/"><small>Software Developer</small></a>
        </div>

        <div class="side-menu">
            <ul>
                <li>
                    <a href="{{route('layouts.anaekran')}}" <?php if (basename($_SERVER['PHP_SELF']) == 'İndex.php') echo 'class="active"'; ?>>
                        <span><img src="{{asset('storage/House.png')}}" alt="Logo" style="width: 45px;" /></span>

                        <small>Ana Grafik Ekranı</small>
                    </a>
                </li>
                <li>
                    <a href="{{route('layouts.adetraporu')}}" <?php if (basename($_SERVER['PHP_SELF']) == 'sozlesme.php') echo 'class="active"'; ?>>
                        <span><img src="{{asset('storage/report2.png')}}" alt="Logo" style="width: 45px;" /></span>
                        <small>Adet Raporu</small>
                    </a>
                </li>
                <li>
                    <a href="{{route('layouts.Verimİzleme')}}">
                        <span><img src="{{asset('storage/effiency.png')}}" alt="Logo" style="width: 45px;" /></span> 
                        <small>Verim İzleme</small>
                    </a>
                </li>
               
            </ul>
        </div>
    </div>
</div>
<div class="main-content">
    <div class="page-header">
        <br>
        <br>
        <h1>Dashboard</h1>
        <small>Home / Dashboard</small>
    </div>
</div>
@yield("main")





@stack('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
