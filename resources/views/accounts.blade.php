@extends('layouts.app')
@php($isCustomer = $kind === 'customers')
@section('title', $isCustomer ? 'Customer accounts' : 'Staff accounts')
@section('content')
<div class="page-heading"><div><p class="eyebrow">{{ $isCustomer ? 'THE FAMILIAR FACES' : 'BEHIND THE COUNTER' }}</p><h1>{{ $isCustomer ? 'Every regular has a story.' : 'Good people. Great coffee.' }}</h1><p>{{ $isCustomer ? 'A little closer to the people who make your café feel like home.' : 'Meet the crew who brings a little warmth to every shift.' }}</p></div><span class="count-pill">{{ count($records) }} {{ $isCustomer ? 'customers' : 'team members' }}</span></div>
<section class="table-panel"><div class="table-toolbar"><div><h2>{{ $isCustomer ? 'Customer accounts' : 'User accounts' }}</h2><p>{{ $isCustomer ? 'Contact details for your café community.' : 'Staff usernames, names, and café roles.' }}</p></div><label class="search"><span aria-hidden="true">⌕</span><input id="account-search" type="search" placeholder="{{ $isCustomer ? 'Search customers…' : 'Search staff…' }}" aria-label="{{ $isCustomer ? 'Search customers' : 'Search staff' }}"></label></div>
<div class="table-scroll"><table><thead><tr><th scope="col">{{ $isCustomer ? 'CUSTOMER NAME' : 'FULL NAME' }}</th><th scope="col">{{ $isCustomer ? 'EMAIL ADDRESS' : 'USERNAME' }}</th><th scope="col">{{ $isCustomer ? 'PHONE NUMBER' : 'ROLE' }}</th></tr></thead><tbody id="account-rows">
@foreach($records as $record)
<tr><td><div class="person"><span class="avatar tone-{{ $loop->index % 3 }}">{{ collect(explode(' ', $record['full_name']))->map(fn($part) => mb_substr($part, 0, 1))->take(2)->join('') }}</span><strong>{{ $record['full_name'] }}</strong></div></td><td>{{ $isCustomer ? $record['email'] : '@'.$record['username'] }}</td><td>@if($isCustomer){{ $record['phone'] }}@else<span class="role-badge">{{ $record['role'] }}</span>@endif</td></tr>
@endforeach
</tbody></table></div><p id="no-accounts" class="empty-search" hidden>No matching accounts. Try another name.</p><div class="table-foot"><span id="account-count">Showing {{ count($records) }} of {{ count($records) }} accounts</span><span>Ember Café community</span></div></section>
<div class="bottom-note"><span>✳</span><div><b>{{ $isCustomer ? 'A warm welcome starts with a name.' : 'Every role makes a difference.' }}</b><p>{{ $isCustomer ? 'These sample accounts are ready for your classroom demonstration.' : 'Sample staff records for your café workspace.' }}</p></div><a href="{{ route('pos') }}">Back to the counter ↗</a></div>
@endsection
