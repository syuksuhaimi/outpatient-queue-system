@extends('layouts.outMain')

@section('style')
<style>
    table {
    border-collapse: collapse;
    }

    tr:nth-child(n + 5) {
      visibility: hidden;
    }
</style>
@endsection

@section('content')

<section class="wrapper">
        <h3><b>Klinik Kesihatan Kamunting</b></h3>
        <hr>
          <div class="row mb">
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" class="display table table-bordered" id="hidden-table-info" style="width:700px">
                <thead>
                  <tr>
                    <th class="centered hidden-phone">Queue Number</th>
                    <th class="centered hidden-phone">Please Proceed to Room</th>
                  </tr>
                </thead>
                @foreach( $calls as $call)
                <tbody>
                    <tr>
                        <td class="centered hidden-phone">{{ $call->queueId }}</td>
                        <td class="centered hidden-phone">{{ $call->room }}</td>
                    </tr>
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
          </div>

@endsection