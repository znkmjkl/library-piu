<div class="col-md-12">
    <table class="table">
        <thead>
            <tr>
                <th>Tytuł</th>
                <th>Autor</th>
                <th>ISBN</th>
                <th>Data i nr wydania</th>
                <th>Gatunek</th>
                <th>Język</th>
                <th>Dostępność</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($search_results as $result)
            <tr>
                <td><a href="/book/{{ $result->bok_id }}"><abbr title='"O psie który jeździł koleją" - zobacz stronę książki'>{{ $result->bok_title }}</a></td>
                <td><a href="/author/{{ $result->wtr_id }} "> {{ $result->wtr_name }} {{ $result->wtr_surname }}</a></td>
                <td>{{ $result->bok_isbn }}</td>
                <td>{{ date('Y', strtotime($result->bok_edition_date)) }} / {{ $result->bok_edition_number }}</td>
                <td><a href="/kind/{{ $result->bok_knd_id }} "> {{ $result->knd_name }}</a></td>
                <td><a href="/language/{{ $result->bok_lng_id }} "> {{ $result->lng_name }}</a></td>
                <td> <span class="label label-danger">NIE</span> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>