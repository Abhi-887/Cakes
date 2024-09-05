@extends('admin.layouts.master')

@section('content')

{{-- <form action="{{ route('admin.coupon.redemptionReport') }}" method="GET">
    <input type="text" name="coupon_code" placeholder="Coupon Code">
    <input type="date" name="date_from">
    <input type="date" name="date_to">
    <button type="submit">Filter</button>
</form> --}}

<table>
    <thead>
        <tr>
            <th>User</th>
            <th>Coupon Code</th>
            <th>Order ID</th>
            <th>Used At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usageLogs as $log)
        <tr>
            <td>{{ $log->user->name }}</td>
            <td>{{ $log->coupon->code }}</td>
            <td>{{ $log->order_id }}</td>
            <td>{{ $log->used_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
