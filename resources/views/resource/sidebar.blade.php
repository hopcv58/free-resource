@if(isset($status))
    <div class="sidebar-left">
        <div class="row resource-sidebar">
            <div class="col-md-12" style="padding: 0 0 7px 0; border-bottom: 1px solid #e1e1e1; margin-bottom: 10px">

                <h4>{{Auth::user()->name}}</h4>
            </div>
            <p class="menu-sidebar">UPDATE PROFILE</p>
            <ul>
                <li><a href="">Change account</a></li>
            </ul>
            <p class="menu-sidebar">EMPLOYEE MANAGE</p>
            <ul>
                <li><a href="{{route('resource.index') . '?status=0'}}" @if($status == 0 && Request::route()->getName() == 'resource.index') class="link-selected" @endif>Employee
                        Non Public</a></li>
                <li><a href="{{route('resource.index') . '?status=1'}}" @if($status == 1 && Request::route()->getName() == 'resource.index') class="link-selected" @endif>Employee
                        Public</a></li>
                <li><a href="{{route('resource.index') . '?status=2'}}" @if($status == 2 && Request::route()->getName() == 'resource.index') class="link-selected" @endif>Employee
                        In Negotiate</a></li>
                <li><a href="{{route('resource.index') . '?status=3'}}" @if($status == 3 && Request::route()->getName() == 'resource.index') class="link-selected" @endif>Employee
                        Hired</a></li>
                <li><a href="{{route('resource.index') . '?status=4'}}" @if($status == 4 && Request::route()->getName() == 'resource.index') class="link-selected" @endif>Employee
                        Completed</a></li>
            </ul>
            <p class="menu-sidebar">DEMAND JOB MANAGE</p>
            <ul>
                <li><a href="{{route('resource.job')}}" @if(Request::route()->getName() == 'resource.job') class="link-selected" @endif>My Job</a></li>
                <li><a href="{{route('resource.job.negotiating')}}" @if(Request::route()->getName() == 'resource.job.negotiating') class="link-selected" @endif>Negotiating</a></li>
                <li><a href="{{route('resource.job.hired')}}" @if(Request::route()->getName() == 'resource.job.hired') class="link-selected" @endif>Hiring Employee</a></li>
            </ul>
            <p class="menu-sidebar">DEVICE MANAGE</p>
            <ul>
                <li><a href="{{route('resource.device')}}" @if($status == 0 && Request::route()->getName() == 'resource.device') class="link-selected" @endif>Device Available</a></li>
                <li><a href="{{route('resource.device') . '?status=1'}}" @if($status == 1 && Request::route()->getName() == 'resource.device') class="link-selected" @endif>Device In Negotiate</a></li>
                <li><a href="{{route('resource.device'). '?status=2'}}" @if($status == 2 && Request::route()->getName() == 'resource.device') class="link-selected" @endif>Device Hired</a></li>
                <li><a href="{{route('resource.device'). '?status=3'}}" @if($status == 3 && Request::route()->getName() == 'resource.device') class="link-selected" @endif>Device Completed</a></li>
            </ul>
        </div>
    </div>
@endif