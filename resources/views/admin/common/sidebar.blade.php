<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    @php
        $url = explode('/',url()->current());
        $controller = $url[4];
        $method = $url[5];
    @endphp
    <ul class="nav menu">
        <li class=""><a href=""><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
        <li class="parent {{ $controller == "member" ? "active" : "" }}">
            <a href="#">
                <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Members
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li class="{{ $method == "add" ? "active" : "" }}">
                    <a href="{{ url('/member/add') }}">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add
                    </a>
                </li>
                <li class="{{ $method == "manage" ? "active" : "" }}">
                    <a href="{{ url('/member/manage') }}">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Manage
                    </a>
                </li>
            </ul>
        </li>
        <li class="parent {{ $controller == "monthly-bill" ? "active" : "" }}">
            <a href="#">
                <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Monthly Bill
            </a>
            <ul class="children collapse" id="sub-item-2">
                <li>
                    <a href="{{ url('/monthly-bill/add') }}">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add
                    </a>
                </li>
                <li>
                    <a class="" href="{{ url('/monthly-bill/manage') }}">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Manage
                    </a>
                </li>
            </ul>
        </li>
        <li class="parent {{ $controller == "bazar" ? "active" : "" }}">
            <a href="#">
                <span data-toggle="collapse" href="#sub-item-4"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Bazar
            </a>
            <ul class="children collapse " id="sub-item-4">
                <li class="">
                    <a href="{{ url('/bazar/assign') }}">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Assign
                    </a>
                </li>
                <li>
                    <a class="" href="{{ url('/bazar/manage') }}">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Manage
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div><!--/.sidebar-->