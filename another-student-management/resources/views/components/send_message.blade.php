<div>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
    <div class="mt-6 p-4 bg-white rounded shadow">
        <h3 class="text-lg font-semibold mb-2">Send a message to {{ $recipient->username }}</h3>

        @if(session('message_sent'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-2">
                {{ session('message_sent') }}
            </div>
        @endif

        <form action="{{ route('messages.send', $recipient->uuid) }}" method="POST">
            @csrf
            <textarea name="message" class="w-full border rounded p-2 mb-2" rows="4" placeholder="Write your message here..." required></textarea>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-black px-4 py-2 rounded">Send</button>
        </form>
    </div>
</div>