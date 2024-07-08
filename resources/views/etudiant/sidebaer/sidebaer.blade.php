<div class="nk-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('etudiant.dashboard') }}">ITIEP</a></li>
                    <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                </ul>
            </li>
            <li class="nav-label">Formation</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Formation de instuit</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('e.afichher') }}">Etudiant</a></li>
                    <li><a href="{{ route('g.afichher') }}">Groupe</a></li>
                </ul>
            </li>
        </ul>  
    </div>
</div>