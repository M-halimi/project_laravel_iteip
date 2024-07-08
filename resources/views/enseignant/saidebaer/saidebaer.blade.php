
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-tachometer-alt menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="{{ request()->is('enseignant/dashboard') ? 'active bg-gradient-primary' : '' }}" href="{{ route('enseignant.dashboard') }}">ITIEP</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-tablet-alt menu-icon"></i><span class="nav-text">Programme</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="{{ request()->is('f/aficherForm') ? 'active bg-gradient-primary' : '' }}" href="{{ route('f.aficherForm') }}">List De Formation</a></li>
                    <li><a class="{{ request()->is('fil/aficher') ? 'active bg-gradient-primary' : '' }}" href="{{ route('fil.aficher') }}">List De Fililer</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-users menu-icon"></i><span class="nav-text">List des Groupe</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="{{ request()->is('g/afichherEns') ? 'active bg-gradient-primary' : '' }}" href="{{ route('g.afichherEns') }}">Groupe</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-calendar-alt menu-icon"></i><span class="nav-text">Emplois du Tempes</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="{{ request()->is('emploEns/index') ? 'active bg-gradient-primary' : '' }}" href="{{ route('emploEns.index') }}">Emploie</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-user-graduate menu-icon"></i><span class="nav-text">List de Etudiant</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="{{ request()->is('e/aficherEtu') ? 'active bg-gradient-primary' : '' }}" href="{{ route('e.aficherEtu') }}">Etudiant</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-user-clock menu-icon"></i><span class="nav-text">List de Abcense</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="{{ request()->is('abcenseEtud/index') ? 'active bg-gradient-primary' : '' }}" href="{{ route('abcenseEtud.index') }}">Abcenses</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-calendar-plus menu-icon"></i><span class="nav-text">Ajouter Evenement</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="{{ request()->is('add/etudiant') ? 'active bg-gradient-primary' : '' }}" href="#">Etudiant</a></li>
                    <li><a class="{{ request()->is('add/enseignant') ? 'active bg-gradient-primary' : '' }}" href="#">Enseignant</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
