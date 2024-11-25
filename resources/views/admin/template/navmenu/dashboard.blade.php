
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed pt-3 pb-3" href="#" data-toggle="collapse" data-target="#dashboard" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Dashboard</span>
    </a>
    <div id="dashboard" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            @php
                var_dump($sidemenu_active_route);
            @endphp
            @foreach ($sidemenu['menu'] as $key => $value)
                <a class="collapse-item {{ $value['name'] == $sidemenu_active_route ? 'active' : null}}" href="{{ $value['display'] == true ? route($value['route']) : '#' }}">{!! $value['label'] !!}</a>
            @endforeach
        </div>
    </div>
</li>
<!-- Nav Item - Pages Collapse Menu - END -->