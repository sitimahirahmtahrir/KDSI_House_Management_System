<x-app-layout>
    <div class="container">
        <h1>Pulapol Dashboard</h1>

        <!-- Guest Verification -->
        <section>
            <h2>Guest Verification</h2>
            @if (session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif

            <ul>
                @foreach ($guestVisits as $visit)
                    <li>
                        <strong>Guest Name:</strong> {{ $visit->guest->name }}<br>
                        <strong>House ID:</strong> {{ $visit->house_id }}<br>
                        <strong>Check-in Time:</strong> {{ $visit->check_in_time }}<br>
                        <form action="/pulapol/guest/verify/{{ $visit->id }}" method="POST">
                            @csrf
                            <label for="verification_status">Verification Status:</label>
                            <select name="verification_status" required>
                                <option value="verified">Verified</option>
                                <option value="not_verified">Not Verified</option>
                            </select>
                            <button type="submit">Update Status</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
</x-app-layout>
