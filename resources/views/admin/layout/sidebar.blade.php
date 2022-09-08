<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/categories') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.category.title') }}</a></li> -->
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/books') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.book.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/tests') }}"><i class="nav-icon icon-pencil"></i> {{ trans('admin.test.title') }}</a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/sections') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.section.title') }}</a></li> -->
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/authors') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.author.title') }}</a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/units') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.unit.title') }}</a></li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/questions') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.question.title') }}</a></li> -->
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/users') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.user.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/comments') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.comment.title') }}</a></li>

            <li class="nav-title">Orders</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/order-hds') }}"><i class="nav-icon icon-compass"></i> All</a></li>
            <li class="nav-item  {{   Request::is('admin/order-hds?status=1')  ? 'active' : '' }}"><a class="nav-link" href="{{ url('admin/order-hds?status=1') }}"><i class="nav-icon icon-compass"></i> New</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/order-hds?status=2') }}"><i class="nav-icon icon-compass"></i> Complete</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/order-hds?type=read') }}"><i class="nav-icon icon-compass"></i> Online Read</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/order-hds?type=order') }}"><i class="nav-icon icon-compass"></i> Online Order</a></li>
            <li class="nav-title">Slides</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/slides') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.slide.title') }}</a></li>
            {{-- Do not delete me :) I'm used for auto-generation menu items --}}
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/roles') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.role.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/settings') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.setting.title') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>