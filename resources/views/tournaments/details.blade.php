<x-layout>

    <div class="tournament-details bg-black text-white p-5">
        <style>
            .timer-background {
                background: url('{{ asset('images/tour-details-banner.png') }}') no-repeat center center;
                background-size: cover;
                padding: 40px; /* Adjust padding as needed */
                border-radius: 15px;
                box-shadow: inset 0 0 30px rgba(0, 0, 0, 0.5);
                position: relative;
                margin: 0 auto; /* Center the timer background */
                max-width: 1100px; /* Set a max-width for better centering */
            }
            .overlay-image {
                position: absolute;
                left: 0px; /* Adjust placement as needed */
                top: 0px; /* Adjust vertically */
                z-index: 3; /* Ensure it's overlaid correctly */
                border-radius: 10px;
                width: 570px; /* Control size */
            }
            .custom-button {
                background-color: #FA461B;
                border-color: #FA461B; /* Optional: to change the border color as well */
                color: #ffffff;
                font-weight: bold;
                margin-right: 1.25rem;
            }
            .info-box-container {
                background: #0D0F12 no-repeat center center; /* Optional background image */
                background-size: cover;
                padding: 20px;
                border-radius: 15px;
                box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.3);
                margin: 20px auto; /* Adjust margin as needed */
                max-width: 1100px; /* Set a max-width for better centering */
            }
            .icon-custom-color {
                color: #ff7400;
            }
        </style>

        <div class="timer-background position-relative" style="font-family: tektur, sans-serif;">
            <!-- Overlay Image -->
            <img src="{{ asset('images/game-overlay.png') }}" alt="Tournament Image" class="overlay-image">

            <!-- Tournament Details -->
            <div class="text-left">
                <h1 class="text-3xl font-bold" style="margin-left: 39rem;">{{$tournament->name}}</h1>
                <div class="mb-3" style="margin-left: 39rem">
                    <p>Tournament starting in</p>
                </div>

                <!-- Timer -->
                <div class="flex justify-end items-center mr-20">
                    @foreach(['Days', 'Hours', 'Minutes', 'Seconds'] as $unit)
                        <div class="flex flex-col items-center mx-2 text-center">
                            <!-- Hexagon -->
                            <div class="hexagon relative w-16 h-16 flex items-center justify-center">
                                <div class="hex-content absolute top-0 left-0 w-full h-full flex items-center justify-center">
                                    <h2 class="text-orange text-2xl font-bold">{{ rand(0, 99) }}</h2> <!-- Replace with dynamic timer -->
                                </div>
                            </div>
                            <!-- Unit Label -->
                            <p class="text-sm mt-2">{{ $unit }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="flex items-center justify-end mt-6 mr-14"> <!-- Flex container -->
                    <button class="btn btn-warning custom-button">Register</button>
                    <div class="flex flex-col mr-2" style="color: #e0e0e0"> <!-- Optional margin for spacing -->
                        <div class="flex items-center">
                            <i class="fas fa-calendar-alt mr-2"></i>{{ \Carbon\Carbon::parse($tournament->start_date)->format('M. j, Y') }} <!-- Margin-right for spacing -->
                            &nbsp
                            <i class="fas fa-clock mr-2"></i>{{ \Carbon\Carbon::createFromFormat('H:i', $tournament->start_time)->format('g:i A') }}
                        </div>
                        <div class="flex items-center mt-2">
                            <i class="fas fa-users mr-2"></i>
                            115/115 Players
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Section: Info Boxes -->

        <div class="info-box-container mt-5 text-center">
            <div class="row">
                <div class="col">
                    @if($tournament->type === 'irl')
                        <i class="fa-solid fa-building fa-2x icon-custom-color"></i>
                        <p class="mt-2 text-lg"><strong>Location</strong><br>Draper, Utah</p>
                    @elseif($tournament->type === 'virtual')
                        <i class="fa-solid fa-house-laptop fa-2x icon-custom-color"></i>
                        <p class="mt-2 text-lg"><strong>Location</strong><br>Virtual</p>
                    @else
                        <i class="fa-solid fa-house-laptop fa-2x icon-custom-color"></i>
                        <p class="mt-2 text-lg"><strong>Location</strong><br>Virtual</p>
                    @endif
                </div>
                <div class="col">
                    <i class="fas fa-sitemap fa-2x icon-custom-color"></i>
                    <p class="mt-2 text-lg"><strong>Format</strong><br>{{$tournament->style}}</p>
                </div>
                <div class="col">
                    <i class="fas fa-user fa-2x icon-custom-color"></i>
                    <p class="mt-2 text-lg"><strong>Mode</strong><br>{{$tournament->team_size}}</p>
                </div>
                <div class="col">
                    <i class="fa-solid fa-minimize fa-2x icon-custom-color"></i>
                    <p class="mt-2 text-lg"><strong>Min. Players</strong><br>{{$tournament->min_players}}</p>
                </div>
                <div class="col">
                    <i class="fa-solid fa-money-check-dollar fa-2x icon-custom-color"></i>
                    <p class="mt-2 text-lg"><strong>Entry Fee</strong><br>$65.00</p>
                </div>
                <div class="col">
                    <i class="fas fa-trophy fa-2x icon-custom-color"></i>
                    <p class="mt-2 text-lg"><strong>Prize Pool</strong><br>--</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const startDate = "{{ $tournament->start_date }}";
            const startTime = "{{ $tournament->start_time }}";

            // Debug: Log the received start date and time
            console.log('Start Date:', startDate);
            console.log('Start Time:', startTime);

            // Combine the date and time into a single string
            const startDateTimeString = `${startDate}T${startTime}:00`;

            // Debug: Log the combined string
            console.log('Combined DateTime String:', startDateTimeString);

            const targetDate = new Date(startDateTimeString).getTime();

            // Debug: Check if the targetDate is a valid number
            if (isNaN(targetDate)) {
                console.error('Invalid Date, please check the date format');
                return;
            }

            const countdown = setInterval(() => {
                const now = new Date().getTime();
                const distance = targetDate - now;

                // Debug: Log the current countdown distance
                console.log('Countdown distance:', distance);

                if (distance < 0) {
                    clearInterval(countdown);
                    document.querySelectorAll('.hex-content h2').forEach(el => el.textContent = "0");
                    return;
                }

                // Calculate days, hours, minutes, and seconds
                document.querySelectorAll('.hex-content h2')[0].textContent = Math.floor(distance / (1000 * 60 * 60 * 24));
                document.querySelectorAll('.hex-content h2')[1].textContent = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                document.querySelectorAll('.hex-content h2')[2].textContent = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                document.querySelectorAll('.hex-content h2')[3].textContent = Math.floor((distance % (1000 * 60)) / 1000);
            }, 1000);
        });
    </script>

</x-layout>
