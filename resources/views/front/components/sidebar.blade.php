<div class="col-md-3 border-right">
    <h6 class="font-weight-medium font-size-7 pt-5 pt-lg-8  mb-5 mb-lg-7">My account</h6>
    <div class="tab-wrapper">
        <ul class="my__account-nav nav flex-column mb-0" id="pills-tab">
            <li class="nav-item mx-0">
                <a class="nav-link d-flex align-items-center px-0 active" href="{{url('dashboard')}}" role="tab" aria-selected="false">
                    <span class="font-weight-normal text-gray-600">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mx-0">
                <a class="nav-link d-flex align-items-center px-0" href="{{url('myorders')}}" aria-selected="false">
                    <span class="font-weight-normal text-gray-600">Orders</span>
                </a>
            </li>


            <li class="nav-item mx-0">
                <a class="nav-link d-flex align-items-center px-0" href="{{url('myaccount')}}" id="pills-five-example1-tab">
                    <span class="font-weight-normal text-gray-600">Account details</span>
                </a>
            </li>

            <li class="nav-item mx-0">
                <a class="nav-link d-flex align-items-center px-0" href="{{url('logout')}}">
                    <span class="font-weight-normal text-gray-600">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>