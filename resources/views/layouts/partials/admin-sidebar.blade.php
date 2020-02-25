<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.dashboard.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.order.index')}}">
            <i class="fab fa-fw fa-sellsy"></i>
            <span>Order</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.slider.index')}}">
            <i class="fas fa-fw fa-sliders-h"></i>
            <span>Slider</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.category.index')}}">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Category</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.product.index')}}">
            <i class="fab fa-fw fa-product-hunt"></i>
            <span>Product</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.delivery.charge.index')}}">
            <i class="fa fa-fw fa-truck"></i>
            <span>Delivery Charge</span>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.contact.index') }}">
            <i class="fas fa-fw fa-address-book"></i>
            <span>Contact</span>
        </a>
    </li>






    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="trash" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-trash-alt"></i>
            <span>Trash</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route('admin.trash.slider') }}">Slider</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('admin.trash.category') }}">Category</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('admin.trash.product') }}">Product</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="">Order</a>
        </div>
    </li>
</ul>
