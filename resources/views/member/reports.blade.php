@extends('member.layout.auth')

@section('content')


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

       

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="/css/memberdsh.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    </head>
    <body>

<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h4>Memeber  Dashboard</h4>
          
        </div>
        <div class=logo>
        
        </div>
        <ul class="list-unstyled components">
            
            <p>Welcome Green Task Force<br>  </p>
           
           <li>
           <a href="{{ url('/member/home') }}" class="active">Home</a>

           </li>
          
            <li >

            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Manage Reports</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li class="active"><a href="">My Reports</a></li>
                    <li><a href="{{ url('/member/newreport') }}">Submit New Report</a></li>
                    </ul>
            </li>
              
         

            <li>
                <a href="#">Messeage User</a>
            </li>
           
            <li>
                <a href="#">Settings</a>
            </li>
          
        </ul>   
         @if (Auth::guest())

         @else
        <ul class="list-unstyled CTAs">
            
            <li><a class="logout" href="{{ url('/member/logout') }} " 
            onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                    Logout
            </a>
            <form id="logout-form" action="{{ url('/member/logout') }}" method="POST" style="display: none;">
                 {{ csrf_field() }}
        </form>
        </li>
        @endif
        </ul>
     
    </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                    <span> <h4>Welcome Member : {{ Auth::user()->name }} </h4> </span>
                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-warning navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Toggle Sidebar</span>
                            </button>
                        
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                          
                                
                            </ul>   
                        </div>
                    </div>
                </nav>
                  <!-- Page Content Holder -->
             
                                <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Report Title</th>
                                <th scope="col">Reported At</th>
                                <th scope="col">City</th>
                                <th scope="col">Verified Status</th>
                                <th scope="col">View</th>
                                <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($reports as $report)
                                <tr>
                                <th scope="row">{{$report->id}}</th>
                                <td>{{$report->title}}</td>
                                <td>{{$report->date}}</td>
                                <td>{{$report->city}}</td>
                                

                                @if($report ->verified)
                                <td><button type="button" class="btn btn-success">&nbsp &nbsp Verifiefd &nbsp &nbsp</button></td>
                                @else
                                <td><button type="button" class="btn btn-danger">Not Verifiefd</button></td>
                                @endif

                                <td><button type="button" class="btn btn-warning"><a href="/member/viewreport/{{$report->id}}"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                                @if($report ->verified)
                                <td><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok"></button></td>
                                @else
                                <td><button type="button" class="btn btn-danger"><a href="/member/deletereport/{{$report->id}}"><span class="glyphicon glyphicon-trash"></span></button></td>
                                @endif
                            </tr>
                                

                                @endforeach
                                
                            </tbody>
                            </table>
                           




                   


                        </div>



                        
@endsection
