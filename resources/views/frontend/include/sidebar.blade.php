<div class="col-lg-3">
    <div class="hero__categories">
        <div class="hero__categories__all">
            <i class="fa fa-bars"></i>
            <span>All departments</span>
        </div>
        <ul>
            @foreach ($categories as $category)
            <li><a href="#">{{$category->category_name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
