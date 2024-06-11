<div class="container">
    <div class="row">
        <div class="col-md-auto XXXoffset-md-2">
            <h2>メンバー登録</h2>
        </div>
    </div>

    @include('book/message')

    <div class="row">
        <div class="col-md-8 XXXoffset-md-2">
            @if($target == 'create')
            <form action="/member" method="post">
            @elseif($target == 'edit')
            <form action="/member/{{ $member->id }}" method="post">
                <input type="hidden" name="_method" value="PUT">
            @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="mb-2">
                    <label class="form-label" for="name">名前</label>
                    <input text="text" class="form-control" id="name" name="name" value="{{ old('name', $member->name) }}">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="age">年齢</label>
                    <input text="text" class="form-control" id="age" name="age" value="{{ old('age', $member->age) }}">
                </div>
                <div class="mb-2">
                    <label class="form-label" for="zipcode">〒</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{ old('zipcode', $member->zipcode) }}">
                        <button type="button" class="btn btn-outline-secondary">住所検索</button>
                    </div>
                </div>
                <div class="mb-2">
                    <label class="form-label" for="address">住所</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $member->address) }}">
                </div>
                <button type="submit" class="btn btn-primary">登録</button>
                <a href="/member">戻る</a>
            </form>
        </div>
    </div>
</div>
