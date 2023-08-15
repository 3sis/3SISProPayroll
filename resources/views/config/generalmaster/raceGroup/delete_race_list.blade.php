<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">RaceGroup Name</th>
            <th scope="col">User</th>
            <th class="text-center" scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($delete_list as $row)
        <tr>
            <td>
                {{$row->GMRAHRaceId}}
            </td>
            <td>
                {{$row->GMRAHDesc1}}
            </td>

            <td>
                <span class="text-success"> {{$row->GMRAHUser}}</span>
            </td>
            <td class="text-center">
                <div class="action-btns">
                    <a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip restore" id="{{$row->id}}" data-toggle="tooltip" data-placement="top" title="Restore">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-rotate-ccw">
                    <polyline points="1 4 1 10 7 10"></polyline>
                    <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path>
                </svg>
                    </a>
                </div>
            </td>
        </tr>
@endforeach
    </tbody>
</table>
