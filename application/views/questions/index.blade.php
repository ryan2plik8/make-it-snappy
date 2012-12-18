@layout('layouts.default')

@section('content')
<div id="ask">
	<h1>Ask a Question</h1>

	@if(Auth::check())
		@if($errors->has())
			<p>The following errors have occured</p>
			<ul id="form-errors">
				{{ $errors->first('question', '<li>:message</li>') }}
			</ul>
		@endif

		{{ Form::open('ask', 'POST') }}
		{{ Form::token() }}
		<p>
			{{ Form::label('question', 'Question') }}<br/>
			{{ Form::text('question', Input::old('question')) }}

			{{ Form::submit('Ask a Question') }}
		</p>
		{{ Form::close() }}
		@else
			<p>Please login to ask or answer questions</p>
	@endif
</div><!-- end ask -->

<div id="questions">
	<h2>Unsolved Questions</h2>
	@if(!$questions->results)
		<p>No questions</p>
	@else
		<ul>
			@foreach($questions->results as $question)
				<li>{{ e(Str::limit($question->question, 35)) }} by {{ $question->user->username }}</li>
			@endforeach
		<ul>
		{{ $questions->links() }}
	@endif	
</div>
@endsection
