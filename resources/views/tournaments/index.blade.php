<x-layout>

    <div class="container my-5">
        <h1 class="text-center mb-4">Tournaments</h1>
        @if($tournaments->isEmpty())
            <p class="text-center">No tournaments available at the moment.</p>
        @else
            <div class="row">
                @foreach ($tournaments as $tournament)
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm" style="background-color: white;"> <!-- Changed background to white -->
                            <div class="card-body" style="background: rgba(255, 255, 255, 0.7);"> <!-- Add opacity to background for better text readability -->
                                <h5 class="card-title">{{ $tournament->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Starting on {{ \Carbon\Carbon::parse($tournament->start_date)->format('M. j, Y') }}</h6>
                                <p class="card-text">
                                    <strong>Team Size:</strong> {{ $tournament->team_size }} players
                                </p>
                                <p class="card-text">
                                        <?php $startTime = \Carbon\Carbon::createFromFormat('H:i', $tournament->start_time)->format('g:i A'); ?>
                                    <strong>Time:</strong> {{ $startTime }}
                                </p>
                                <p class="card-text">
                                    <strong>Description:</strong><br>{{ $tournament->description }}
                                </p>
                                <p class="card-text">
                                    <strong>Rules:</strong><br>{{ $tournament->rules }}
                                </p>
                                <p class="card-text">
                                    <strong>Style:</strong> {{ $tournament->style }}
                                </p>
                                <p class="card-text">
                                    <strong>Type:</strong> {{ $tournament->type }}
                                </p>
                                <p class="card-text">
                                    <strong>Platforms:</strong> {{ implode(', ', json_decode($tournament->platforms, true)) }}
                                </p>
                                <p class="card-text">
                                    <strong>Minimum Players:</strong> {{ $tournament->min_players }}
                                </p>
                                <p class="card-text">
                                    <strong>Maximum Players:</strong> {{ $tournament->max_players }}
                                </p>
                                <p class="card-text">
                                    <strong>Timezone:</strong> {{ $tournament->timezone }}
                                </p>
                                <p class="card-text">
                                    <strong>Prize:</strong> {{ $tournament->prize }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</x-layout>
