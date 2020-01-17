@extends('layouts.outMain')

@section('content')

    <section class="wrapper site-min-height">
    <h3><i class="fa fa-hospital-o"></i><b> Klinik Kesihatan Kamunting</b></h3>
    <hr>
    <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
            <h4 class="mb"> Get Queue Number</h4>
              <form class="form-horizontal  style-form" method="post" action="{{ route('queue.store') }}">
                @csrf
                
                <div class="form-group">
                  <label class="control-label col-md-3"> Choose Type for Queue</label>
                  <div class="col-md-7">
                    <select class="form-control" name="qType" data-placeholder="Choose Type for Queue">
                                    <option></option>
                                    
                                    <option>Consultation</option>
                                    <option>Dentistry</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-5 col-lg-10">
                      <button class="btn btn-theme" onclick="submit()">Submit</button>
                    </div>
                </div>

              </form>
            </div>
          </div>
        </div>

@endsection

@section('print')
    @if(session()->has('queue_qType'))
        <style>#printarea{display:none;text-align:center}@media print{#sidebar,header,#main-content,footer,#toast-container{display:none}#printarea{display:block;}}@page{margin:0}</style>
        <div id="printarea" style="line-height:2.25">
            <span style="font-size:27px; font-weight: bold">Klinik Kesihatan Kamunting</span><br>
            <span style="font-size:25px">{{ session()->get('queue_qType') }}</span><br>
            <span style="font-size:20px">Your Number</span><br>
            <span><h3 style="font-size:70px;font-weight:bold;margin:0;line-height:1.5">{{ session()->get('queueId') }}</h3></span>
            <span style="font-size:20px">Please wait for your turn</span><br>
        </div>
        <script>
            window.onload = function(){window.print();}
        </script>
    @endif
@endsection

@section('script')
    <script type="text/javascript">
        $(function() {
            $('#main-content').css({'min-height': $(window).height()-134+'px'});
        });
        $(window).resize(function() {
            $('#main-content').css({'min-height': $(window).height()-134+'px'});
        });
        function submit(value) {
            $('body').removeClass('loaded');
            var myForm2 = '<form id="hidfrm2" action="{{ route('queue.store') }}" method="post">{{ csrf_field() }}<input type="hidden" name="qType" value="'+value+'"></form>';
            $('body').append(myForm2);
            myForm2 = $('#hidfrm2');
            myForm2.submit();
        }
    </script>
@endsection
