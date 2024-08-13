<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
            <a href="/">Sistem Jasa Konstruksi</a>
            </div>
            <ul class="sidebar-menu">
                <li><a class="nav-link" href="/"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
                <li>
                    @if (auth()->user()->type == 1)
                        <a class="nav-link" href="/product">
                            <i class="fas fa-list-alt"></i> 
                            <span>Produk</span>
                        </a>
                    @endif
                </li>

            </ul>
            
        </aside>
    </div>