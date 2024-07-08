<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a class="has-arrow {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                    <i class="fas fa-tachometer-alt menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-label">Formation</li>
            <li>
                <a class="has-arrow {{ request()->is('for*') ? 'active' : '' }}" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-graduation-cap menu-icon"></i><span class="nav-text">Formation de instuit</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('for.index') }}">Formation</a></li>
                    <li><a href="{{ route('f.index') }}">Filiere</a></li>
                    <li><a href="{{ route('m.index') }}">Module</a></li>
                    <li><a href="{{ route('g.index') }}">Groupe</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow {{ request()->is('etudiant*') ? 'active' : '' }}" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-user-graduate menu-icon"></i><span class="nav-text">Information de Etudiant</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('e.index') }}">Etudiant</a></li>
                    <li><a href="{{ route('exm.index') }}">Examane</a></li>
                    <li><a href="{{ route('not.index') }}">Note</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow {{ request()->is('enseignant*') ? 'active' : '' }}" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-chalkboard-teacher menu-icon"></i>
                    <span class="nav-text">List des Enseignant</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('ens.index') }}">Enseignant</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow {{ request()->is('absence*') ? 'active' : '' }}" href="javascript:void()" aria-expanded="false">
                    <i class="far fa-calendar-times menu-icon"></i><span class="nav-text">List des Absences</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('abcenseEnseig.index') }}">Enseignant</a></li>
                    <li><a href="{{ route('abcenseEtudi.index') }}">Etudiant</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow {{ request()->is('emploi*') ? 'active' : '' }}" href="javascript:void()" aria-expanded="false">
                    <i class="far fa-calendar-alt menu-icon"></i><span class="nav-text">Emplois du Tempes</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('emploiEns.index') }}">Enseignant</a></li>
                    <li><a href="{{ route('emploiEtuds.index') }}">Etudiant</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow {{ request()->is('stagiaire*') ? 'active' : '' }}" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-user-tie menu-icon"></i><span class="nav-text">List de Stagiaire</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('s.index') }}">Stagiaire</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow {{ request()->is('evenement*') ? 'active' : '' }}" href="javascript:void()" aria-expanded="false">
                    <i class="far fa-calendar-plus menu-icon"></i><span class="nav-text">Ajouter Evenement</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="#">Etudiant</a></li>
                    <li><a href="#">Enseignant</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
