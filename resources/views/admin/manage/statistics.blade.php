@extends('layout.admin')
@section('content-admin')
    <?php
    $user = Auth::user();
    ?>

    <div id="body-admin">
        <div>
            <div style="padding-top:15px">
                <h1 style="color: #103D8F; text-align: center">
                    Sapo Technology
                </h1>
            </div>

            <div style="height:25px"></div>
        </div>

    </div>
@endsection

