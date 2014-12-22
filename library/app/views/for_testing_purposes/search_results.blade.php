@foreach ($search_results as $result)
    <p>BOOK</p>
    <p>{{ $result->bok_isbn }}</p>
    <p>{{ $result->bok_title }}</p>
    <p><a href="/author/{{ $result->bok_atr_id }} "> {{ $result->bok_atr_id }}</a></p>
    <p><a href="/language/{{ $result->bok_lng_id }} "> {{ $result->bok_lng_id }}</a></p>
    <p><a href="/kind/{{ $result->bok_knd_id }} "> {{ $result->bok_knd_id }}</a></p>
    <hr>
@endforeach