@extends('book/layouts/origin')

@section('main')
<div class="container ops-main">
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">メンバー一覧</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-11 col-md-offset-1">
    <table class="table text-center">
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">名前</th>
        <th class="text-center">年齢</th>
        <th class="text-center">〒</th>
        <th class="text-center">住所</th>
        <th class="text-center">削除</th>
      </tr>
      @foreach($members as $member)
      <tr>
        <td>
          <a href="/member/{{ $member->id }}/edit">{{ $member->id }}</a>
        </td>
        <td>{{ $member->name }}</td>
        <td>{{ $member->age }}</td>
        <td>{{ $member->zipcode }}</td>
        <td>{{ $member->address }}</td>
        <td>
          <form action="/member/{{ $member->id }}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
    <div><a href="/member/create" class="btn btn-default">新規作成</a></div>
  </div>
</div>
@endsection
