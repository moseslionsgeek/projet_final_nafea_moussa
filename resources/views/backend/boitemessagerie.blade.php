<x-app-layout>



    <table class="table tbl">
        <thead>

            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">subject</th>
                <th scope="col">message</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $key => $contact)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $contact->name }}</td>
                    <td> {{ $contact->email }}</td>
                    <td> {{ $contact->subject }}</td>
                    <td> <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#message{{ $contact->id }}">
                            read message
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="message{{ $contact->id }}" tabindex="-1"
                            aria-labelledby="message{{ $contact->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="message{{ $contact->id }}Label">message</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{ $contact->message }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</x-app-layout>
