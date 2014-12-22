<p>KSIAZKA</p>

<p>ISBN: {{ $book->bok_isbn }}</p>
<p>Tytul: {{ $book->bok_title }}</p>
<p>Autor: <a href="/author/{{ $book->bok_atr_id }} "> {{ $book->atr_name }}</a></p>
<p>Jezyk: <a href="/language/{{ $book->bok_lng_id }} "> {{ $book->lng_name }}</a></p>
<p>Rodzaj: <a href="/kind/{{ $book->bok_knd_id }} "> {{ $book->knd_name }}</a></p>

<button type="submit" >Reserve</button>
