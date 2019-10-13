<!doctype html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Vytautas Riauka CV</title>
    <meta name="description" content="Vytautas Riauka CV">
    <meta name="author" content="Vytautas Riauka">

    <link href="{{ public_path('css/app.css') }}" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <style>
        .table td {
            border-left: 0;
            border-right: 0;
        }

        .table tr:first-child td {
            border-top: 0;
        }

        .table tr:last-child td {
            border-bottom: 0;
        }

        .w-quarter {
            width: 25%;
        }

        .p-0 {
            padding: 0 !important;
        }

        .px-0 {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
    </style>
</head>

<body>
<h1 class="title is-1">Vytautas Riauka</h1>
<h3 class="subtitle is-3">{{ $role }}</h3>

<table class="table w-full" style="margin-left:auto; margin-right:auto;">
    <tr>
        <td class="header w-quarter">
            <h5 class="title is-size-5 has-text-right">Contacts</h5>
        </td>
        <td>
            <ul>
                <li>Email: <a href="mailto:elsuterino@gmail.com" class="has-text-info">elsuterino@gmail.com</a></li>
                <li>Phone: <a href="tel:+37067369516" class="has-text-info">+370 67369516</a></li>
                <li>Github: <a href="https://github.com/elsuterino" class="has-text-info">https://github.com/elsuterino</a></li>
                <li>Portfolio: <a href="https://elsuterino.com" class="has-text-info">https://elsuterino.com</a></li>
            </ul>
        </td>
    </tr>
    <tr>
        <td class="table-title header w-quarter">
            <h5 class="title is-size-5 has-text-right">About</h5>
        </td>
        <td class="table-value">
            <p>
                I am Full stack Web developer with 10+ years of experience building websites and web aplications.
                I specialize in Laravel and all technology supplementing it.
                I'm especialy interested in backend and API.
            </p>
        </td>
    </tr>
    <tr>
        <td class="table-title header w-quarter">
            <h5 class="title is-size-5 has-text-right">Languages</h5>
        </td>
        <td class="table-value">
            <div>Lithuanian - Native</div>
            <div>English - Perfect</div>
        </td>
    </tr>
    <tr>
        <td>
            <h5 class="title is-size-5 has-text-right">Skills</h5>
        </td>
        <td>
            <table class="w-full">
                @foreach($skillGroups->chunk(2) as $chunkedGroups)
                    <tr>
                        @foreach($chunkedGroups as $group)
                            <td class="px-0" style="border: none;">
                                <div class="heading">{{ $group->title }}</div>
                                <div class="content">
                                    <ul>
                                        @foreach($group->skills as $skill)
                                            @if($skill->stars > 2)
                                                <li>
                                                    {{ $skill->title }}
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
    <tr>
        <td class="table-title header">
            <h5 class="title is-size-5 has-text-right">Sideprojects</h5>
        </td>
        <td class="p-0">
            <table class="w-full">
                @foreach($projects as $project)
                    <tr>
                        <td>
                            {{ $project->title }}
                        </td>

                        <td>
                            @if($project->github)
                                <a href="{{ $project->github }}" class="has-text-info">Github</a>
                            @endif
                        </td>

                        <td>
                            @if($project->website)
                                <a href="{{ $project->website }}" class="has-text-info">Website</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>

        </td>
    </tr>
</table>
</body>
</html>
