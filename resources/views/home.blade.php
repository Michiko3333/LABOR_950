<x-layout title="ホーム">
    <h1>ホーム</h1>
    <a href="{{ $url }}" target="_blank" rel="noopener noreferrer">{{ $url }}</a>
    <script type="module">
        $('h1').text('ホーム / jQuery正常動作確認');
    </script>
</x-layout>
