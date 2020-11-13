<div class="span3">
    <div class="sidebar">
        <ul class="widget widget-menu unstyled">
            <li class="active">
                <a href="{{ route('admin.home') }}"><i class="menu-icon icon-dashboard"></i>Dashboard</a>
            </li>
            <li>
                <a class="collapsed" data-toggle="collapse" href="#togglePages1">
                    <i class="menu-icon icon-qrcode"></i>
                    <i class="icon-chevron-down pull-right"></i>
                    <i class="icon-chevron-up pull-right">
                    </i>Category</a>
                <ul id="togglePages1" class="collapse unstyled"
                    @if(request()->path() == 'add/category') style="display: block;"
                    @elseif(request()->path() == 'manage/category') style="display: block"
                        @endif>
                    <li><a href="{{ route('add.category') }}" class="nav-link @if(request()->path() == 'add/category') bg-success @endif"><i class="icon-question-sign"></i>Add Category</a></li>
                    <li><a href="{{ route('manage.category') }}" class="nav-link @if(request()->path() == 'manage/category') bg-success @endif"><i class="icon-quote-left"></i>Manage Category</a></li>
                </ul>
            </li>
            <li>
                <a class="collapsed" data-toggle="collapse" href="#togglePages2">
                    <i class="menu-icon icon-qrcode"></i>
                    <i class="icon-chevron-down pull-right"></i>
                    <i class="icon-chevron-up pull-right">
                    </i>Company</a>
                <ul id="togglePages2" class="collapse unstyled"
                    @if(request()->path() == 'add/company') style="display: block;"
                    @elseif(request()->path() == 'manage/company') style="display: block"
                        @endif>
                    <li><a href="{{ route('add.company') }}" class="nav-link @if(request()->path() == 'add/company') bg-success @endif"><i class="icon-question-sign"></i>Add Company</a></li>
                    <li><a href="{{ route('manage.company') }}" class="nav-link @if(request()->path() == 'manage/company') bg-success @endif"><i class="icon-quote-left"></i>Manage Category</a></li>
                </ul>
            </li>
        </ul>
        <!--/.widget-nav-->
    </div>
    <!--/.sidebar-->
</div>