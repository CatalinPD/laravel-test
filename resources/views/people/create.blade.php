<form action="{{ route('people.insert') }}" method="post">

    @csrf

    Full name:<br>
    <input
        type="text"
        name="fullname"
        value="{{ $person->fullname }}"
    >

    <button>Submit</button>

</form>