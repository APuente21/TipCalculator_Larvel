@extends('layouts.master')


@section('title')
    Tip Calculator
@endsection

@push('body')
        <div class="container wrapper">
        <div class="text-center">
            <h1>Tip Calculator</h1>
        </div>
        <form method="POST" action='/process-form'>
            {{ csrf_field() }}
            <div class="form-div">
                <label>Total Price</label>
                <input type="text"  name="totalPrice" id="totalPrice" />
                <p>Required </p>
            </div>
            <div class="form-div">
                <label>Number of People</label>
                <input type="text" name="people" id="people"/>
                <p>Required </p>
            </div>
            <div class="form-div">
                <label>How was the Service</label>
                 <select name='service' autofocus>
                    <option value='15'>Excellent (15%)</option>
                    <option value='10'>Good (10%)</option>
                    <option value='5'>Poor (5%)</option>
                </select>
            </div>
            <div class="form-div">
                <label class="labelBox">Round Up?</label>
                <input class="ckBox" type="checkbox" name="roundBill" checked/>
            </div>
            <input class="submit" type="submit" value="Calculate"/>
        </form>
        
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div> 
        @endif
        @if($split != null && count($errors) == 0)
            <div class="alert alert-success">
                {{$split}};
            </div>
        @endif
    </div>
@endpush