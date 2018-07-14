@if(count('acTypes')>0)
    <ul class="list-group">
    @foreach($acTypes as $type)
            <li class="list-group-item">{{$type->type}}</li>
    @endforeach
    </ul>
@endif