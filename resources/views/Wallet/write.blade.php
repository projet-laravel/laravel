@extends('layouts.portefeuille')

@section('content')
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Add</h4>
                <form
                        class="form-horizontal tasi-form"
                        method="POST"
                        @if(!isset($messages["data"][0]))
                            action="/wallet/add"
                        @else
                            action="/wallet/update/{{$messages["data"][0]->id}}"
                        @endif
                >
                    @csrf
                    <div class="form-group has-error">
                        <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Type</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="type" required>
                                @foreach($messages['types'] as $message)
                                    <option @if(isset($messages["data"][0]) &&$message->id == $messages["data"][0]->id_type)
                                            selected="selected"
                                            @endif
                                            value="{{ $message->id }}">
                                        {{  $message->name  }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <label class="col-sm-2 control-label col-lg-2" for="inputWarning">Method</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="method" required>
                                @foreach($messages['methods'] as $message)
                                    <option @if(isset($messages["data"][0]) &&$message->id == $messages["data"][0]->id_type)
                                            selected="selected"
                                            @endif
                                            value="{{ $message->id }}">
                                        {{  $message->name  }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <label class="col-sm-2 control-label col-lg-2" for="inputError">Amount</label>
                        <div class="col-lg-10">
                            <input type="number" step='0.01' class="form-control" id="inputError" name="amount" required
                            @if (isset($messages['data'][0]))
                                value="{{$messages['data'][0]->amount}}"
                            @endif
                            >
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <label class="col-sm-2 control-label col-lg-2" for="inputError">Description</label>
                        <div class="col-lg-10">
                            <input type="text" step='0.01' class="form-control" id="inputError" name="description" placeholder="option"
                                   @if (isset($messages['data'][0]))
                                   value="{{$messages['data'][0]->description}}"
                                    @endif
                            >
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <label class="col-sm-2 control-label col-lg-2" for="inputError">Place</label>
                        <div class="col-lg-10">
                            <input type="text" step='0.01' class="form-control" id="inputError" name="place" placeholder="option"
                                   @if (isset($messages['data'][0]))
                                   value="{{$messages['data'][0]->place}}"
                                    @endif
                            >
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <label class="col-sm-2 control-label col-lg-2" for="inputError">Date</label>
                        <div class="col-lg-10">
                            <input type="date" class="form-control" id="inputError" name="date" required
                                   @if (isset($messages['data'][0]))
                                   value="<? echo $messages['data'][0]->day ?>"
                                    @endif
                            >
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-warning">Add</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /form-panel -->
        </div>
        <!-- /col-lg-12 -->
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
    <script src="lib/jquery.scrollTo.min.js"></script>
    <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
    <!--common script for all pages-->
    <script src="lib/common-scripts.js"></script>
    <!--script for this page-->
    <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
    <!--custom switch-->
    <script src="lib/bootstrap-switch.js"></script>
    <!--custom tagsinput-->
    <script src="lib/jquery.tagsinput.js"></script>
    <!--custom checkbox & radio-->
    <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
    <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <script src="lib/form-component.js"></script>
@endsection
