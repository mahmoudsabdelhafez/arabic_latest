<!-- resources/views/tajweed/rules_diacritics.blade.php -->

<div class="container">
    <h1>Tajweed Rules Diacritics</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Rule Name</th>
                <th>letter</th>
                <th>Diacritic</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rulesDiacritics as $rule)
                @foreach ($rule->diacritics as $diacritic)
                    <tr>
                        <td>{{ $rule->rule_name }}</td>
                        <td>{{ $rule->letter1[0]->letter}}</td>
                        <td>{{ $diacritic->diacritic }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
