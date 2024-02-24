<nav class="navbar navbar-expand-lg px-4 navbar-ungu">
    <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold" href="#">Sistem Kasir <i class="fa-solid fa-cash-register"
                style="color: #ffffff;"></i></a>|
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/"><i
                            class="fa-solid fa-house-chimney fa-flip" style="color: #ffffff;"></i> Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/transaksi"><i class="fa-solid fa-money-bill-transfer fa-flip"
                            style="color: #ffffff;"></i> Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/barang"><i class="fa-solid fa-warehouse fa-bounce"
                            style="color: #ffffff;"></i> Data Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/log"><i class="fa-solid fa-gears fa-spin-pulse"
                            style="color: #ffffff;"></i> Log</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/detail-transaksi"><i class="fa-solid fa-circle-info fa-fade"
                            style="color: #ffffff;"></i> Riwayat Transaksi</a>
                </li>
            </ul>
        </div>
        |
        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Hai, {{ auth()->user()->nama }}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                    Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li class="nav-item bg-button-primary">
                    <a href="/login" class="nav-link text-button-primary"> <i class="fa-solid fa-right-to-bracket"
                            style="color: #ffffff;"></i> Login</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
