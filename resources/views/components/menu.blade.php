<nav class="nav flex-column" style="padding-left:15px">
    @foreach($list as $row)
    <a class="nav-link {{ $isActive($row['label']) ? 'active' : '' }}" href="#"> {{ $row['label']}}</a>
    @endforeach
</nav>