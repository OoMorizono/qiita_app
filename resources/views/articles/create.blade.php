@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            @if (!empty($errors))
            <div class="error">
                @foreach($errors->all() as $error)
                {{ $error }}
                @endforeach
            </div>
            @endif
            {{-- フォームの送信先はcreateアクション --}}
            <form action="{{ route('articles.store') }}" method="post">
                @csrf
                <div class="from-group">
                {{-- セレクトボックスで非公開を選択済み 開発時は公開を選択できないようにdisabledをつける --}}
                <select name="private" id="private">
                    <option value="true" selected>非公開</option>
                    <option value="false" disabled>公開</option>
                </select>
                </div>
                {{-- 各要素をブロック要素にする為、divタグで囲む --}}
                <div class="form-group">
                    <input type="text" name="title" id="title" placeholder="タイトル" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="tags" id="tags" placeholder="知識に関連するタグをスペース区切りで5つまで入力 (例: Ruby Rails)"
                        required class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="body" id="body" cols="30" rows="10" placeholder="エンジニアに関わる知識をMarkdown記法で書いて共有しよう"
                        required class="form-control"></textarea>
                </div>
                <input type="submit" value="投稿する"  class=" btn btn-outline-primary">
            </form>
            <button type="button" onclick="location.href='{{ route('articles.index') }}'" class=" btn btn-outline-primary">一覧へ戻る</button>
        </div>
    </div>
</div>
@endsection