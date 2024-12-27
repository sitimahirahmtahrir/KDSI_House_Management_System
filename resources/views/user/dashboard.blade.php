<x-app-layout>
    <div class="container">
        <h1>User Dashboard</h1>

        <!-- Maintenance Management -->
        <section>
            <h2>Maintenance Requests</h2>
            <form action="/user/maintenance" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="house_id" value="{{ auth()->user()->house_id }}">
                <textarea name="description" placeholder="Describe the issue" required></textarea>
                <input type="file" name="image">
                <button type="submit">Submit Request</button>
            </form>
            <ul>
                @foreach ($maintenanceRequests as $request)
                    <li>{{ $request->description }} - {{ $request->status }}</li>
                @endforeach
            </ul>
        </section>

        <!-- Guest Management -->
        <section>
            <h2>Guest Management</h2>
            <form action="/user/guest" method="POST">
                @csrf
                <input type="text" name="guest_name" placeholder="Guest Name" required>
                <input type="datetime-local" name="check_in_time" required>
                <button type="submit">Submit Guest Entry</button>
            </form>
            <ul>
                @foreach ($guestRequests as $request)
                    <li>{{ $request->guest_name }} - {{ $request->verification_status }}</li>
                @endforeach
            </ul>
        </section>

        <!-- Announcements -->
        <section>
            <h2>Announcements</h2>
            <ul>
                @foreach ($announcements as $announcement)
                    <li>{{ $announcement->content }}</li>
                @endforeach
            </ul>
        </section>

        <!-- House Management -->
        <section>
            <h2>House Status</h2>
            <p>Status: {{ $houseStatus }}</p>
        </section>
    </div>
</x-app-layout>
