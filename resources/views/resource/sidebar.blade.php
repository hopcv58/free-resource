@if(isset($status))
    <div class="sidebar-left">
        <div class="row resource-sidebar">
            <div class="col-md-12">
                <h4>CO-WELL ASIA</h4>
                <hr>
            </div>
            <p class="menu-sidebar">UPDATE PROFILE</p>
            <ul>
                <li><a href="">Change account</a></li>
            </ul>
            <p class="menu-sidebar">MANAGE RESOURCE</p>
            <ul>
                <li><a href="{{route('resource.index') . '?status=0'}}" @if($status == 0) class="link-selected" @endif>Employee
                        Avaiable</a></li>
                <li><a href="{{route('resource.index') . '?status=1'}}" @if($status == 1) class="link-selected" @endif>Employee
                        In Negotiate</a></li>
                <li><a href="{{route('resource.index') . '?status=2'}}" @if($status == 2) class="link-selected" @endif>Employee
                        Hired</a></li>
                <li><a href="">Device Avaiable</a></li>
                <li><a href="/resource">Device In Negotiate</a></li>
                <li><a href="/resource">Device Hired</a></li>
            </ul>
        </div>
    </div>
@endif