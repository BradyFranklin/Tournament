<x-layout>

    <h1>Create Tournament</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tournaments.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Tournament Name:</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="description">Tournament Description:</label>
            <input type="text" id="description" name="description">
        </div>
        <div>
            <label for="rules">Tournament Rules:</label>
            <input type="text" id="rules" name="rules">
        </div>
        <select name="style" required>
            <option value="">Select Style</option>
            @foreach($styles as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <select name="type" required>
            <option value="">Select Type</option>
            @foreach($types as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <select name="platforms[]" multiple required>
            @foreach($platforms as $key => $value)
                <option value="{{ $key }}" {{ (collect(old('platforms'))->contains($key)) ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
        <div>
            <label for="team_size">Team Size:</label>
            <input type="number" id="team_size" name="team_size">
        </div>
        <div>
            <label for="min_players">Minimum Players:</label>
            <input type="number" id="min_players" name="min_players">
        </div>
        <div>
            <label for="max_players">Maximum Players:</label>
            <input type="number" id="max_players" name="max_players">
        </div>
        <div>
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date">
        </div>
        <div>
            <label for="start_time">Start Time:</label>
            <input type="time" id="start_time" name="start_time">
        </div>
        <div>
            <label for="timezone">Timezone:</label>
            <input type="text" id="timezone" name="timezone">
        </div>
        <div>
            <label for="prize">Prize:</label>
            <input type="text" id="prize" name="prize">
        </div>
        <button type="submit">Create</button>
    </form>

</x-layout>
