<div class="sidebar" data-color="orange" data-image="">
<!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
    Tip 2: you can also add an image using data-image tag
-->
    <style>
        .sidebar-wrapper .logo {
            padding: 0px;
        }
    </style>
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('employees.index') }}" class="simple-text">
                <img src="{{asset('img/logo.png')}}" height=50px">
            </a>
        </div>
        <ul class="nav">
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="bi bi-search"></i>
                    <p>ダッシュボード</p>
                </a>
            </li> --}}

            <li>
                <a class="nav-link" href="{{ route('employees.index')}}">
                <i class="bi bi-people"></i>
                    <p>エンジニア検索</p>
                </a>
            </li>

            <li>
                <a class="nav-link" href="{{ route('matters.index')}}">
                <i class="bi bi-book"></i>
                    <p>案件一覧</p>
                </a>
            </li>

            <li>
                <a class="nav-link" href="{{ route('matters.calendar')}}">
                    <i class="bi bi-calendar"></i>
                    <p>案件カレンダー</p>
                </a>
            </li>

            <li>
                <a class="nav-link" href="{{ route('matters.create')}}">
                    <i class="bi bi-card-checklist"></i>
                    <p>案件入力</p>
                </a>
            </li>

            <li>
                <a class="nav-link" href="{{ route('employees.show', ['id' => Auth::id()])}}">
                <i class="bi bi-code-slash"></i>
                    <p>MYスキル</p>
                </a>
            </li>

            <li>
                <a class="nav-link" data-toggle="modal" data-target="#myMatterModal" href="#modal">
                    <i class="bi bi-speedometer"></i>
                    <p>進行中案件</p>
                </a>
            </li>
        </ul>
    </div>
</div>

