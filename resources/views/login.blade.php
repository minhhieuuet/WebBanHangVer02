<form action="{{route('postLogin')}}" method="POST">
	<input type="email" name="email">
	<input type="password" name="password">
	<input type="submit">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
</form>