@foreach($tin as $value)
{{$value->TieuDe}}<br>
{{$value->TomTat}}<br>
@endforeach

{{$tin->links()}}