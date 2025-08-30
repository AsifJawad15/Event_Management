<h2>Admin Reset Password</h2>

@if($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}<br>
    @endforeach
@endif

@if(session('success'))
    {{ session('success') }}
@endif

@if(session('error'))
    {{ session('error') }}
@endif

<form action="{{ route('admin_reset_password_submit',[$token,$email]) }}" method="post">
    @csrf
    <table>
        <tr>
            <td>Password: </td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>Confirm Password: </td>
            <td><input type="password" name="confirm_password"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit">Submit</button>
            </td>
        </tr>
    </table>
</form>
