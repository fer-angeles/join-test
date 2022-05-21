@extends('app.app')
@section('content')
    <table>
        <thead>
            <tr>
                <th> Name </th>
                <th> EMail </th>
                <th>
                    &nbsp;
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach(\App\Models\User::all() as $user)
                <tr>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        <strong>
                            <a href="{{ route('user.active',['active' => $user->active == '1' ? 0 : 1 , 'user' => encrypt($user->id) ]) }}">
                                {{ $user->active == '1' ? 'Desactive' : 'Active' }}
                            </a>
                        </strong>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
