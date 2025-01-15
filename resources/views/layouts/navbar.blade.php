<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    {{-- <div class="form-inline mr-auto text-muted">
        <small style="font-size: 1rem; color:black; font-weight:500;">Infomatika
            {{ setting('nama_perguruan_tinggi') }}</small>
    </div> --}}
    <ul class="nav">
        <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
                <span class="fe fe-bell fe-16"></span>
                <span class="dot dot-md bg-success"></span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-muted text-end" href="./#" data-toggle="modal" data-target=".modal-notif">
                <small class="text-dark font-weight-bold">{{ Auth::user()->name }}</small><br>
                <small class="text-dark">{{ Auth::user()->role->name }}</small>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    <img src="{{ asset(Auth::user()->foto) }}" alt="..." class="avatar-img rounded-circle">
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item font-weight-bold" href="{{ route('profile') }}">Profile</a>
                <a class="dropdown-item font-weight-bold" href="{{ route('updatePassword.index') }}">Ubah Sandi</a>
                <a class="dropdown-item font-weight-bold" href="{{ route('logout') }}" onclick="Logout();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
<div class="modal fade modal-notif modal-slide" id="pengumuman-modal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="list-group list-group-flush my-n3" id="list-pengumuman">
                    @foreach (auth()->user()->notifications as $notification)
                        <div class="list-group-item border-bottom mb-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="fe fe-info fe-16 text-success"></span>
                                </div>
                                <div class="col">
                                    <small><strong>{{ Str::limit($notification->data['title'], 20) }}</strong></small>
                                    <div class="my-0 text-muted small">{{ Str::limit($notification->data['message'], 20) }}</div>
                                </div>
                                <div class="col-auto">
                                    <small class=" text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
