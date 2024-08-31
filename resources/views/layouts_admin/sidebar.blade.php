<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
            <a href="/">Sistem Jasa Konstruksi</a>
            </div>
            <ul class="sidebar-menu">
                <!-- <li><a class="nav-link" href="/"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li> -->
                <li>
                    @if (auth()->user()->type != 1)
                        <a class="nav-link" href="/house_type">
                            <i class="fas fa-list-alt"></i> 
                            <span>Tipe Rumah</span>
                        </a>
                    @endif
                </li>
                <li>
                    @if (auth()->user()->type != 1)
                        <a class="nav-link" href="/contractor">
                            <i class="fas fa-users"></i> 
                            <span>Kontraktor</span>
                        </a>
                    @endif
                </li>
                <li>
                    @if (auth()->user()->type == 0)
                        <a class="nav-link" href="/get-orders">
                            <i class="fas fa-shopping-cart"></i> 
                            <span>Pesanan</span>
                        </a>
                    @endif
                </li>
                <li>
                    @if (auth()->user()->type == 1)
                        <a class="nav-link" href="/house_type_detail">
                            <i class="fas fa-home"></i> 
                            <span>Tipe Rumah</span>
                        </a>
                    @endif
                </li>

            </ul>
            
        </aside>
    </div>