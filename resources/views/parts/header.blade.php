<div id="header" class="docs-header">
    <div class="topic">
        <div class="container">
            <div class="col-md-8">
                <h3>Freeresource</h3>
                <h4>behind your success</h4>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <div class="topic__infos">
            <div class="container">
                <div class="row  main-menu">
                    <ul>
                        @if (Auth::guest())
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Register</a></li>
                        @else
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <p class="btn btn-warning">Logout</p>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                        <li><a href="{{route('resource.index') . '?status=0'}}"><p @if(isset($tabActive) && $tabActive == 'resource') class="menu-active"@endif>My resource</p></a></li>
                        <li><a href="{{route('job.index')}}"><p @if(isset($tabActive) && $tabActive == 'search') class="menu-active"@endif>Find job</p></a></li>
                        <li><a href="{{route('device.index')}}"><p @if(isset($tabActive) && $tabActive == 'device') class="menu-active"@endif>Device</p></a></li>
                        <li><a href="{{route('employee.index')}}"><p @if(isset($tabActive) && $tabActive == 'employ') class="menu-active"@endif>Employ</p></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>