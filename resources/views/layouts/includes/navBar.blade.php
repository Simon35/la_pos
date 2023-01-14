<a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline rounded-pill"><i class="fa fa-list"></i></a>
<a href="{{ route('users-list')}}" class="btn btn-outline rounded-pill"><i class="fa fa-user"></i> User</a>
<a href="{{ route('products-list')}}" class="btn btn-outline rounded-pill"><i class="fa fa-box"></i> Products</a>
<a href="{{ route('users-list')}}" class="btn btn-outline rounded-pill"><i class="fa fa-laptop"></i> Cashier</a>
<a href="{{ route('users-list')}}" class="btn btn-outline rounded-pill"><i class="fa fa-file"></i> Report</a>
<a href="{{ route('users-list')}}" class="btn btn-outline rounded-pill"><i class="fa fa-money-bill"></i> Echanges</a>
<a href="{{ route('users-list')}}" class="btn btn-outline rounded-pill"><i class="fa fa-chart"></i> Suppliers</a>
<a href="{{ route('users-list')}}" class="btn btn-outline rounded-pill"><i class="fa fa-users"></i> Customers</a>

<style>
    .btn-outline {
        border-color: #008888;
        color: #008888;
    }

    .btn-outline:hover {
        background: #008888;
        color: #fff;

    }
</style>