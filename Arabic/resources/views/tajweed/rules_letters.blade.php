
<div class="container">
    <h1>Tajweed Rules Letters</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Rule Name</th>
                <th>Letter 1</th>
                <th>Letter 2</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rulesLetters as $rule)
                @foreach ($rule->letter1 as $letter1)
                    <tr>
                        <td>{{ $rule->rule_name }}</td>
                        <td>{{ $letter1->letter }}</td>
                        <td>
                            @if ($rule->letter2->isNotEmpty())
                                {{ $rule->letter2->first()->letter }}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
