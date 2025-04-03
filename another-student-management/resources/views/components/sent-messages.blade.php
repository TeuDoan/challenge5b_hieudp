<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->

<p><strong>Messages Sent:</strong></p>
<table class="w-full border border-gray-300 text-left">
    <thead class="bg-gray-100 dark:bg-gray-700">
        <tr>
            <th class="px-4 py-2">#</th>
            <th class="px-4 py-2">Message</th>
            <th class="px-4 py-2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($messages as $message)
        <tr>
            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
            <td class="border px-4 py-2">{{ $message->message }}</td>
            <td class="border px-4 py-2">Dummy For Now</td>                        
        </tr>
        @endforeach
    </tbody>
</table>
</div>