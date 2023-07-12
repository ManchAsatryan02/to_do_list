@if(isset($accesses) && count($accesses) > 0)
    <table class="table caption-top">
        <thead>
            <tr>
                <th scope="col">Email</th>
                <th scope="col">List Name</th>
                <th scope="col">Permission</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accesses as $access)
                <tr class="parent-row">
                    <td>{{ $access->owner->email }}</td>
                    <td><a class="viewRoles" href="#" data-id="{{ $access->list_id }}">{{ $access->list->name }}</a></td>
                    {{-- owner --}}
                    @if($access->role == 1) 
                    <td>Owner</td>
                    {{-- viewer --}}
                    @elseif($access->role == 2)
                        <td>Viewer</td>
                    {{-- editor --}}
                    @elseif($access->role == 3)
                        <td>Editor</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <h6>Not Yet</h6>
@endif