@foreach($resultComment as $value)
    <li class="media">
        <a href="#" class="pull-left">
            <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
        </a>
        <div class="media-body">
                                                <span class="text-muted pull-right">
                                                    <small class="text-muted"></small>
                                                </span>
            <strong class="text-success">{{$value->fullname}}</strong>
            <p>{{$value->content}}
            </p>
        </div>
    </li><br/>
@endforeach