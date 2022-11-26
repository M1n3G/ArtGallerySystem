@extends('master')
@section('title', '| Create Post')
@section('content')

<head>
    <style>
        body {
            font-family: 'Poppins', serif;
        }
    </style>
</head>

<div class="container mt-4">
    <!-- BREADCUMB -->
    <div class="row mt-4 breadcumb-top">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('category.view') }}" class="text-decoration-none">Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page">Content Policy</li>
            </ol>
        </nav>
    </div>

    <h3 style="font-family: 'Poppins', serif;">ArtCells Forum Content Policy</h3>
    <ul class="list-group list-group-flush" style="margin-bottom: 100px;">
        <li class="list-group-item">
            <div class="fs-5" style="margin-top:15px;">
                Rule 1</div><br />
            Remember the human. ArtCells is a place for creating community and belonging, not for attacking marginalized or vulnerable groups of people. Everyone has a right to use ArtCells free of harassment, bullying, and threats of violence. Communities and users that incite violence or that promote hate based on identity or vulnerability will be banned.
        </li>

        <li class="list-group-item">
            <div class="fs-5" style="margin-top:15px;">
                Rule 2</div><br />
            Abide by community rules. Post authentic content into communities where you have a personal interest, and do not cheat or engage in content manipulation (including spamming, vote manipulation, ban evasion, or subscriber fraud) or otherwise interfere with or disrupt ArtCells communities.
        </li>

        <li class="list-group-item">
            <div class="fs-5" style="margin-top:15px;">
                Rule 3</div><br />
            Respect the privacy of others. Instigating harassment, for example by revealing someone’s personal or confidential information, is not allowed. Never post or threaten to post intimate or sexually-explicit media of someone without their consent.
        </li>

        <li class="list-group-item">
            <div class="fs-5" style="margin-top:15px;">
                Rule 4</div><br />
            Do not post or encourage the posting of sexual or suggestive content involving minors.
        </li>

        <li class="list-group-item">
            <div class="fs-5" style="margin-top:15px;">
                Rule 5</div><br />
            Keep it legal, and avoid posting illegal content or soliciting or facilitating illegal or prohibited transactions.
        </li>

        <li class="list-group-item">
            <div class="fs-5" style="margin-top:15px;">
                Rule 6</div><br />
            Don’t break the site or do anything that interferes with normal use of ArtCells.
        </li>
    </ul>
</div>
@endsection